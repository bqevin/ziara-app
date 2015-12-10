<?php
session_start();
include('travel_db_connect.php');
$my_email = $_SESSION['email'];
$codee = $_POST['codee'];
$bye = $_POST['bye'];
$email = $_POST['email'];
$number = $_POST['number'];
$website = $_POST['website'];
$country = $_POST['country'];
$description = $_POST['description'];
$campaign_id = $_SESSION['admin_campaign_id'];
if(empty($codee)or empty($bye)or empty($email)or empty($number)or empty($website)or empty($country)or empty($description))
{
  header("Location:edit_campaign_profile.php?msg=1");
}
if(!empty($codee)or !empty($bye)or !empty($email)or !empty($number)or !empty($website)or !empty($country)or !empty($description))
{
$update = "UPDATE campaign SET codee='$codee',bye='$bye',email='$email',number='$number',website='$website',country='$country',description='$description'WHERE admin_email = '$my_email'AND campaign_id = '$campaign_id'";
if(!mysql_query($update))
{
 die('Error:'.mysql_error());
}
else
{
 header("Location:view_admin_campaign.php");
}
}
?>