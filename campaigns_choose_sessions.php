<?php
session_start();
$campaign_id = $_POST['campaign_id'];
$_SESSION['campaign_id'] = $campaign_id;

header("Location:view_campaign.php");
?>