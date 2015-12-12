<?php
session_start();
include('travel_db_connect.php');
$email = $_SESSION['email'];
$job = mysql_real_escape_string($_POST['job']);
$skills = mysql_real_escape_string($_POST['skills']);
$religion = mysql_real_escape_string($_POST['religion']);
$relationship = $_POST['relationship'];
$kids = mysql_real_escape_string($_POST['kids']);
$hobbies = mysql_real_escape_string($_POST['hobbies']);
$places = mysql_real_escape_string($_POST['places']);
$about = mysql_real_escape_string($_POST['about']);
if(empty($job))
{
  header("Location:add_info.php?msg=2");
}
if(empty($skills))
{
  header("Location:add_info.php?msg=2");
}
if(empty($religion))
{
  header("Location:add_info.php?msg=2");
}
if(empty($relationship))
{
  header("Location:add_info.php?msg=2");
}
if(empty($kids))
{
  header("Location:add_info.php?msg=2");
}
if(empty($hobbies))
{
  header("Location:add_info.php?msg=2");
}
if(empty($places))
{
  header("Location:add_info.php?msg=2");
}
if(empty($about))
{
  header("Location:add_info.php?msg=2");
}
else
{
$update ="UPDATE info SET job='$job',skills='$skills',religion='$religion',relationship='$relationship',kids='$kids',hobbies='$hobbies',places='$places',about='$about'WHERE email ='$email'";
if(!mysql_query($update))
{
die('Error:'.mysql_error());
}
else
{
header("Location:countries.php");
}
}
?>