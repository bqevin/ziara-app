<?php
session_start();
include('travel_db_connect.php');
if(isset($_POST['submit']))
{
if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
{
    header("Location:edit_job_ppic.php?msg=1");
}
else
{
     $image = addslashes($_FILES['image']['tmp_name']);
	 $name = addslashes($_FILES['image']['name']);
	 $image = file_get_contents($image);
	 $image = base64_encode($image);
	 $email = $_SESSION['email'];
	 $job_id = $_POST['job_id'];
	 
  }
}
if(empty($image))
{
  header("Location:edit_job_ppic.php?msg=2");
}
else
{
$update = "UPDATE jobs SET photo = '$image' WHERE job_id='$job_id'";
if(!mysql_query($update))
{
  die('Error:'.mysql_error());
}
else
{
  header("Location:see_job.php?job_id=$job_id");
}
}

?>