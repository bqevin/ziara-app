<?php
session_start();
include('../config/database/travel_db_connect.php');
$status_id = $_POST['status_id'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$commenter_email = $_SESSION['email'];
$status = $_POST['status'];
$status_owner = $_POST['status_owner'];
$insert = "INSERT INTO comments(status_id,fname,lname,commenter_email,status,status_owner)VALUES('$status_id','$fname','$lname','$commenter_email','$status','$status_owner')";
if(!mysql_query($insert))
{
 die('Error:'.mysql_error());
}
else
{
header("Location:indexxx.php");
}
?>