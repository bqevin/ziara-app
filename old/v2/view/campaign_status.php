<?php
session_start();
include('../config/database/travel_db_connect.php');
$id = $_POST['id'];
$name = $_POST['name'];
$country = $_SESSION['country'];
$email = $_POST['admin_email'];
$status = mysql_real_escape_string($_POST['status']);
if(empty($status))
{
 header("Location:view_campaign.php?msg=3");
}
if(!empty($status))
{
$insert = "INSERT INTO campaign_status(id,name,country,admin_email,status)VALUES('$id','$name','$country','$email','$status')";
if(!mysql_query($insert))
{
 die('Error:'.mysql_error());
}
else
{
header("Location:view_campaign.php?msg=1");
}
}
?>