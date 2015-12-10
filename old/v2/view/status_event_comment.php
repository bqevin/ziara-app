<?php
session_start();
include('../config/database/travel_db_connect.php');
$event_status_id = $_POST['event_status_id'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$commenter_email = $_SESSION['email'];
$status = mysql_real_escape_string($_POST['status']);
if(empty($status))
{
  header("Location:comment_event_status.php?msg=1");
}
if(!empty($status))
{
$insert = "INSERT INTO comment_event_status(event_status_id,fname,lname,commenter_email,status)VALUES('$event_status_id','$fname','$lname','$commenter_email','$status')";
if(!mysql_query($insert))
{
 die('Error:'.mysql_error());
}
else
{
 header("Location:comment_event_status.php");
}
}
?>