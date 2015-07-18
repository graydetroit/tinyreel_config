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
    if(\Session::has('instagram_token') && \Session::has('user')){
        return Redirect::to('/auth');
    } else {
        return view('welcome');
    }
});

Route::get('/login', [
    'as' => 'login', 'uses' => 'AccessController@getLogin'
]);

Route::get('/auth', [
    'as' => 'auth', 'uses' => 'AccessController@getAuth'
]);

//make api route group
Route::get('/entries', [
    'as' => 'entries', 'uses' => 'EntriesController@getEntries'
]);

Route::get('/bugtest', [
	'as' => 'bugtest', 'uses' => 'AccessController@getBugTest'
]);
