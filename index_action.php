<?php
include('travel_db_connect.php');

$fname = mysql_real_escape_string($_POST['fname']);
$lname = mysql_real_escape_string($_POST['lname']);
$email = mysql_real_escape_string($_POST['email']);
$pnumber = mysql_real_escape_string($_POST['pnumber']);
$password = md5(mysql_real_escape_string($_POST['password']));
$country = $_POST['country'];
$gender = $_POST['gender'];


if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
  header("Location:index.php?msg=3");
}
else
{
if(empty($fname) or empty($lname) or empty($email) or empty($password) or empty($gender))
{
  header("Location:index.php?msg=1");
}
else if(!empty($fname) or !empty($lname) or !empty($email) or !empty($password) or !empty($gender))
{
   $qry = mysql_query("SELECT email FROM info WHERE email='$email'");
   if(mysql_num_rows($qry)>0)
   {
     header("Location:index.php?msg=2");
    }
	else if(mysql_num_rows($qry)==0)
	{
	  $qry_pnumber = mysql_query("SELECT * FROM info WHERE pnumber='$pnumber'");
	  if(!$qry_pnumber)
	  {
	    die('Error on 33:'.mysql_error());
	  }
	  $row = mysql_fetch_array($qry_pnumber);
	  if(mysql_num_rows($qry_pnumber)>0)
	  {
	    header("Location:index.php?msg=4");
	  }
	  else if(mysql_num_rows($qry_pnumber)==0)
	  {
	    $confirm_code = rand();
	    $insert = "INSERT INTO info(fname,lname,email,pnumber,password,country,gender,confirmed,confirm_code) VALUES ('$fname','$lname','$email','$pnumber','$password','$country','$gender','0','$confirm_code')";
		if(!mysql_query($insert))
		{
		  die('Error on 45:'.mysql_error());
		}
		else
		{
		 $message = "<p style='font-size:20px;color:#00FF66;'>Confirm your email.<br>Please
		 click the link below to confirm your email and verify your account.<br>
		 <span style='font-size:20px;color:lime;text-decoration:none;'>http://yourziara.com/email_confirm.php?email=$email & code=$confirm_code</span></p>";
		 mail($email,"Ziara Confirm Email",$message,"From:ziaraadmin@yourziara.com");
		  echo"<span style='color:red;font-size:20px;'>Registration Successful.Please Login to your email and confirm your email address.</span>";
		}
	  }
	  }
	  }
	  }
	  
	
 ?>