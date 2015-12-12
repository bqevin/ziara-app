<?php
session_start();
include('travel_db_connect.php');
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$country = $_SESSION['country'];
$status = mysql_real_escape_string($_POST['status']);
$campaign = "false";

if(empty($status))
{
  header("Location:country.php?msg=1");
}
else if(!empty($status))
{
  $insert = "INSERT INTO status(fname,lname,email,country,status,campaign)VALUES('$fname','$lname','$email','$country','$status','$campaign')";
  if(!mysql_query($insert))
  {
    die('Error on 15:'.mysql_error());
  }
  else
  {
    header("Location:country.php?msg=2");
  }
}
?>