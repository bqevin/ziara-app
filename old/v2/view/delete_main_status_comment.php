<?php
session_start();
include('../config/database/travel_db_connect.php');
$id = $_GET['id'];
$delete = "DELETE FROM comments WHERE id='$id'";
if(!mysql_query($delete))
{
  die('Error:'.mysql_error());
}
else
{
header("Location:comment_status.php");
}
?>