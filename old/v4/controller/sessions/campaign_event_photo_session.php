<?php
session_start();
$photo_status_id = $_POST['event_status_id'];
$_SESSION['photo_status_id'] = $photo_status_id;
?>