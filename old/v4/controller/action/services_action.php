<?php
session_start();
include('../../config/database/travel_db_connect.php');
if(isset($_POST['submit']))
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
	 $business = mysql_real_escape_string($_POST['business']);
	 $service = mysql_real_escape_string($_POST['service']);
	 $number = mysql_real_escape_string($_POST['number']);
	 $admin_email =($_SESSION['email']);
	 $email = mysql_real_escape_string($_POST['email']);
	 $website = mysql_real_escape_string($_POST['website']);
	 $location = mysql_real_escape_string($_POST['location']);
	 $description = mysql_real_escape_string($_POST['description']);
	 $country = $_SESSION['country'];
	 
  }
  }
  if(empty($business)or empty($service)or empty($number)or empty($email)or empty($website)or empty($location)or empty($description))
  {
    header("Location:../../view/Service.php?msg=2");
  }
  if(!empty($business)or !empty($service)or !empty($number)or !empty($email)or !empty($website)or !empty($location)or !empty($description))
  {
  $insert = "INSERT INTO service(business,service,number,admin_email,email,website,location,description,country,name,photo)VALUES('$business','$service','$number','$admin_email','$email','$website','$location','$description','$country','$name','$image')";
  if(!mysql_query($insert))
  {
  die('Error:'.mysql_error());
  }
  else
  {
  header("Location:../../view/Service.php?msg=1");
  }
  }
  ?>
	 
