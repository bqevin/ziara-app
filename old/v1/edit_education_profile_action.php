<?php
session_start();
include('travel_db_connect.php');
$my_email = $_SESSION['email'];

$centre = $_POST['centre'];
$service = $_POST['service'];
$number = $_POST['number'];
$email = $_POST['email'];
$website = $_POST['website'];
$country = $_POST['country'];
$location = $_POST['location'];

$description = $_POST['description'];
$education_id = $_SESSION['admin_education_id'];
$update = "UPDATE education SET centre='$centre',service='$service',number='$number',email='$email',website='$website',country='$country',location='$location',description='$description'WHERE admin_email = '$my_email'AND education_id = '$education_id'";
if(!mysql_query($update))
{
 die('Error:'.mysql_error());
}
else
{
 header("Location:view_admin_education.php");
}
?>