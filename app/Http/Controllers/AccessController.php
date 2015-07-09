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
        $data = Instagram::getOAuthToken($code);
        $options = urlencode(json_encode(['token' => $data->access_token]));
        session(['instagram_token' => $data]);
        return view('auth')->with(compact('options'));
    }

}
