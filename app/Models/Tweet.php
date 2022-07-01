<?php

require_once 'DB.php';
require_once 'TweetsAndRetweets.php';

/**
 *
 */

class Tweet extends DB
{
    // --Commented out by Inspection (01/03/2022 21:00):public $result;
    public function getTweets(): array
    {
        $array = [];
        $req = DB::connection()->query(
            'SELECT *
            FROM tweet t
            INNER JOIN user u ON t.user_id = u.id
            order by tweet_date DESC'
        );
        foreach ($req->fetchAll() as $v) {
            $array[] = $v;
        }
        return ($array);
    }

    public function getTweets_or_Retweets(): array
    {
        $array = [];
        $req = DB::connection()->query(
            'SELECT *
            FROM tweets_and_retweets t
            ORDER BY tweet_date DESC'
        );
        foreach ($req->fetchAll() as $v) {
            $array[] = $v;
        }
        return ($array);
    }
}
