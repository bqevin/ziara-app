<?php
session_start();
include('travel_db_connect.php');
$campaign_id = $_POST['campaign_id'];
$cname = $_POST['cname'];
$architect = $_POST['architect'];
$subject = $_POST['subject'];
$email = $_POST['email'];
$pnumber = $_POST['pnumber'];
$website = $_POST['website'];
$description = $_POST['description'];
?>
<?php
if(empty($cname)or empty($architect)or empty($subject)or empty($email)or empty($pnumber)or empty($website)or empty($description))
{
   header("Location:edit_campaign.php");
}
else
{
  $update = "UPDATE campaigns SET cname='$cname',architect='$architect',subject='$subject',email='$email',pnumber='$pnumber',website='$website',description='$description'WHERE campaign_id='$campaign_id'";
  if(!mysql_query($update))
  {
    die('Error on 20:'.mysql_error());
  }
  else
  {
     header("Location:see_campaign.php?campaign_id=$campaign_id");
  }
}
?>