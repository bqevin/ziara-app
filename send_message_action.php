<?php
session_start();
include('travel_db_connect.php');
$sender_email = $_SESSION['email'];
$receiver_email = $_POST['receiver_email'];
$message = $_POST['message'];
$country = $_SESSION['country'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
if(empty($message))
{
 header("Location:send_message.php?msg=1");
}
else if(!empty($message))
{
$send_message = "INSERT INTO messages(sender_email,receiver_email,message,country,fname,lname)VALUES('$sender_email','$receiver_email','$message','$country','$fname','$lname')";
if(!mysql_query($send_message))
{
  die('Error on 10:'.mysql_error());
}
else
{
   header("Location:message_sent.php");
}
}
?>