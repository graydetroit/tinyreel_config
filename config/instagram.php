<?php

/*
 * This file is part of Laravel Instagram.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Instagram Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'production' => [
            'client_id' => env('IG_P_ID', null),
            'client_secret' => env('IG_P_SECRET', null),
            'callback_url' => 'http://jamesgraydev.com/auth',
        ],

        'local' => [
            'client_id' => env('IG_L_ID', null),
            'client_secret' => env('IG_L_SECRET', null),
            'callback_url' => 'http://77bed9e3.ngrok.io/auth',
        ],

    ],

];
