<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use Illuminate\Http\Response;
use Illuminate\Http\Request;

$router->get('/',"WebController@homepage");
$router->get('/homepage',"WebController@homepage");
$router->get('/blockchain',"WebController@blockchain");
$router->get('/about-scrypta',"WebController@about");
$router->get('/developers',"WebController@documentazione");

$router->get('{language}/homepage',"WebController@homepage");
$router->get('{language}/blockchain',"WebController@blockchain");
$router->get('{language}/about-scrypta',"WebController@about");
$router->get('{language}/developers',"WebController@documentazione");

$router->get('/bot/get-me', 'TelegramController@getMe');
$router->get('/bot/set-hook', 'TelegramController@setWebHook');
$router->get('/bot/check-api', 'TelegramController@hubApi');
$router->post(env('TELEGRAM_BOT_TOKEN') . '/webhook', 'TelegramController@handleRequest');
