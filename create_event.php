<?php
session_start();
include('travel_db_connect.php');
if(isset($_POST['submit']))
{
if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
{
    header("Location:my_events.php?msg=1");
}
else
{
  $image = addslashes($_FILES['image']['tmp_name']);
  $name = addslashes($_FILES['image']['name']);
  $image = file_get_contents($image);
  $image = base64_encode($image);
  $owner = mysql_real_escape_string($_POST['who']);
  $event = mysql_real_escape_string($_POST['event']);
  $pnumber = mysql_real_escape_string($_POST['pnumber']);
  $email = mysql_real_escape_string($_POST['email']);
  $daye = mysql_real_escape_string($_POST['daye']);
  $monthe = mysql_real_escape_string($_POST['monthe']);
  $yeare = mysql_real_escape_string($_POST['yeare']);
  $location = mysql_real_escape_string($_POST['location']);
  $description = mysql_real_escape_string($_POST['description']);
  $admin_email = $_SESSION['email'];
  $country = $_SESSION['country'];
}
}
?>
<?php
if(empty($owner) or empty($event) or empty($pnumber) or empty($email) or empty($daye) or empty($monthe) or empty($yeare) or empty($location) or empty($description) or empty($image))
{
    header("Location:my_events.php?msg=2");
}
else
{
  $insert = "INSERT INTO events(owner,event,pnumber,email,admin_email,daye,monthe,yeare,location,description,country,image)VALUES('$owner','$event','$pnumber','$email','$admin_email','$daye','$monthe','$yeare','$location','$description','$country','$image')";
  if(!mysql_query($insert))
  {
    die('Error on 36:'.mysql_error());
  }
  else
  {
     header("Location:my_events.php?msg=3");
  }
}
?>
 