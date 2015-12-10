<?php
session_start();
include('../config/database/travel_db_connect.php');
$campaign_status_id = $_GET['campaign_status_id'];
$delete = "DELETE FROM campaign_status WHERE campaign_status_id='$campaign_status_id'";
if(!mysql_query($delete))
{
  die('Error:'.mysql_error());
}
else
{
header("Location:view_campaign.php");
}
?>