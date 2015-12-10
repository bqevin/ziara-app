<?php
session_start();
include('travel_db_connect.php');;
$event_status_id = $_GET['event_status_id'];
$delete = "DELETE FROM event_status WHERE event_status_id='$event_status_id'";
if(!mysql_query($delete))
{
  die('Error:'.mysql_error());
}
else
{
header("Location:view_event.php");
}
?>