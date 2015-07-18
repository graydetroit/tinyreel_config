<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Vinkla\Instagram\Facades\Instagram;

class AccessController extends Controller
{

    public function __construct()
    {
        //
    }

    protected function getLogin()
    {
        $url = Instagram::getLoginUrl();
        return redirect($url);
    }

    protected function getAuth()
    {
        if(\Session::has('instagram_token') && \Session::has('user')){
            $user = \Session::get('user');
            $token = \Session::get('instagram_token');
            $options = urlencode(json_encode(['token' => $token]));
            //\Session::flush();
            return view('auth')->with(compact('options', 'user'));
        } else if(\Request::get('code')){
            //dd('request');
            return \App::make('App\Http\Controllers\AccessController')->getToken(\Request::get('code'));
        } else {
            return redirect('/');
        }
    }

    protected function getToken($code)
    {
        function issetor(&$var, $default = false) {
            return isset($var) ? $var : $default;
        }

        try {
            $code = issetor($code, \Request::get('code'));
            //dd('code: '.$code);
            $data = Instagram::getOAuthToken($code);
            $token = $data->access_token;
            $user = $data->user;
            $options = urlencode(json_encode(['token' => $token]));
            \Session::put('instagram_token', $token);
            \Session::put('user', $user);
        } catch(\ErrorException $e){
            //dd($e);
            \Log::error($e);
            return redirect('/');
        }

        return view('auth')->with(compact('options', 'user'));
    }

}
