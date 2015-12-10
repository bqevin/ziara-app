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
	 $fname = $_SESSION['fname'];
	 $lname = $_SESSION['lname'];
	 $email = $_SESSION['email'];
	 $status = $_POST['status'];
	 $country = $_SESSION['country'];
  }
  }
  $insert = "INSERT INTO status(fname,lname,email,status,country,name,image)VALUES('$fname','$lname','$email','$status','$country','$name','$image')";
  if(!mysql_query($insert))
  {
  die('Error:'.mysql_error());
  }
  else
  {
  header("Location:../../view/indexxx.php?msg=1");
  }
  ?>
	 