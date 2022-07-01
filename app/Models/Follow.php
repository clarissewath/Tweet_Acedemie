<?php
require_once 'DB.php';

$user_id = htmlspecialchars($_SESSION['userid'] ?? 107);

class Follow extends DB
{
    public function followAction($follow_id, $follower_id)
    {
        $today = date("Y-m-d H:i:s");
        $follow_date = $today;

        //var_dump($follow_id, $follower_id);
        $dbh = DB::connection();
        $req = $dbh->prepare('INSERT INTO twitter.follow (`follow_id`, `follower_id`, `follow_date`) VALUES (:follow_id, :follower_id, :follow_date)');
        $req->bindValue(':follow_id', $follow_id);
        $req->bindValue(':follower_id', $follower_id);
        $req->bindValue(':follow_date', $follow_date);
        var_dump($follow_id, $follower_id);
        return ($req->execute());
    }
    public function unFollowAction($follow_id, $follower_id)
    {
        $dbh = DB::connection();
        $req = $dbh->prepare('DELETE
FROM twitter.follow
WHERE (`follow_id` = :follow_id AND `follower_id` = :follower_id ) ');
        $req->bindValue(':follow_id', $follow_id);
        $req->bindValue(':follower_id', $follower_id);
        return ($req->execute());
    }

    public function getFollowers($user_id, $count = null) //taking user's id from $_SESSION['userid']
    {
                if ($count) {
            $req = DB::connection()->prepare(
                "SELECT count(*)
FROM follow
         INNER JOIN user ON follower_id = user.id
WHERE follow_id = :user_id"
            );
            $req->bindValue(':user_id', $user_id);
            $req->execute();
            //  var_dump($req->fetchAll());
            return $req->fetchAll();
        }

        $dbh = DB::connection();
        $req = $dbh->prepare(
            "SELECT follow_id,
       user.id,
       user.username,
       user.avatar
FROM follow
         INNER JOIN user ON follower_id = user.id
WHERE follow_id = :user_id"
        );
        $req->bindValue(':user_id', $user_id);
        $req->execute();
        return ($req->fetchAll());
    }

    public function getFollowings($user_id, $count = null) //taking user's id from $_SESSION['userid']
    {
        if ($count) {
            $req = DB::connection()->prepare(
                "SELECT count(*),
       user.id,
       user.username,
       user.avatar
FROM follow
         INNER JOIN user ON follow_id = user.id
WHERE follower_id = :user_id"
            );
            $req->bindValue(':user_id', $user_id);
            $req->execute();
            //  var_dump($req->fetchAll());
            return $req->fetchAll();
        }
        $req = DB::connection()->prepare(
            "SELECT follower_id,
       user.id,
       user.username,
       user.avatar
FROM follow
         INNER JOIN user ON follow_id = user.id
WHERE follower_id = :user_id"
        );
        $req->bindValue(':user_id', $user_id);
        $req->execute();
        //  var_dump($req->fetchAll());
        return $req->fetchAll();
    }
}

// $new = new Follow();
// $new->followAction('163', '117');
