<?php
session_start();
include('travel_db_connect.php');
$liker_email = $_SESSION['email'];
$status_id = $_GET['status_id'];
$delete = "DELETE FROM likes WHERE liker_email='$liker_email'AND status_id='$status_id'";
if(!mysql_query($delete))
{
  die('Error on 6:'.mysql_error());
}
else
{
  header("Location:country.php");
}
?>