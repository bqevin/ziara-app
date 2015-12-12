<?php
session_start();
include('../../config/database/travel_db_connect.php');
$my_email = $_SESSION['email'];

$employer = $_POST['employer'];
$job = $_POST['job'];
$number = $_POST['number'];
$email = $_POST['email'];
$website = $_POST['website'];
$country = $_POST['country'];
$location = $_POST['location'];

$description = $_POST['description'];
$job_id = $_SESSION['admin_job_id'];
$update = "UPDATE jobs SET employer='$employer',job='$job',number='$number',email='$email',website='$website',country='$country',location='$location',description='$description'WHERE admin_email = '$my_email'AND jobs_id = '$job_id'";
if(!mysql_query($update))
{
 die('Error:'.mysql_error());
}
else
{
 header("Location:../../view/view_admin_job.php");
}
?>