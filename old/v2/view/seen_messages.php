<?php
include('../config/database/travel_db_connect.php');
$receiver_email = $_GET['receiver_email'];
$insert = "REPLACE INTO seen_messages(id,sender_email,receiver_email,message,country,fname,lname)SELECT id,sender_email,receiver_email,message,country,fname,lname FROM messages WHERE receiver_email='$receiver_email'";
if(!mysql_query($insert))
{
 die('Error:'.mysql_error());
}
else
{
   header("Location:Messages.php"); 
 }
 ?>