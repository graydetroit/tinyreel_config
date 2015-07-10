<?php

namespace App\Http\Controllers;

//use App\User;
use App\Http\Controllers\Controller;
use Vinkla\Instagram\Facades\Instagram;

class EntriesController extends Controller
{

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $ig_session_token = session('instagram_token');
        Instagram::setAccessToken($ig_session_token);
    }

    protected function getEntries()
    {
        try {

            $feed = Instagram::getUserFeed(10);
            $entries = [];

            for ($i=0; $i < sizeof($feed->data); $i++) {
                array_push($entries, [
                    'username' => $feed->data[$i]->user->username,
                    'caption' => $feed->data[$i]->caption->text,
                    'likes' => $feed->data[$i]->likes->count,
                    'comments' => $feed->data[$i]->comments->count,
                    'url' => $feed->data[$i]->images->thumbnail->url
                ]);
            }

            return \Response::json($entries, 200);

        } catch(\Exception $e) {

            return \Response::json("Error returning entries data, ".$e, 401);

        }
    }
}
