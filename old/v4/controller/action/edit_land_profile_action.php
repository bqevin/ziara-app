<?php
session_start();
include('../../config/database/travel_db_connect.php');
$my_email = $_SESSION['email'];

$company = $_POST['company'];
$number = $_POST['number'];
$email = $_POST['email'];
$website = $_POST['website'];
$country = $_POST['country'];
$location = $_POST['location'];
$price = $_POST['price'];
$description = $_POST['description'];
$land_id = $_SESSION['admin_land_id'];
$update = "UPDATE land SET company='$company',number='$number',email='$email',website='$website',country='$country',location='$location',price='$price',description='$description'WHERE admin_email = '$my_email'AND land_id = '$land_id'";
if(!mysql_query($update))
{
 die('Error:'.mysql_error());
}
else
{
 header("Location:../../view/view_admin_land.php");
}
?>