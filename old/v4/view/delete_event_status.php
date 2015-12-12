<?php
session_start();
include('../config/database/travel_db_connect.php');
$event_status_id = $_GET['event_status_id'];
$delete = "DELETE FROM event_status WHERE event_status_id='$event_status_id'";
if(!mysql_query($delete))
{
  die('Error:'.mysql_error());
}
else
{
header("Location:.../controller/events/view_event.php");
}
?>