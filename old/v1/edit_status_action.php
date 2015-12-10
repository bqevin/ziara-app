<?php
session_start();
include('travel_db_connect.php');
$status_id = $_POST['status_id'];
$status = $_POST['status'];
$update = "UPDATE status SET status='$status' WHERE status_id = '$status_id'";
if(!mysql_query($update))
{
  die('Error:'.mysql_error());
}
else
{
 header("Location:Posts.php");
}
?>