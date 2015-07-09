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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [
    'as' => 'login', 'uses' => 'AccessController@getLogin'
]);

Route::get('/auth', [
    'as' => 'auth', 'uses' => 'AccessController@getToken'
]);

//make api route group
Route::get('/entries', [
    'as' => 'entries', 'uses' => 'EntriesController@getEntries'
]);
