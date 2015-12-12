<?php
session_start();
include('travel_db_connect.php');
$liker_email = $_SESSION['email'];
$status_id = $_GET['status_id'];
$insert = "INSERT INTO likes(status_id,liker_email)VALUES('$status_id','$liker_email')";
if(!mysql_query($insert))
{
  die('Error on 6:'.mysql_error());
}
else
{
  header("Location:country.php");
}
?>