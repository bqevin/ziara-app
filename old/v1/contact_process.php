<?php
session_start();
include('travel_db_connect.php');
$subject = $_POST['subject'];
$message = $_POST['message'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$sender_email = $_SESSION['email'];
$country = $_SESSION['country'];
$insert = "INSERT INTO contact(fname,lname,sender_email,subject,message,country)VALUES('$fname','$lname','$sender_email','$subject','$message','$country')";
if(!mysql_query($insert))
{
 die('Error:'.mysql_error());
}
else
{
header("Location:contact.php?msg=1");
}
?>