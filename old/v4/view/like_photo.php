<?php
session_start();
include('../config/database/travel_db_connect.php');

  $status_id = $_GET['status_id'];
  $email = $_SESSION['email'];
  $insert = "INSERT INTO status_like(status_id,status_liker_email)VALUES('$status_id','$email')";
  if(!mysql_query($insert))
  {
    die('Error:'.mysql_error());
   }
   else
   {
     header("Location:indexxx.php");
   }
  
  ?>