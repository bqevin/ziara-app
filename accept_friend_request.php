<?php
session_start();
include('travel_db_connect.php');
$guest_friend = $_GET['guest_friend'];
$host_friend = $_SESSION['email'];
$insert = "INSERT INTO friendship(guest_friend,host_friend)VALUES('$guest_friend','$host_friend')";
if(!mysql_query($insert))
{
  die('Error on 6:'.mysql_error());
}
else
{
  $delete = "DELETE FROM friend_requests WHERE guest_friend='$guest_friend'AND host_friend='$host_friend'";
  if(!mysql_query($delete))
  {
    die('Error on 13:'.mysql_error());
  }
  else
  {
    header("Location:scroll_friends.php");
  }
}
?>