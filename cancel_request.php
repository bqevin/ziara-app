<?php
session_start();
include('travel_db_connect.php');
$guest_friend = $_SESSION['email'];
$host_friend = $_POST['host_friend'];
$delete = "DELETE FROM friend_requests WHERE guest_friend='$guest_friend'AND host_friend='$host_friend'";
if(!mysql_query($delete))
{
  die('Error on 6:'.mysql_error());
}
else
{
  header("Location:scroll_friends.php");
}
?>