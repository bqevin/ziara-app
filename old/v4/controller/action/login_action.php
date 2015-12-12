<?php
session_start();
include('../../config/database/travel_db_connect.php');
$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
$login = mysql_query("SELECT * FROM info WHERE email='$email'AND password='$password'");
$row = mysql_fetch_array($login);
if(mysql_num_rows($login)>0)
{
   $_SESSION['fname'] = $row['fname'];
   $_SESSION['email'] = $row['email'];
   $_SESSION['lname'] = $row['lname'];
   
   header("Location:../../view/photo_upload.php?msg=3");
}
else
{
  header("Location:../../view/login.php?msg=2");
}
?>
