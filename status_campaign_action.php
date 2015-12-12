<?php
session_start();
include('travel_db_connect.php');
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$country = $_SESSION['country'];
$campaign = "true";
$campaign_id = $_POST['campaign_id'];
$cname = $_POST['cname'];
$status = mysql_real_escape_string($_POST['status']);

if(empty($status))
{
  header("Location:campaign_status.php?msg=1 & campaign_id= $campaign_id & cname=$cname");
}
else if(!empty($status))
{
  $insert = "INSERT INTO status(fname,lname,email,country,status,campaign,campaign_id,cname)VALUES('$fname','$lname','$email','$country','$status','$campaign','$campaign_id','$cname')";
  if(!mysql_query($insert))
  {
    die('Error on 15:'.mysql_error());
  }
  else
  {
    header("Location:campaign_status.php?msg=2 & campaign_id= $campaign_id & cname=$cname");
  }
}
?>