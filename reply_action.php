<?php
session_start();
include('travel_db_connect.php');

$sender_email = $_SESSION['email'];
$receiver_email = $_POST['receiver_email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$country = $_SESSION['country'];
if(empty($message))
{
  header("Location:view_messages.php?msg=1");
 }
  if(!empty($message))
  {
     $put = "INSERT INTO messages(sender_email,receiver_email,message,country,fname,lname)VALUES('$sender_email','$receiver_email','$message','$country','$fname','$lname')";
	 if(!mysql_query($put))
	 {
	  die('Error:'.mysql_error());
	 }
	 else
	 {
	   header("Location:view_messages.php");
	 }
	 }
	 ?>
  
  