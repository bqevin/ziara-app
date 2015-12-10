<?php
include('../config/database/travel_db_connect.php');
$event_id = $_POST['event_id'];
$email = $_POST['attendee_email'];
$delete = "DELETE FROM event_attend WHERE event_id = '$event_id' AND attendee_email = '$email'";
if(!mysql_query($delete))
{
 die('Error:'.mysql_error());
}
else
{
header("Location:../controller/events/view_event.php");
}
?>