<?php
session_start();
include('travel_db_connect.php');
$my_email = $_SESSION['email'];
$buddy_email = $_POST['email'];
$delete = "DELETE FROM friends WHERE you = '$my_email' AND friend_email = '$buddy_email'";
if(!mysql_query($delete))
{
 die('Error:'.mysql_error());
}
else
{
header("Location:Friends.php");
}
?>