<?php
session_start();
include('travel_db_connect.php');
$sender_email = $_GET['sender_email'];
$my_email = $_SESSION['email'];
$replace = "REPLACE INTO inbox(seen_id,message_id,sender_email,receiver_email,message,country,fname,lname)SELECT seen_id,message_id,sender_email,receiver_email,message,country,fname,lname FROM seen_messages WHERE receiver_email='$my_email'";
if(!mysql_query($replace))
{
  die('Error on 6:'.mysql_error());
}
else
{
  header("Location:view_messages.php?sender_email=$sender_email");
}
?>