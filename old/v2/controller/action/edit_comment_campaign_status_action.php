<?php
session_start();
include('../../config/database/travel_db_connect.php');
$id = $_POST['id'];
$status = $_POST['status'];
$update = "UPDATE comment_campaign_status SET status='$status' WHERE id = '$id'";
if(!mysql_query($update))
{
  die('Error:'.mysql_error());
}
else
{
 header("Location:../../view/comment_campaign_status.php");
}
?>