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
	 $owner = mysql_real_escape_string( $_POST['owner']);
	 $event =mysql_real_escape_string ($_POST['event']);
	 $number =mysql_real_escape_string ($_POST['number']);
	 $email = mysql_real_escape_string($_POST['email']);
	 $admin_email = $_SESSION['email'];
	 $website = mysql_real_escape_string($_POST['website']);
	 $daye = mysql_real_escape_string($_POST['daye']);
	 $monthe = mysql_real_escape_string($_POST['monthe']);
	 $yeare = mysql_real_escape_string($_POST['yeare']);
	 $location =mysql_real_escape_string($_POST['location']);
	 $description =mysql_real_escape_string($_POST['description']);
	 $country = $_SESSION['country'];
	 
  }
  }
  if(empty($owner)or empty($event)or empty($number)or empty($email)or empty($website)or empty($daye)or empty($monthe)or empty($yeare)or empty($location)or empty($description))
  {
    header("Location:events.php?msg=2");
   }
   if(!empty($owner)or !empty($event)or !empty($number)or !empty($email)or !empty($website)or !empty($daye)or !empty($monthe)or !empty($yeare)or !empty($location)or !empty($description))
   {
  $insert = "INSERT INTO events (owner,event,number,email,admin_email,website,daye,monthe,yeare,location,description,country,photo) VALUES ('$owner','$event','$number','$email','$admin_email','$website','$daye','$monthe','$yeare','$location','$description','$country','$image')";
  if(!mysql_query($insert))
  {
  die('Error:'.mysql_error());
  }
  else
  {
  header("Location:events.php?msg=1");
  }
  }
  ?>
	 
