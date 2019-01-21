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
        $this->telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
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
                'apiKey' => urlencode($this->user['api_key'])
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
        $this->text = $request['message']['text'];
        $check = app("db")->table("users")->where('chat_id',$this->chat_id)->first();
        
        if(isset($check['_id'])){
            $this->user = $check;
        }else{
            $this->user = null;
        }
        // app("db")->table("log")->insert(["chat_id" => $this->chat_id, "username" => $this->username, "text" => $this->text]);
        if($this->user !== null && isset($this->user['api_key'])){
            $masternodes = $this->hubApi('masternodes/list');
            $searchMN=array();
            $searchAddresses=array();
            $this->masternodes = array();
            $this->stats = array();
            if(count($masternodes) > 0){
                foreach($masternodes as $masternode){
                    if($masternode['coin'] == 'LYRA'){
                        array_push($searchMN,'/'.$masternode['masternodeName']);
                        array_push($searchAddresses,'/'.$masternode['coin_address']);
                        $this->masternodes['/'.$masternode['masternodeName']] = $masternode;
                        $this->stats['/'.$masternode['coin_address']] = $masternode;
                    }
                }
            }
        }

        app("db")->table("users")->where("chat_id",$this->chat_id)->update(["last_call" => $this->text]);

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
            case '/rewards':
                $this->rewards();
            break;
            case '/logout':
                $this->logout();
            break;

            default: 
                $understood = 'NO';
                
                if (strpos($this->text, '@') !== false) {
                    $apiKey = explode('@',$this->text);
                    app("db")->table("users")->where("chat_id",$this->chat_id)->update(["debug" => array("log" =>"updated", "timestamp" => strtotime("now"))]);
                    app("db")->table("users")->where("chat_id",$this->chat_id)->update(["api_key" => $apiKey[1]]);
                    $this->sendMessage('Ok siamo pronti!');
                    $understood = 'YES';
                }

                if(isset($searchMN) && count($searchMN) > 0){
                    if(in_array($this->text,$searchMN)){
                        $this->details($this->text);
                        $understood = 'YES';
                    }

                    if(in_array($this->text,$searchAddresses)){
                        $this->stats($this->text);
                        $understood = 'YES';
                    }
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
            $message = 'Ok, siamo pronti ad iniziare, dimmi il tuo codice segreto!'. chr(10);
            app("db")->table("users")->insert(['chat_id' => $this->chat_id]);
        }else{
            if(!isset($check['api_key']) || $check['api_key'] == ''){
                $message = 'Dimmi il tuo codice segreto!';
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
            $response = 'Scegli uno dei masternode: ' . chr(10);
            foreach($masternodes as $masternode){
                if($masternode['coin'] == 'LYRA'){
                    $response .= '/'.$masternode['masternodeName'].chr(10);
                }
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
            $stats = $this->hubApi(
                'masternodes/stats',
                [
                    'apiKey' => $this->user['api_key'],
                    'id' => $this->masternodes[$mnID]['id']
                ]
            );
            
            $response = "🤖".$masternode['masternodeName']. "🤖" . chr(10);
            $response .= $masternode['coin_address'] . "" . chr(10);
            $response .= "🔌 ".$masternode['last_status'] . "" . chr(10);
            $response .= " 💣 <b>".round($stats['rewards'],2) .' '. $this->masternodes[$mnID]['coin'] . "</b>" . chr(10);

            $this->sendMessage($response);
        }else{
            $this->sendMessage('Sicuro di essere loggato?');
        }
        
    }

    public function rewards()
    {
        
        $check = app("db")->table("users")->where('chat_id',$this->chat_id)->first();
        if(isset($check['_id'])){
            $api_key = $check['api_key'];
            $totale = 0;
            $media = 0;
            $oggi = 0;
            foreach($this->masternodes as $mnID => $mn){
                $stats = $this->hubApi(
                    'masternodes/stats',
                    [
                        'apiKey' => $this->user['api_key'],
                        'id' => $mn['id']
                    ]
                );
                $totale += $stats['rewards'];
                $media += $stats['average'];
                if(isset($stats['dailyrewards'][date('Y-m-d')])){
                    $oggi += $stats['dailyrewards'][date('Y-m-d')];
                }
            }
            $response = "Totale reward raccolte <b>".round($totale) .' LYRA</b>' . chr(10);
            $response .= "La media è di <b>".round($media) .' LYRA</b> al giorno' . chr(10);
            $response .= "Oggi hai raccolto <b>".round($oggi).' LYRA</b>';

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
        $message .= '/logout' . chr(10);
        
        $this->sendMessage($message);

    }
 
    protected function sendMessage($message, $parse_html = false)
    {

        if($this->user !== null){
            $keyboard = array();
            foreach ($this->masternodes as $address => $mn){
                array_push($keyboard,"/".$mn['masternodeName']);
            }
            $keyboard = array($keyboard,array("/rewards"));
        }else{
            $keyboard = array(array("/start"));
        }

        $resp = array("keyboard" => $keyboard, "resize_keyboard" => true,"one_time_keyboard" => true);
        $reply = json_encode($resp);
     
        $this->telegram->sendMessage([
            'chat_id' => $this->chat_id, 
            'text' => $message,
            'reply_markup' => $reply,
            'parse_mode' => 'html'
        ]);

    }
}
