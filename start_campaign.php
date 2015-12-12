<?php
session_start();
include('travel_db_connect.php');
if(isset($_POST['submit']))
{
if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
{
    header("Location:ppic_change.php?msg=1");
}
else
{
     $image = addslashes($_FILES['image']['tmp_name']);
	 $name = addslashes($_FILES['image']['name']);
	 $image = file_get_contents($image);
	 $image = base64_encode($image);
	 $admin = $_SESSION['email'];
	 $cname = mysql_real_escape_string($_POST['cname']);
	 $subject = mysql_real_escape_string($_POST['subject']);
	 $architect = mysql_real_escape_string($_POST['architect']);
	 $email = mysql_real_escape_string($_POST['email']);
	 $pnumber = mysql_real_escape_string($_POST['pnumber']);
	 $website = mysql_real_escape_string($_POST['website']);
	 $description = mysql_real_escape_string($_POST['description']);
	 
  }
}
?>
<?php
if(empty($cname)or empty($subject)or empty($architect)or empty($email)or empty($pnumber)or empty($website)or empty($description)or empty($image))
{
   header("Location:my_campaigns.php?msg=1");
}
else
{
  $insert = "INSERT INTO campaigns(cname,subject,architect,email,pnumber,website,description,admin,image)VALUES('$cname','$subject','$architect','$email','$pnumber','$website','$description','$admin','$image')";
  if(!mysql_query($insert))
  {
    die('Error on 33:'.mysql_error());
  }
  else
  {
    header("Location:my_campaigns.php?msg=2");
  }
}
?>