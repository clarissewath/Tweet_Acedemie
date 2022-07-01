<?php

require_once 'DB.php';

class Reply extends DB
{
    public function getReply($tweet_id = -1): array
    {
        $array = [];
        $req = DB::connection()->prepare(
            'SELECT *
FROM reply
         INNER JOIN tweets_and_retweets tar ON reply.tweet_id = tar.tweet_id && tar.tweet_id = :tweet_id
         INNER JOIN user u ON reply.user_id = u.id
ORDER BY reply_date'
        );
        $req->bindValue(':tweet_id', $tweet_id);
        $req->execute();
        foreach ($req->fetchAll() as $v) {
            $array[] = $v;
        }
        return ($array);
    }
    public function insertReply($user_id, $tweet_id, $content)
    {
        $today = date("Y-m-d H:i:s");
 
        $req = DB::connection()->prepare(
            'INSERT INTO twitter.reply (user_id, tweet_id, content, reply_date)
            VALUES (:user_id, :tweet_id, :content, :reply_date)'
        );

        $req->bindValue(':user_id', $user_id);
        $req->bindValue(':tweet_id', $tweet_id);
        $req->bindValue(':content', $content);
        $req->bindValue(':reply_date', $today);
        $req->execute();
        echo 'Insert reply seems ok';
    }

    public function deleteReply($user_id = null, $tweet_id = null)
    {
        $req = DB::connection()->prepare(
            'DELETE
FROM reply r
WHERE tweet_id = :tweet_id
  AND user_id = :user_id;'
        );

        $req->bindValue(':user_id', $user_id);
        $req->bindValue(':tweet_id', $tweet_id);
        $req->execute();
        echo 'Delete reply seems ok';
    }
}
