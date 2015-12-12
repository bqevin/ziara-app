<?php
session_start();
include('travel_db_connect.php');
$event_id = $_POST['event_id'];
$email = $_POST['attendee_email'];
$insert = "INSERT INTO event_attend(event_id,attendee_email)VALUES('$event_id','$email')";
if(!mysql_query($insert))
{
 die('Error:'.mysql_error());
}
else
{
 header("Location:view_event.php");
}
?>
