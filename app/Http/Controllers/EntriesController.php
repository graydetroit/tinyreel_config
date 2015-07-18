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
        try {
            $ig_session_token = session('instagram_token');
            Instagram::setAccessToken($ig_session_token);
        } catch(\Exception $e) {
            //\Log::error($e);
            if($e->getMessage() !== null && $e->getFile() !== null){
                $msg = $e->getMessage().' '.$e->getFile();
                \Bugsnag::notifyError('ErrorType', $msg);
            }
            return \Response::json("Not authenticated", 401);
        }
    }

    protected function getEntries()
    {
        function issetor(&$var, $default = false) {
            return isset($var) ? $var : $default;
        }

        try {

            $feed = Instagram::getUserFeed(30);
            $entries = [];

            for ($i=0; $i < sizeof($feed->data); $i++) {
                array_push($entries, [
                    'username' => issetor($feed->data[$i]->user->username, '...'),
                    'caption' => issetor($feed->data[$i]->caption->text, ''),
                    'likes' => issetor($feed->data[$i]->likes->count, '...'),
                    'comments' => issetor($feed->data[$i]->comments->count, '...'),
                    'url' => issetor($feed->data[$i]->images->thumbnail->url, 'http://placehold.it/144x168/000000?text=WHOOPS!')
                ]);
            }

            return \Response::json($entries, 200);

        } catch(\Exception $e) {
           // \Log::error($e);
            if($e->getMessage() !== null && $e->getFile() !== null){
                $msg = $e->getMessage().' '.$e->getFile();
                \Bugsnag::notifyError('ErrorType', $msg);
            }
            return \Response::json("Error returning entries data", 401);

        }
    }
}
