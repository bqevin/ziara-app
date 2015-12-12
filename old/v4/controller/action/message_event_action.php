<?php
session_start();
include('../../config/database/travel_db_connect.php');

$sender_email = $_SESSION['email'];
$receiver_email = $_POST['receiver_email'];

$message =mysql_real_escape_string($_POST['message']);
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$country = $_SESSION['country'];
  if(empty($message))
  {
     header("Location:../events/message_event.php?msg=2");
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
  header("Location:../events/message_event.php?msg=1");
}
}
?>
 
