<?php
session_start();
include('travel_db_connect.php');
$my_email = $_SESSION['email'];
$insert = "REPLACE INTO seen_nots(comment_id,status_id,fname,lname,commenter_email,status_owner)SELECT comment_id,status_id,fname,lname,commenter_email,status_owner FROM comments WHERE status_owner='$my_email'";
if(!mysql_query($insert))
{
  die('Error on 4:'.mysql_error());
}
else
{
  header("Location:notifications.php");
}
?>