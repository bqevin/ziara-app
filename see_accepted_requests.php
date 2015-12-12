<?php
session_start();
include('travel_db_connect.php');
$my_email = $_SESSION['email'];
$insert = "REPLACE INTO seen_friendship(guest_friend,host_friend)SELECT guest_friend,host_friend FROM friendship WHERE guest_friend='$my_email'";
if(!mysql_query($insert))
{
  die('Error on 5:'.mysql_error());
}
else
{
  header("Location:see_accepted.php");
}
?>