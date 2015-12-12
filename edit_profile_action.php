<?php
session_start();
include('travel_db_connect.php');
$email = $_SESSION['email'];

$fname = mysql_real_escape_string($_POST['fname']);
$lname = mysql_real_escape_string($_POST['lname']);
$pnumber = mysql_real_escape_string($_POST['pnumber']);
$country = mysql_real_escape_string($_POST['country']);
?>
<?php
if(empty($fname) or empty($lname) or empty($pnumber) or empty($country))
{
  header("Location:edit_profile.php?msg=1");
}
else 
{
  $qry_pnumber = mysql_query("SELECT * FROM info WHERE pnumber='$pnumber' AND email!='$email'");
  if(!$qry_pnumber)
  {
    die('Error on 15:'.mysql_error());
  }
  $row = mysql_fetch_array($qry_pnumber);
  if(mysql_num_rows($qry_pnumber)>0)
  {
      header("Location:edit_profile.php?msg=2");
  }
  else if(mysql_num_rows($qry_pnumber)==0)
  {
     $update = "UPDATE info SET fname='$fname',lname='$lname',pnumber='$pnumber',country='$country' WHERE email='$email'";
	 if(!mysql_query($update))
	 {
	   die('Error on 27:'.mysql_error());
	 }
	 else
	 {
	   header("Location:profile.php");
	 }
}
}
?>