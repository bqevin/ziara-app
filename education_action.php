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
	 $centre = mysql_real_escape_string($_POST['centre']);
	 $service = mysql_real_escape_string($_POST['service']);
	 $number = mysql_real_escape_string($_POST['number']);
	 $email = mysql_real_escape_string($_POST['email']);
	 $admin_email = $_SESSION['email'];
	 $website = mysql_real_escape_string($_POST['website']);
	 $location = mysql_real_escape_string($_POST['location']);
	 $courses = mysql_real_escape_string($_POST['courses']);
	 $description = mysql_real_escape_string($_POST['description']);
	 $country = $_SESSION['country'];
	 
  }
  }
  if(empty($centre)or empty($service)or empty($number)or empty($email)or empty($website)or empty($location)or empty($courses)or empty($description))
  {
    header("Location:education.php?msg=2");
 }
 if(!empty($centre)or !empty($service)or !empty($number)or !empty($email)or !empty($website)or !empty($location)or !empty($courses)or !empty($description))
 {
  $insert = "INSERT INTO education(centre,service,number,email,admin_email,website,location,courses,description,country,name,photo)VALUES('$centre','$service','$number','$email','$admin_email','$website','$location','$courses','$description','$country','$name','$image')";
  if(!mysql_query($insert))
  {
  die('Error:'.mysql_error());
  }
  else
  {
  header("Location:education.php?msg=1");
  }
  }
  ?>
	 
