<?php
session_start();
include('travel_db_connect.php');
$my_email = $_SESSION['email'];

$business = $_POST['business'];
$service = $_POST['service'];
$number = $_POST['number'];
$email = $_POST['email'];
$website = $_POST['website'];
$country = $_POST['country'];
$location = $_POST['location'];
$price = $_POST['price'];
$description = $_POST['description'];
$service_id = $_SESSION['admin_service_id'];
$update = "UPDATE service SET business='$business',service='$service',number='$number',email='$email',website='$website',country='$country',location='$location',description='$description'WHERE admin_email = '$my_email'AND service_id = '$service_id'";
if(!mysql_query($update))
{
 die('Error:'.mysql_error());
}
else
{
 header("Location:view_admin_service.php");
}
?>