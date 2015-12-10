<?php
session_start();
include('../config/database/travel_db_connect.php');
$you = $_POST['you'];
$friend_email = $_POST['friend_email'];
$country = $_POST['country'];
$insert = "INSERT INTO friends(you,friend_email,country)VALUES('$you','$friend_email','$country')";
if(!mysql_query($insert))
{
 die('Error:'.mysql_error());
}
else
{
header("Location:friends.php");
}
?>