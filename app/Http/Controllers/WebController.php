<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class WebController extends Controller{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    function load(){
        return view('index', ['header' => $this->header(), 'footer' => $this->footer(), 'menu' => $this->menu()]);
    }
    function homepage(){
        return view('homepage', ['header' => $this->headerpublic(), 'footer' => $this->footerpublic()]);
    }
    function contatti(){
        return view('contatti', ['header' => $this->headerpublic(), 'footer' => $this->footerpublic()]);
    }
    function genesis(){
        return view('genesis', ['header' => $this->header(), 'footer' => $this->footer(), 'menu' => $this->menu()]);
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
