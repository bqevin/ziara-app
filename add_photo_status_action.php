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
	 $names = addslashes($_FILES['image']['name']);
	 $image = file_get_contents($image);
	 $image = base64_encode($image);
	 $id = $_POST['id'];
$name = $_POST['name'];
$country = $_SESSION['country'];
$email = $_SESSION['email'];
$status = $_POST['status'];
}
}
$insert = "INSERT INTO event_status(id,name,country,admin_email,status,photo)VALUES('$id','$name','$country','$email','$status','$image')";
if(!mysql_query($insert))
{
 die('Error:'.mysql_error());
}
else
{
header("Location:view_event.php?msg=2");
}
?>
	 