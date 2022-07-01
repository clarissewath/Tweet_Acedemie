<?php
require_once 'DB.php';
if (!isset($_SESSION['userid'])) {
    $_SESSION['userid'] = 107;
}
/**
 *
 */
class User extends DB
{
    /**
     * @param  $username
     * @param  $email
     * @param  $password
     * @param  $birthdate
     */
    public function register($username, $email, $password, $birthdate)
    {
        $dbh = DB::connection();
        $req = $dbh->prepare('INSERT INTO user (`username`, `email`, `password`, `birthdate`) VALUES (:username, :email, :password, :birthdate)');
        $req->bindValue(':username', $username);
        $req->bindValue(':email', $email);
        $req->bindValue(':password', $password);
        $req->bindValue(':birthdate', $birthdate);
        try {
            $req->execute();
        } catch (PDOException $e) {
            return (header('../../Views/index.php'));
        }
        // return ($req->execute());
    }
    public function getUserById($userid = -1)
    {
        $dbh = DB::connection();
        $req = $dbh->prepare('SELECT username FROM user u
INNER JOIN tweet t ON u.id = t.user_id
INNER JOIN retweet r ON t.id = r.tweet_id
WHERE tweet_id = :userid
');
        $req->bindValue(':userid', $userid);
        $req->execute();
        return ($req->fetchAll());
    }
    public function getUsers($userid = -1)
    {
        $dbh = DB::connection();
        $req = $dbh->prepare(' SELECT * FROM user u
WHERE u.id = :userid');
        $req->bindValue(':userid', $userid);
        $req->execute();
        return ($req->fetch());
    }
}
    //    public function updateUser($newUsername, $changePwd = null, $changeEmail = null)
    //    {
    //        $dbh = DB::connection();
    //
    //        $previousUsername = $this->getUserById($_SESSION['userid']);
    //        var_dump($previousUsername);
    //        die();
    //        $req = $dbh->prepare('UPDATE user u
    //        SET u.username = :newUsername
    //        WHERE u.id = (SELECT id FROM user u WHERE u.username = :previousUsername)');
    //        $req->bindValue(':newUsername', $newUsername);
    //        $req->execute();
    //        return ($req->fetch());
    //    }
// $editProfile->updateUser($changeName, $changePwd, $changeEmail);
