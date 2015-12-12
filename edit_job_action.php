<?php
session_start();
include('travel_db_connect.php');
$job_id = $_POST['job_id'];
$fname = mysql_real_escape_string($_POST['fname']);
$type = mysql_real_escape_string($_POST['type']);
$pnumber = mysql_real_escape_string($_POST['pnumber']);
$email = mysql_real_escape_string($_POST['email']);
$website = mysql_real_escape_string($_POST['website']);
$location = mysql_real_escape_string($_POST['location']);
$description = mysql_real_escape_string($_POST['description']);
if(empty($fname) or empty($type) or empty($pnumber) or empty($email) or empty($location) or empty($description))
{
   header("Location:edit_job.php?msg=1");
}
else
{
   $update = "UPDATE jobs SET fname='$fname',type='$type',pnumber='$pnumber',email='$email',website='$website',location='$location',description='$description' WHERE job_id='$job_id'";
   if(!mysql_query($update))
   {
     die('Error on 18:'.mysql_error());
   }
   else
   {
      header("Location:see_job.php?job_id=$job_id");
   }
}

?>