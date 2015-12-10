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
	 $employer = mysql_real_escape_string(($_POST['employer']));
	 $job = mysql_real_escape_string($_POST['job']);
	 $number = mysql_real_escape_string($_POST['number']);
	 $email = mysql_real_escape_string($_POST['email']);
	 $admin_email = $_SESSION['email'];
	 $website = mysql_real_escape_string($_POST['website']);
	 $location = mysql_real_escape_string($_POST['location']);
	 $description = mysql_real_escape_string($_POST['description']);
	 $country = $_SESSION['country'];
	 
  }
  }
  if(empty($employer)or empty($job)or empty($number)or empty($email)or empty($website)or empty($location)or empty($description))
  {
    header("Location:../../view/jobs.php?msg=2");
  }
  if(!empty($employer)or !empty($job)or !empty($number)or !empty($email)or !empty($website)or !empty($location)or !empty($description))
  {
  $insert = "INSERT INTO jobs(employer,job,number,email,admin_email,website,location,country,description,name,photo)VALUES('$employer','$job','$number','$email','$admin_email','$website','$location','$country','$description','$name','$image')";
  if(!mysql_query($insert))
  {
  die('Error:'.mysql_error());
  }
  else
  {
  header("Location:../../view/jobs.php?msg=1");
  }
  }
  ?>
	 
