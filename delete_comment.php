<?php
session_start();
include('travel_db_connect.php');
$owner_email = $_GET['owner_email'];
$comment_id = $_GET['comment_id'];
$status_id = $_GET['status_id'];
$delete = "DELETE FROM comments WHERE comment_id='$comment_id'";
if(!mysql_query($delete))
{
  die('Error on 6:'.mysql_error());
}
else
{
  header("Location:comment.php?status_id=$status_id & owner_email=$owner_email");
}
?>