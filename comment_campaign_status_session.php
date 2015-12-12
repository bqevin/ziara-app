<?php
session_start();
$campaign_status_id = $_GET['campaign_status_id'];
$_SESSION['campaign_status_id'] = $campaign_status_id;
header("Location:comment_campaign_status.php");
?>