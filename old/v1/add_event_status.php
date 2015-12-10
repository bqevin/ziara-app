<?php
session_start();
include('travel_db_connect.php');
$id = $_POST['id'];
$name = $_POST['name'];
$country = $_SESSION['country'];
$admin_email = $_SESSION['email'];
$status = mysql_real_escape_string($_POST['status']);
if(empty($status))
{
 header("Location:view_event.php?msg=3");
 }
 if(!empty($status))
 {
$insert = "INSERT INTO event_status(id,name,country,admin_email,status)VALUES('$id','$name','$country','$admin_email','$status')";
if(!mysql_query($insert))
{
 die('Error:'.mysql_error());
}
else
{
header("Location:view_event.php?msg=1");
}
}
?>