<?php
session_start();
include('travel_db_connect.php');
$campaign_status_id = $_POST['campaign_status_id'];
$status = mysql_real_escape_string($_POST['status']);
if(empty($status))
{
 header("Location:view_campaign.php?msg=1");
}
if(!empty($status))
{
$update = "UPDATE campaign_status SET status='$status' WHERE campaign_status_id = '$campaign_status_id'";
if(!mysql_query($update))
{
  die('Error:'.mysql_error());
}
else
{
 header("Location:view_campaign.php");
}
}
?>