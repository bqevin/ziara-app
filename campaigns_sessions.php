<?php
session_start();
$title = $_POST['title'];
$_SESSION['campaign_title'] = $title;

header("Location:campaigns_choose.php");
?>