<?php
session_start();
$campaign_photo_id = $_GET['campaign_status_id'];
$_SESSION['campaign_photo_id'] = $campaign_photo_id;
header("Location:../../view/comment_campaign_photo.php");
?>