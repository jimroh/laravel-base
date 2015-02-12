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

// Logout Route
Route::get(
    'logout', 
    ['as' => 'logout.get', 'uses' => 'Controllers\LoginController@getLogout']
);

//Password Reminder Routes
Route::get(
    'password-reminder', 
    ['as' => 'password.reminder.get', 'uses' => 'Controllers\PasswordController@getRemind']
);

Route::post(
    'password-reminder', 
    ['as' => 'password.reminder.post', 'before' => 'csrf', 'uses' => 'Controllers\PasswordController@postRemind']
);

// Password Reset Routes
Route::get(
    'password-reset/{token?}', 
    ['as' => 'password.reset.get', 'uses' => 'Controllers\PasswordController@getReset']
);

Route::post(
    'password-reset', 
    ['as' => 'password.reset.post', 'before' => 'csrf', 'uses' => 'Controllers\PasswordController@postReset']
);