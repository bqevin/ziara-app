<?php
session_start();
include('../config/database/travel_db_connect.php');
$campaign_status_id = $_POST['campaign_status_id'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$commenter_email = $_SESSION['email'];
$status = $_POST['status'];
if(empty($status))
{
header("Location:comment_campaign_photo.php?msg=1");
}
if(!empty($status))
{
$insert = "INSERT INTO comment_campaign_status(campaign_status_id,fname,lname,commenter_email,status)VALUES('$campaign_status_id','$fname','$lname','$commenter_email','$status')";
if(!mysql_query($insert))
{
 die('Error:'.mysql_error());
}
else
{
 header("Location:comment_campaign_photo.php");
}
}
?>