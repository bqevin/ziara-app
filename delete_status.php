<?php
session_start();
include('travel_db_connect.php');
$status_id = $_GET['status_id'];
$delete = "DELETE FROM status WHERE status_id='$status_id'";
if(!mysql_query($delete))
{
  die('Error on 5:'.mysql_error());
}
else
{
  header("Location:country.php");
}
?>