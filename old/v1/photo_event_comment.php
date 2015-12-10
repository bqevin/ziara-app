<?php
session_start();
include('travel_db_connect.php');
$photo_status_id = $_POST['photo_status_id'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$commenter_email = $_SESSION['email'];
$status = $_POST['status'];
$insert = "INSERT INTO comment_event_status(event_status_id,fname,lname,commenter_email,status)VALUES('$photo_status_id','$fname','$lname','$commenter_email','$status')";
if(!mysql_query($insert))
{
 die('Error:'.mysql_error());
}
else
{
 header("Location:comment_event_photo.php");
}
?>