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
	 $code = mysql_real_escape_string( $_POST['codee']);
	 $subject = mysql_real_escape_string( $_POST['title']);
	 $by = mysql_real_escape_string($_POST['bye']);
	 $email = mysql_real_escape_string( $_POST['email']);
	 $admin_email = ( $_SESSION['email']);
	 $number = mysql_real_escape_string( $_POST['number']);
	 $website = mysql_real_escape_string($_POST['website']);
	 $description = mysql_real_escape_string( $_POST['description']);
	 $country = $_SESSION['country'];
	 
  }
  }
  if(empty($code)or empty($subject) or empty($by) or empty($email) or empty($number) or empty($website) or empty($description))
  {
    header("Location:Campaigns.php?msg=2");
  }
  if(!empty($code)or !empty($subject) or !empty($by) or !empty($email) or !empty($number) or !empty($website) or !empty($description))
  {
  $insert = "INSERT INTO campaign (codee,title,bye,email,admin_email,number,website,description,photo,country) VALUES ('$code','$subject','$by','$email','$admin_email','$number','$website','$description','$image','$country')";
  if(!mysql_query($insert))
  {
  die('Error:'.mysql_error());
  }
  else
  {
  header("Location:Campaigns.php?msg=1");
  }
  }
  ?>
	 
