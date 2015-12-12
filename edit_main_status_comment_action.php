<?php
session_start();
include('travel_db_connect.php');
$id = $_POST['id'];
$status = $_POST['status'];
$update = "UPDATE comments SET status='$status'WHERE id='$id'";
if(!mysql_query($update))
{
 die('Error:'.mysql_error());
}
else
{
header("Location:comment_status.php");
}
?>