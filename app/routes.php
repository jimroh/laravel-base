<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Home Route
Route::get(
    '/', 
    ['as' => 'home.get', 'uses' => 'Controllers\HomeController@getHome']
);

// Login Routes
Route::get(
    'login', 
    ['as' => 'login.get', 'uses' => 'Controllers\HomeController@getLogin']
);

Route::post(
    'login', 
    ['as' => 'login.post', 'before' => 'csrf', 'uses' => 'Controllers\HomeController@postLogin']
);
