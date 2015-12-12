<?php
session_start();
include('travel_db_connect.php');
$my_email = $_SESSION['email'];
$guest_friend = $_GET['guest_friend'];
$host_friend = $_GET['host_friend'];
$delete = "DELETE FROM friendship WHERE guest_friend='$guest_friend'AND host_friend='$host_friend'";
if(!mysql_query($delete))
{
  die('Error on 7:'.mysql_error());
}
else
{
  header("Location:Friends.php");
}
?>  