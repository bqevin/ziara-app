<?php
session_start();
include('travel_db_connect.php');
if(isset($_POST['submit']))
{
if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
{
   $campaign_id = $_POST['campaign_id'];
    header("Location:photo_status_campaign.php?msg=1 & campaign_id=$campaign_id");
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
	 $campaign = "true";
	 $campaign_id = $_POST['campaign_id'];
	 $cname = $_POST['cname'];
	 
  }
}
if(empty($image))
{
  header("Location:photo_status_campaign.php?msg=2&campaign_id=$campaign_id");
}
else
{
$update = "INSERT INTO status(fname,lname,email,country,status,name,image,campaign,campaign_id,cname)VALUES('$fname','$lname','$email','$country','$status','$name','$image','$campaign','$campaign_id','$cname')";
if(!mysql_query($update))
{
  die('Error:'.mysql_error());
}
else
{
  header("Location:campaign_status.php?msg=2 & campaign_id=$campaign_id & cname=$cname");
}
}

?>