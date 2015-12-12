<?php
session_start();
include('travel_db_connect.php');
$password = mysql_real_escape_string($_POST['password']);
$email = $_SESSION['email'];
if(empty($password))
{
  header("Location:change_password.php?msg=1");
}
if(!empty($password))
{
  $update = "UPDATE info SET password='$password'WHERE email='$email'";
  if(!mysql_query($update))
  {
    die('Error:'.mysql_error());
  }
  else
  {
    header("Location:direct_login.php");
  }
 }
?>