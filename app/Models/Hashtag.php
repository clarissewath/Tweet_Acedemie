<?php
require_once 'DB.php';

$_SESSION['userid'] ?? 107;

class Hashtag extends DB
{
    public function getHashTags($hashsearch = 'mama')
    {
        $dbh = DB::connection();

        $req = $dbh->prepare("SELECT * 
          FROM hashtag
          WHERE hashtag LIKE CONCAT( '%', :hashsearch, '%')");
          
          $req->bindValue(':hashsearch', $hashsearch);
        try {
            $req->execute();
            echo "<br>Hashtag count = " . ($req->rowCount());
            return ($req->fetchAll());
        } catch (PDOException $e) {
            return var_dump($e);
        }
    }
}
