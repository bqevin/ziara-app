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
   if($db_password == md5($password))
   {
   $_SESSION['fname'] = $row['fname'];
   $_SESSION['email'] = $row['email'];
   $_SESSION['lname'] = $row['lname'];
   $_SESSION['country'] = $row['country'];
   
   header("Location:countries.php");
   }
   else
   {
      header("Location:direct_login.php?msg=2");
   }
}
else
{
  header("Location:direct_login.php?msg=2");
}
?>
