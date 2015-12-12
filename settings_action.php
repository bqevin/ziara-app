<?php
session_start();
include('travel_db_connect.php');
$password = mysql_real_escape_string($_POST['password']);
$email = $_SESSION['email'];
if(empty($password))
{
  header("Location:settings.php?msg=1");
}
if(!empty($password))
{
 $qry = mysql_query("SELECT * FROM info WHERE email='$email'AND password='$password'");
 if(mysql_num_rows($qry)==0)
 {
   header("Location:settings.php?msg=2");
 }
 else if(mysql_num_rows($qry)==1)
 {
   header("Location:change_password.php?msg=2");
}
}
?>