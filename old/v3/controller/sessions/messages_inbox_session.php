<?php
session_start();
$id = $_GET['id'];
$_SESSION['message_id'] = $id;
$receiver_email = $_GET['receiver_email'];
$sender_email = $_GET['sender_email'];
$_SESSION['receiver_email'] = $receiver_email;
$_SESSION['sender_email'] = $sender_email;
header("Location:../../view/view_messages.php");
?>