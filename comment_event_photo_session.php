<?php
session_start();
$photo_status_id = $_GET['event_status_id'];
$_SESSION['photo_status_id'] = $photo_status_id;
header("Location:comment_event_photo.php");
?>