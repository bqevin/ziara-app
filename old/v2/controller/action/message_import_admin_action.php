<?php
session_start();
include('../../config/database/travel_db_connect.php');
$sender_email = $_SESSION['email'];
$receiver_email = $_POST['receiver_email'];
$message = mysql_real_escape_string($_POST['message']);
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
if(empty($message))
{
  header("Location:../../view/message_import_admin.php?msg=2");
}
if(!empty($message))
{
$insert = "INSERT INTO messages(sender_email,receiver_email,message,fname,lname)VALUES('$sender_email','$receiver_email','$message','$fname','$lname')";
if(!mysql_query($insert))
{
 die('Error:'.mysql_error());
}
else
{
header("Location:../../view/message_import_admin.php?msg=1");
}
}
?>