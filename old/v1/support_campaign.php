<?php
session_start();
include('travel_db_connect.php');
$email = $_POST['supporter_email'];
$campaign_id = $_POST['campaign_id'];
$insert = "INSERT INTO campaign_supporters(campaign_id,supporter_email)VALUES('$campaign_id','$email')";
if(!mysql_query($insert))
{
  die('Error:'.mysql_error());
}
else
{
 header("Location:view_campaign.php");
}
?>
