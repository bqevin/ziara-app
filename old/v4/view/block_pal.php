<?php
session_start();
include('../config/database/travel_db_connect.php');
$my_email = $_SESSION['email'];
$pal_email = $_POST['email'];
$delete = "DELETE FROM friends WHERE you = '$pal_email' AND friend_email = '$my_email'";
if(!mysql_query($delete))
{
 die('Error:'.mysql_error());
}
else
{
header("Location:Friends.php");
}
?>