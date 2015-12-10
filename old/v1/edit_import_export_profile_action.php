<?php
session_start();
include('travel_db_connect.php');
$my_email = $_SESSION['email'];

$business = $_POST['business'];
$type = $_POST['type'];
$products = $_POST['products'];
$number = $_POST['number'];
$email = $_POST['email'];
$website = $_POST['website'];
$country = $_POST['country'];
$location = $_POST['location'];
$price = $_POST['price'];
$description = $_POST['description'];
$import_export_id = $_SESSION['admin_import_export_id'];
$update = "UPDATE import_export SET business='$business',type='$type',products ='$products',number='$number',email='$email',website='$website',country='$country',location='$location',description='$description'WHERE admin_email = '$my_email'AND import_export_id = '$import_export_id'";
if(!mysql_query($update))
{
 die('Error:'.mysql_error());
}
else
{
 header("Location:view_admin_import_export.php");
}
?>