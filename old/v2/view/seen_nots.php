<?php
include('../config/database/travel_db_connect.php');
$status_owner = $_GET['status_owner'];

$insert = "REPLACE INTO seen_nots(status_id,fname,lname,commenter_email,status,status_owner)SELECT status_id,fname,lname,commenter_email,status,status_owner FROM comments WHERE status_owner='$status_owner'";
if(!mysql_query($insert))
{
 die('Error:'.mysql_error());
}
else
{
 header("Location:Notifications.php");
 }
 
 ?>