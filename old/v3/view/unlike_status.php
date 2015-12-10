<?php
session_start();
include('../config/database/travel_db_connect.php');

  $status_id = $_GET['status_id'];
  $email = $_SESSION['email'];
  $delete = "DELETE FROM status_like WHERE status_id = '$status_id' AND status_liker_email = '$email'";
  if(!mysql_query($delete))
  {
    die('Error:'.mysql_error());
   }
   else
   {
     header("Location:indexxx.php");
   }
   
  
  ?>