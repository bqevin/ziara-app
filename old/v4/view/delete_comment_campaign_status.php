<?php
session_start();
include('../config/database/travel_db_connect.php');
$id = $_GET['id'];
$delete = "DELETE FROM comment_campaign_status WHERE id='$id'";
if(!mysql_query($delete))
{
  die('Error:'.mysql_error());
}
else
{
header("Location:comment_campaign_status.php");
}
?>