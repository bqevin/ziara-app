<?php
session_start();
include('travel_db_connect.php');
$owner = mysql_real_escape_string($_POST['owner']);
$event = mysql_real_escape_string($_POST['event']);
$pnumber = mysql_real_escape_string($_POST['pnumber']);
$email = mysql_real_escape_string($_POST['email']);
$event_id = mysql_real_escape_string($_POST['event_id']);
$daye = mysql_real_escape_string($_POST['daye']);
$monthe = mysql_real_escape_string($_POST['monthe']);
$yeare = mysql_real_escape_string($_POST['yeare']);
$location = mysql_real_escape_string($_POST['location']);
$description =mysql_real_escape_string($_POST['description']);
?>
<?php
if(empty($owner)or empty($event) or empty($pnumber) or empty($email) or empty($daye) or empty($monthe) or empty($yeare) or empty($location) or empty($description))
{
   header("Location:edit_event.php?msg=1&event_id=$event_id");
}
else
{
  $update = "UPDATE events SET owner='$owner',event='$event',pnumber='$pnumber',email='$email',daye='$daye',monthe='$monthe',yeare='$yeare',location='$location',description='$description' WHERE event_id='$event_id'";
  if(!mysql_query($update))
  {
    die('Error on 22:'.mysql_error());
  }
  else
  {
    header("Location:see_event.php?event_id=$event_id");
  }
}
?>