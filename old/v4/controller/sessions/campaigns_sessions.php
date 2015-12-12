<?php
session_start();
$title = $_POST['title'];
$_SESSION['campaign_title'] = $title;

header("Location:../../view/campaigns_choose.php");
?>