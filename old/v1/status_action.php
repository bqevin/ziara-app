<?php
session_start();
include('travel_db_connect.php');
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$status = mysql_real_escape_string($_POST['status']);
$country = $_SESSION['country'];
if(empty($status))
{
 header("Location:country.php?msg=3");
}
if(!empty($status))
{

$insert = "INSERT INTO status(fname,lname,email,country,status)VALUES('$fname','$lname','$email','$country','$status')";
if(!mysql_query($insert))
{
die('Error:'.mysql_error());
}
else
{
header("Location:country.php?msg=2");
}
}
?>

