<?php
session_start();
include('travel_db_connect.php');
if(isset($_POST['submit']))
{
if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
{
    header("Location:edit_campaign_pic.php?msg=1");
}
else
{
     $image = addslashes($_FILES['image']['tmp_name']);
	 $name = addslashes($_FILES['image']['name']);
	 $image = file_get_contents($image);
	 $image = base64_encode($image);
	 $email = $_SESSION['email'];
	 $campaign_id = $_POST['campaign_id'];
	 
  }
}
if(empty($image))
{
  header("Location:edit_campaign_pic.php?msg=2");
}
else
{
$update = "UPDATE campaigns SET image = '$image' WHERE campaign_id='$campaign_id'";
if(!mysql_query($update))
{
  die('Error:'.mysql_error());
}
else
{
  header("Location:see_campaign.php?campaign_id=$campaign_id");
}
}

?>