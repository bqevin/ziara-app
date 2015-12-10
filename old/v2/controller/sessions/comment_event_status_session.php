<?php
session_start();
$event_status_id = $_GET['event_status_id'];
$_SESSION['event_status_id']= $event_status_id;
header("Location:../../view/comment_event_status.php");
?>