<?php
session_start();
include('travel_db_connect.php');
$event_status_id = $_POST['event_status_id'];
$status = mysql_real_escape_string($_POST['status']);
if(empty($status))
{
  header("Location:view_event.php?msg=3");
}
if(!empty($status))
{
$update = "UPDATE event_status SET status='$status' WHERE event_status_id = '$event_status_id'";
if(!mysql_query($update))
{
  die('Error:'.mysql_error());
}
else
{
 header("Location:view_event.php");
}
}
?>