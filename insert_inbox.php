<?php
include('travel_db_connect.php');
$id = $_GET['id'];
$sender_email = $_GET['sender_email'];
$receiver_email = $_GET['receiver_email'];
$insert = "REPLACE INTO inbox(id,sender_email,receiver_email,message,country,fname,lname)SELECT id,sender_email,receiver_email,message,country,fname,lname FROM seen_messages WHERE receiver_email='$receiver_email' AND sender_email='$sender_email'";
if(!mysql_query($insert))
{
  die('Error:'.mysql_error());
}
else
{
 header("Location:messages_session.php?id=$id&sender_email=$sender_email&receiver_email=$receiver_email");
}
?>