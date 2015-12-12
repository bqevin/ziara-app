<?php
session_start();
include('travel_db_connect.php');
$host_friend = $_POST['host_friend'];
$guest_friend = $_SESSION['email'];
$insert = "INSERT INTO friend_requests(guest_friend,host_friend)VALUES('$guest_friend','$host_friend')";
if(!mysql_query($insert))
{
  die('Error on 6:'.mysql_error());
}
else
{
  header("Location:scroll_friends.php");
}
?>