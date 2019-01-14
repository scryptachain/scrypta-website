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

    public function setWebHook(){
        $url = 'https://scryptachain.org/' . env('TELEGRAM_BOT_TOKEN') . '/webhook';
        $response = $this->telegram->setWebhook(['url' => $url]);
        
        return $response == true ? redirect()->back() : dd($response);
    }

    public function handleRequest(Request $request)
    {
        $this->chat_id = $request['message']['chat']['id'];
        $this->username = $request['message']['from']['username'];
        $this->text = $request['message']['text'];
        $check = app("db")->table("telegram")->where('chat_id',$this->chat_id)->first();
        if(isset($check['_id'])){
            $this->user = $check;
        }else{
            $this->user = null;
        }
        switch ($this->text) {
            case '/start':
                $this->start();
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
                        app("db")->table("telegram")->where("chat_id",$this->chat_id)->update(["email" => $this->text]);
                    }elseif($this->user == null){
                        $this->sendMessage('Devi prima loggarti! Vai su /start');
                    }elseif(isset($this->user['email'])){
                        $this->sendMessage('Hai già configurato il tuo account, per fare il logout vai su /logout');
                    }
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
        
        $check = app("db")->table('telegram')->where('chat_id',$this->chat_id)->first();
        if(!isset($check['_id'])){
            $message = 'Ok, siamo pronti ad iniziare, dimmi la tua e-mail!'. chr(10);
            app("db")->table('telegram')->insert(['chat_id' => $this->chat_id]);
        }else{
            if(!isset($check['email']) || $check['email'] == ''){
                $message = 'Dimmi la tua e-mail!';
            }elseif(!isset($check['password']) || $check['password'] == ''){
                $message = 'Dimmi la tua password!';
            }
        }
        $this->sendMessage($message);
    }

    public function logout()
    {
        
        $check = app("db")->table('telegram')->where('chat_id',$this->chat_id)->first();
        if(!isset($check['_id'])){
            $message = 'Non ti sto trovando, sicuro di aver fatto il login?'. chr(10);
        }else{
            app("db")->table('telegram')->where('chat_id',$this->chat_id)->delete();
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
 
    protected function sendMessage($message)
    {

        $keyboard = array(array("/masternodes","/rewards","/logout"));

        $resp = array("keyboard" => $keyboard, "resize_keyboard" => true,"one_time_keyboard" => true);
        $reply = json_encode($resp);
     
        $this->telegram->sendMessage([
            'chat_id' => $this->chat_id, 
            'text' => $message,
            'reply_markup' => $reply
        ]);

    }
}
