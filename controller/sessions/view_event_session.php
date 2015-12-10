<?php
session_start();
$event_id = $_POST['event_id'];
$_SESSION['event_id'] = $event_id;
header("Location:../../view/view_event.php");
?>