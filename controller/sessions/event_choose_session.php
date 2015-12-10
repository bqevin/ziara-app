<?php
session_start();
$event = $_POST['event'];
$_SESSION['event'] = $event;
header("Location:../../view/event_choose.php");
?>