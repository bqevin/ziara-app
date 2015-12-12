<?php
session_start();
include('travel_db_connect.php');
if(isset($_POST['submit']))
{
if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
{
    header("Location:create_job.php?msg=1");
}
else
{
  $image = addslashes($_FILES['image']['tmp_name']);
  $name = addslashes($_FILES['image']['name']);
  $image = file_get_contents($image);
  $image = base64_encode($image);
  $fname = mysql_real_escape_string($_POST['fname']);
  $type = mysql_real_escape_string($_POST['type']);
  $pnumber = mysql_real_escape_string($_POST['pnumber']);
  $admin_email = $_SESSION['email'];
  $email = mysql_real_escape_string($_POST['email']);
  $country = $_SESSION['country'];
  $website = mysql_real_escape_string($_POST['website']);
  $location = mysql_real_escape_string($_POST['location']);
  $description = mysql_real_escape_string($_POST['description']);
}
}
?>
<?php
if(empty($fname) or empty($type) or empty($pnumber) or empty($email) or empty($location) or empty($description) or empty($image))
{
   header("Location:create_job.php?msg=2");
}
else
{
$insert = "INSERT INTO jobs(fname,type,pnumber,admin_email,email,website,location,description,country,photo)VALUES('$fname','$type','$pnumber','$admin_email','$email','$website','$location','$description','$country','$image')";
if(!mysql_query($insert))
{
  die('Error on 27:'.mysql_error());
}
else
{
  header("Location:create_job.php?msg=3");
}
}
?>
  