<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::get('auth/login',    ["as" => "login", "uses" => 'Auth\AuthController@getLogin']);
Route::post('auth/login',   'Auth\AuthController@postLogin');
Route::get('auth/logout',   ["as" => "logout", "uses" => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', ["as" => "register", "uses" => 'Auth\AuthController@getRegister']);
Route::post('auth/register','Auth\AuthController@postRegister');


Route::get('/',             ["as" => "dashboard",       "uses" => "HomeController@dashboard"]);


Route::post('/url/check',   ["as" => "url.check",   "uses" => "UrlController@check"]);
Route::resource('url', 'UrlController');


Route::get('/{short_url}',   ["as" => "url.short",   "uses" => "UrlController@short"]);