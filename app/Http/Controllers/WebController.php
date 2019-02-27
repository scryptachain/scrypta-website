<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use \Illuminate\Support\Facades\Lang;

class WebController extends Controller{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        if(isset($request->route()[2]['language'])){
            $lang = $request->route()[2]['language'];
        }else{
            $lang = 'en';
        }
        $this->language = $lang;
        app('translator')->setLocale($lang);
    }

    function load(){
        return view('index', ['header' => $this->header(), 'footer' => $this->footer(), 'menu' => $this->menu()]);
    }
    function homepage(){
        return view('homepage', ['header' => $this->headerpublic($this->language,'homepage'), 'footer' => $this->footerpublic($this->language), 'language' => $this->language]);
    }
    function contatti(){
        return view('contatti', ['header' => $this->headerpublic($this->language,'contacts'), 'footer' => $this->footerpublic($this->language), 'language' => $this->language]);
    }
    function blockchain(){
        return view('blockchain', ['header' => $this->headerpublic($this->language,'blockchain'), 'footer' => $this->footerpublic($this->language), 'language' => $this->language]);
    }
    function sostieni(){
        return view('sostieni', ['header' => $this->headerpublic($this->language), 'footer' => $this->footerpublic($this->language), 'language' => $this->language]);
    }
    function documentazione(){
        return view('documentazione', ['header' => $this->headerpublic($this->language, 'developers'), 'footer' => $this->footerpublic($this->language), 'language' => $this->language]);
    }
    function about(){
        return view('about', ['header' => $this->headerpublic($this->language,'about-scrypta'), 'footer' => $this->footerpublic($this->language), 'language' => $this->language]);
    }
    function crowdsale(){
      return view('crowdsale', ['header' => $this->headerpublic($this->language,'about-scrypta'), 'footer' => $this->footerpublic($this->language), 'language' => $this->language]);
    }
    function register(Request $request){

        app("db")->table("sells")->insert([
            "address" => $request->input('address'),
            "email" => $request->input('email'),
            "amount" => 1
        ]);

        return 'OK';
    }
}
