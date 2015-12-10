<?php
session_start();
$admin_campaign_id = $_POST['campaign_id'];
$_SESSION['admin_campaign_id'] = $admin_campaign_id;
header("Location:view_admin_campaign.php");
?>