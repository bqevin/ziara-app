<?php
session_start();
include('travel_db_connect.php');
if(isset($_POST['submit']))
{
if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
{
    header("Location:photo_status.php?msg=1");
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
	 $country = $_SESSION['country'];
	 $status = $_POST['status'];
	 $campaign = "false";
	 
  }
}
if(empty($image))
{
  header("Location:photo_status.php?msg=2");
}
else
{
$update = "INSERT INTO status(fname,lname,email,country,status,campaign,name,image)VALUES('$fname','$lname','$email','$country','$status','$campaign','$name','$image')";
if(!mysql_query($update))
{
  die('Error:'.mysql_error());
}
else
{
  header("Location:country.php?msg=2");
}
}

?>