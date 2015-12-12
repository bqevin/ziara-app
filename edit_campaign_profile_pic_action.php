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
	 $campaign_id = $_POST['campaign_id'];
	 
  }
  }
  $update = "UPDATE campaign SET photo = '$image' WHERE campaign_id = '$campaign_id'";
  if(!mysql_query($update))
  {
  die('Error:'.mysql_error());
  }
  else
  {
  header("Location:view_admin_campaign.php");
  }
  ?>
	 
