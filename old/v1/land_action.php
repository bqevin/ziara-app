<?php
session_start();
include('travel_db_connect.php');
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
	 $company = mysql_real_escape_string($_POST['company']);
	 $number = mysql_real_escape_string($_POST['number']);
	 $email = mysql_real_escape_string($_POST['email']);
	 $admin_email = $_SESSION['email'];
	 $website = mysql_real_escape_string($_POST['website']);
	 $location = mysql_real_escape_string( $_POST['location']);
	 $price = mysql_real_escape_string($_POST['price']);
	 
	 $description = mysql_real_escape_string($_POST['description']);
	 $country = $_SESSION['country'];
	 
  }
  }
  if(empty($company)or empty($number)or empty($email)or empty($website)or empty($location)or empty($price)or empty($description))
  {
    header("Location:land.php?msg=2");
  }
  if(!empty($company)or !empty($number)or !empty($email)or !empty($website)or !empty($location)or !empty($price)or !empty($description))
  {
  $insert = "INSERT INTO land(company,number,email,admin_email,website,location,price,description,name,photo,country)VALUES('$company','$number','$email','$admin_email','$website','$location','$price','$description','$name','$image','$country')";
  if(!mysql_query($insert))
  {
  die('Error:'.mysql_error());
  }
  else
  {
  header("Location:land.php?msg=1");
  }
  }
  ?>
	 
