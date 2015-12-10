<?php
include('../../config/database/travel_db_connect.php');
if(isset($_POST['sumit']))
{
$fname = mysql_real_escape_string($_POST['fname']);
$lname = mysql_real_escape_string($_POST['lname']);
$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
$country = $_POST['country'];
$gender = $_POST['gender'];
$job = $_POST['job'];
$skills = $_POST['skills'];
$religion = $_POST['religion'];
$relationship = $_POST['relationship'];
$kids = $_POST['kids'];
$hobbies = $_POST['hobbies'];
$places = $_POST['places'];
$about = $_POST['about'];
$image = null;
}
if(empty($fname) or empty($lname) or empty($email) or empty($password) or empty($gender))
{
  header("Location:../../index.php?msg=1");
}
else if(!empty($fname) or !empty($lname) or !empty($email) or !empty($password) or !empty($gender))
{
   $qry = mysql_query("SELECT email FROM info WHERE email='$email'");
   if(mysql_num_rows($qry)>0)
   {
     header("Location:../../index.php?msg=2");
    }
	else if(mysql_num_rows($qry)==0)
	{
	$insert = "INSERT INTO info(fname,lname,email,password,country,gender,job,skills,religion,relationship,kids,hobbies,places,about,image)VALUES('$fname','$lname','$email','$password','$country','$gender','$job','$skills','$religion','$relationship','$kids','$hobbies','$places','$about','$image')";
    if(!mysql_query($insert))
   {
    die('Error:'.mysql_error());
    }
  else
  {
   header("Location:../../view/login.php?msg=1");
   }
  }
  }
 ?>