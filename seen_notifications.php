<?php
session_start();
include('travel_db_connect.php');
$my_email = $_SESSION['email'];
$insert = "REPLACE INTO see_nots2(see_nots_id,status_id,commenters,email)SELECT see_nots_id,status_id,commenters,email FROM see_nots WHERE email = '$my_email'";
if(!mysql_query($insert))
{
  die('Error on 5:'.mysql_error());
}
else
{
$delete = "DELETE FROM see_nots WHERE email='$my_email'";
if(!mysql_query($delete))
{
  die('Error on 12:'.mysql_error());
}
else
{
  header("Location:notifications.php");
}
}
?>