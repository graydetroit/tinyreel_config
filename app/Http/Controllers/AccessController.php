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

    protected function getToken()
    {
        $code = \Request::get('code');

        try {
            $data = Instagram::getOAuthToken($code);
            $token = $data->access_token;

            $user = $data->user;
            //dd($user);

        } catch(\ErrorException $e){
            return redirect('/');
        }

        $options = urlencode(json_encode(['token' => $token]));
        session(['instagram_token' => $token]);
        return view('auth')->with(compact('options', 'user'));
    }

}
