<?php
require_once 'DB.php';

$_SESSION['userid'] ?? 107;

class Message extends DB
{
    public function getSentMessages($userid = 107)
    {
        $dbh = DB::connection();
        $req = $dbh->prepare('select * from message m
 INNER join user u ON m.destination_id = u.id 
 where m.expeditor_id = :expeditor_id
 ORDER BY message_date DESC 
');
        $req->bindValue(':expeditor_id', $userid);
        $req->execute();
        echo "<br>Sent messages count = " . ($req->rowCount());
        return ($req->fetchAll());
    }

    public function getReceivedMessages($userid = 107)
    {
        $dbh = DB::connection();
        $req = $dbh->prepare('select * from message m 
 INNER JOIN user u ON m.expeditor_id = u.id
 where m.destination_id = :destination_id
 ORDER BY message_date DESC');
        $req->bindValue(':destination_id', $userid);
        $req->execute();
        echo "<br>Received messages count = " . ($req->rowCount());

        return ($req->fetchAll());
    }

    public function insertMessage($recipient_username, $message_content, $id_sender)
    {
        $dbh = DB::connection();
        $today = date("Y-m-d H:i:s");
     //   var_dump($recipient_username, $message_content);
        $req = $dbh->prepare('INSERT INTO twitter.message (content, destination_id, expeditor_id, view, message_date)
 VALUES (:content, (
 SELECT user.id
 FROM user
 WHERE username = :destination_username
 ), :expeditor_id, :view, :message_date);
 ');
        $view = 1;
        $expeditor_id = $id_sender;
        $req->bindValue(':content', $message_content);
        $req->bindValue(':destination_username', $recipient_username);
        $req->bindValue(':expeditor_id', $expeditor_id);
        $req->bindValue(':view', $view);
        $req->bindValue(':message_date', $today);
        try {
            $req->execute();
            return ($req->fetchAll());
        } catch (PDOException $e) {
     //       var_dump($e);
            return 0;
        }
    }
}
