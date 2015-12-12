<?php
session_start();
include('travel_db_connect.php');
$my_email = $_SESSION['email'];
$insert = "REPLACE INTO seen_messages(message_id,sender_email,receiver_email,message,country,fname,lname)SELECT message_id,sender_email,receiver_email,message,country,fname,lname FROM messages WHERE receiver_email='$my_email'";
if(!mysql_query($insert))
{
  die('Error on 5:'.mysql_error());
}
else
{
  header("Location:messages.php");
}
?>