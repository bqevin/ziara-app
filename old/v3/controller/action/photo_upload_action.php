<?php
session_start();
include('../../config/database/travel_db_connect.php');
if(isset($_POST['sumit']))
{
   if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
   {
     echo"Please Select An Image!";
	}
	else
	{
	$image = addslashes($_FILES['image']['tmp_name']);
	$name = addslashes($_FILES['image']['name']);
	$email = $_SESSION['email'];
	$image = file_get_contents($image);
	$image = base64_encode($image);
	saveimage($email,$image);
	}
}
function saveimage($email,$image)
{
   $qry = "UPDATE info SET image= '$image' WHERE email='$email'";
   $result = mysql_query($qry);
   if($result)
   {
     header("Location:../../view/add_info.php?msg=1");
   }
   else
   {
   header("Location:../../view/photo_upload.php?msg=2");
   }
  }
  ?>
   