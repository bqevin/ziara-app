<?php
include('../config/database/travel_db_connect.php');
$my_email = $_POST['you'];
$email = $_POST['friend_email'];
$delete = "DELETE FROM friends WHERE you = '$my_email' AND friend_email = '$email'";
if(!mysql_query($delete))
{
 die('Error:'.mysql_error());
}
else
{
header("Location:friends_here.php");
}
?>