<?php
session_start();
include('travel_db_connect.php');
$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
$login = mysql_query("SELECT * FROM info WHERE email='$email'");
$row = mysql_fetch_array($login);
if(mysql_num_rows($login)>0)
{
   $db_password = $row['password'];
   $db_confirmed = $row['confirmed'];
   $db_confirm_code = $row['confirm_code'];
   if($db_password == md5($password) and $db_confirmed=="1" and $db_confirm_code=="0" )
   {
   $_SESSION['fname'] = $row['fname'];
   $_SESSION['email'] = $row['email'];
   $_SESSION['lname'] = $row['lname'];
   $_SESSION['country'] = $row['country'];
   
   header("Location:photo_upload.php?msg=3");
   }
   else
   {
      header("Location:login.php?msg=2");
   }
}
else
{
  header("Location:login.php?msg=2");
}
?>
