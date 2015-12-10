<?php
session_start();
include('../../config/database/travel_db_connect.php');
if(isset($_POST['sumit']))
{
  if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
  {
     echo"Please select an image.";
  }
  else
  {
     $image = addslashes($_FILES['image']['tmp_name']);
	 $name = addslashes($_FILES['image']['name']);
	 $image = file_get_contents($image);
	 $image = base64_encode($image);
	 $email = $_SESSION['email'];
	 $import_export_id = $_SESSION['admin_import_export_id'];
	 
  }
  }
  $update = "UPDATE import_export SET photo = '$image' WHERE admin_email = '$email'AND import_export_id = '$import_export_id'";
  if(!mysql_query($update))
  {
  die('Error:'.mysql_error());
  }
  else
  {
  header("Location:../../view/view_admin_import_export.php");
  }
  ?>
	 
