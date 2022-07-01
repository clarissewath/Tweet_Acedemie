<?php
// var_dump(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'User.php');

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'User.php';

$email = $_POST['email'] ?? '';

/**
 * @param $email
 * @return string
 */
function sanitize_mail($email): string
{
    $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    return htmlentities($email);
}
$email = sanitize_mail($email);

if ('' !== $email) { {
        $dbh = DB::connection();
        $username = $email;
        $password = $_POST['mdp'] ?? '';
        $password = hash('ripemd160', $password . 'vive le projet tweet_academy');
        $req = $dbh->prepare('SELECT * FROM user WHERE username = :username OR email = :email && password = :password');
        $req->bindValue(':username', $username);
        $req->bindValue(':email', $username);
        $req->bindValue(':password', $password);
        $req->execute();
        $fetchAll = $req->fetchAll(PDO::FETCH_NAMED) ?? [];
        $fetchAll = (array_filter($fetchAll[0] ?? []));
        $fetchAll = array_map('strtolower', array_filter($fetchAll));
        if (!empty($username) && !empty($password) && '' !== $password && '' !== $username) {
            if (in_array(strtolower($username), array_values($fetchAll), true)) {
                if (in_array($password, array_values($fetchAll), true)) {
                    echo 'user exists and is valid <br>';
                    session_start();
                    $_SESSION['userid'] = $fetchAll['id'];
                    return header('Location: ../../Views/feed.php');
                }
            }
        }
    }
    header('Location: ../../Views/index.php');
}
