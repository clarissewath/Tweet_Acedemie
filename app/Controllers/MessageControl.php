<?php
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Message.php';
if (!isset($_SESSION['userid'])) {

    $_SESSION['userid'] = 107;
}

// var_dump($_SESSION);
// 
// var_dump($_REQUEST);
if (array_key_exists('message_content', $_REQUEST)) {
    $recipient_username = $_REQUEST['recipient_username'];
    $id_sender = $_REQUEST['id_sender'];
    $message_content = $_REQUEST['message_content'];

    $message = new Message;
    $message->insertMessage($recipient_username, $message_content, $id_sender);
}
