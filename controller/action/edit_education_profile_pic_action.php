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
	 $education_id = $_SESSION['admin_education_id'];
	 
  }
  }
  $update = "UPDATE education SET photo = '$image' WHERE admin_email = '$email'AND education_id = '$education_id'";
  if(!mysql_query($update))
  {
  die('Error:'.mysql_error());
  }
  else
  {
  header("Location:../../view/view_admin_education.php");
  }
  ?>
	 
