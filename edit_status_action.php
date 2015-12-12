<?php
session_start();
include('travel_db_connect.php');
$status_id = $_POST['status_id'];
$status = $_POST['status'];
if(empty($status))
{
   header("Location:edit_status.php?msg=1&status_id=$status_id");
}
else if(!empty($status))
{
  $update = "UPDATE status SET status='$status'WHERE status_id='$status_id'";
  if(!mysql_query($update))
  {
    die('Error on 12:'.mysql_error());
  }
  else
  {
    header("Location:country.php");
  }
}

?>