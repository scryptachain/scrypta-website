<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Telegram\Bot\Api;

class TelegramController extends Controller{

    protected $telegram;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->telegram = new Api(env('746245688:AAEnUMlM5dQZYwLZcza2T9TzsGt7fI-H9RQ'));
    }

    function getMe(){
        $response = $this->telegram->getMe();
        return $response;
    }

    function hubApi($endpoint = 'masternodes/list', $params = array()){
        $url = 'https://hub.kalkul.us/api/' . $endpoint;
        
        if(count($params) > 0){
            $fields = $params;
        }else{
            $fields = array(
                'apiKey' => urlencode($this->user['api_key'] ?? 'trJ3tqbFlfHoWKed5PGMX6CVo5usnGGuq6nBrg==')
            );
        }
        //$this->sendMessage(json_encode($fields));
        $fields_string = '';
        //url-ify the data for the POST
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        //execute post
        $result = json_decode(curl_exec($ch),1);
       
        //close connection
        curl_close($ch);
        return $result['response'];
    }

    public function setWebHook(){
        $url = 'https://scryptachain.org/' . env('TELEGRAM_BOT_TOKEN') . '/webhook';
        $response = $this->telegram->setWebhook(['url' => $url]);
        dd($response);
        return $response == true ? redirect()->back() : dd($response);
    }

    public function handleRequest(Request $request)
    {
        $this->chat_id = $request['message']['chat']['id'];
        $this->username = $request['message']['from']['username'];
        $this->text = $request['message']['text'];
        $check = app("db")->table("users")->where('chat_id',$this->chat_id)->first();
        
        if(isset($check['_id'])){
            $this->user = $check;
        }else{
            $this->user = null;
        }
        // app("db")->table("log")->insert(["chat_id" => $this->chat_id, "username" => $this->username, "text" => $this->text]);

        switch ($this->text) {
            case '/start':
                $this->start();
            break;
            case '/masternodes':
                $this->masternodes();
            break;
            case '/help':
                $this->help();
            break;
            case '/logout':
                $this->logout();
            break;

            default: 
                $understood = 'NO';
                if (filter_var($this->text, FILTER_VALIDATE_EMAIL)) {
                    if($this->user !== null && !isset($this->user['email'])){
                        $this->sendMessage('La tua e-mail è '.$this->text.'!');
                        app("db")->table("users")->where("chat_id",$this->chat_id)->update(["email" => $this->text]);
                    }elseif($this->user == null){
                        $this->sendMessage('Devi prima loggarti! Vai su /start');
                    }elseif(isset($this->user['email'])){
                        $this->sendMessage('Hai già configurato il tuo account, per fare il logout vai su /logout');
                    }
                    $understood = 'YES';
                }
                $masternodes = $this->hubApi('masternodes/list');
                $searchMN=array();
                $searchAddresses=array();
                $this->masternodes = array();
                $this->stats = array();
                foreach($masternodes as $masternode){
                    array_push($searchMN,'/'.$masternode['masternodeName']);
                    array_push($searchAddresses,'/'.$masternode['coin_address']);
                    $this->masternodes['/'.$masternode['masternodeName']] = $masternode;
                    $this->stats['/'.$masternode['coin_address']] = $masternode;
                }
                if(in_array($this->text,$searchMN)){
                    $this->details($this->text);
                    $understood = 'YES';
                }

                if(in_array($this->text,$searchAddresses)){
                    $this->stats($this->text);
                    $understood = 'YES';
                }
                if($understood == 'NO'){
                    $this->sendMessage('Non ho capito!');
                }
            break;
        }

    }

    public function start()
    {
        
        $check = app("db")->table("users")->where('chat_id',$this->chat_id)->first();
        if(!isset($check['_id'])){
            $message = 'Ok, siamo pronti ad iniziare, dimmi la tua e-mail!'. chr(10);
            app("db")->table("users")->insert(['chat_id' => $this->chat_id]);
        }else{
            if(!isset($check['email']) || $check['email'] == ''){
                $message = 'Dimmi la tua e-mail!';
            }
        }
        $this->sendMessage($message);
    }

    public function masternodes()
    {
        
        $check = app("db")->table("users")->where('chat_id',$this->chat_id)->first();
        if(isset($check['_id'])){
            $api_key = $check['api_key'];
            $masternodes = $this->hubApi('masternodes/list');
            $response = 'Scegli uno dei ' .count($masternodes). ' masternode: ' . chr(10);
            foreach($masternodes as $masternode){
                $response .= '/'.$masternode['masternodeName'].chr(10);
            }
            $this->sendMessage($response);
        }else{
            $this->sendMessage('Sicuro di essere loggato?');
        }
        
    }

    public function details($mnID)
    {
        
        $check = app("db")->table("users")->where('chat_id',$this->chat_id)->first();
        if(isset($check['_id'])){
            $api_key = $check['api_key'];
            $masternode = $this->hubApi(
                'masternodes/detail',
                [
                    'apiKey' => $this->user['api_key'],
                    'id' => $this->masternodes[$mnID]['id']
                ]
            );

            $response = "Si chiama ".$masternode['masternodeName'] . chr(10);
            $response .= "L'indirizzo è /".$masternode['coin_address'] . chr(10);
            $response .= "La blockchain è ".$masternode['coin'] . chr(10);
            $response .= "Indirizzo IP ".$masternode['masternodeIP'] . chr(10);
            $response .= "E' stato visto l'ultima volta ".$masternode['last_seen'] . chr(10);
            $response .= "Il suo stato è ".$masternode['last_status'] . chr(10);

            $this->sendMessage($response);
        }else{
            $this->sendMessage('Sicuro di essere loggato?');
        }
        
    }

    public function stats($mnID)
    {
        
        $check = app("db")->table("users")->where('chat_id',$this->chat_id)->first();
        if(isset($check['_id'])){
            $api_key = $check['api_key'];
            $stats = $this->hubApi(
                'masternodes/stats',
                [
                    'apiKey' => $this->user['api_key'],
                    'id' => $this->stats[$mnID]['id']
                ]
            );

            $response = "Totale reward raccolte ".round($stats['rewards'],2) .' '. $this->stats[$mnID]['coin'] . chr(10);

            $this->sendMessage($response);
        }else{
            $this->sendMessage('Sicuro di essere loggato?');
        }
        
    }

    public function logout()
    {
        
        $check = app("db")->table("users")->where('chat_id',$this->chat_id)->first();
        if(!isset($check['_id'])){
            $message = 'Non ti sto trovando, sicuro di aver fatto il login?'. chr(10);
        }else{
            app("db")->table("users")->where('chat_id',$this->chat_id)->delete();
            $message = 'Logout effettuato correttamente!';
        }
        $this->sendMessage($message);
    }

    public function help()
    {
        //$message = 'Ciao, qui qualche dato riguardante la nostra conversazione:'.  chr(10);
        //$message .= $this->chat_id . chr(10);
        //$message .= $this->username . chr(10) . chr(10);
        //$message .= 'Ecco cosa puoi chiedermi:'.  chr(10);
        
        $message = '/help' . chr(10);
        $message .= '/start' . chr(10);
        $message .= '/masternodes' . chr(10);
        $message .= '/rewards' . chr(10);
        //$message .= '/preleva' . chr(10);
        $message .= '/logout' . chr(10);
        
        $this->sendMessage($message);

    }
 
    protected function sendMessage($message, $parse_html = false)
    {

        if($this->user !== null){
            $keyboard = array(array("/masternodes","/rewards","/logout"));
        }else{
            $keyboard = array(array("/start"));
        }

        $resp = array("keyboard" => $keyboard, "resize_keyboard" => true,"one_time_keyboard" => true);
        $reply = json_encode($resp);
     
        $this->telegram->sendMessage([
            'chat_id' => $this->chat_id, 
            'text' => $message,
            'reply_markup' => $reply
        ]);

    }
}
