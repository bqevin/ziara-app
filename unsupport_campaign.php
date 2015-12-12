<?php
session_start();
include('travel_db_connect.php');
$campaign_id = $_POST['campaign_id'];
$email = $_SESSION['email'];
$delete = "DELETE FROM campaign_supporters WHERE campaign_id = '$campaign_id' AND supporter_email = '$email'";
if(!mysql_query($delete))
{
  die('Error:'.mysql_error());
}
else
{
 header("Location:view_campaign.php");
}
?>