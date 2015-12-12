<?php
session_start();
include('../../config/database/travel_db_connect.php');
$my_email = $_SESSION['email'];
$owner = $_POST['owner'];
$event = $_POST['event'];
$number = $_POST['number'];
$email = $_POST['email'];
$website = $_POST['website'];
$country = $_POST['country'];
$day = $_POST['daye'];
$month = $_POST['monthe'];
$year = $_POST['yeare'];
$description = $_POST['description'];
$event_id = $_SESSION['admin_event_id'];
$update = "UPDATE events SET owner='$owner',event='$event',email='$email',number='$number',website='$website',day='$daye',month='$monthe',yeare='$year',country='$country',description='$description'WHERE admin_email = '$my_email'AND event_id = '$campaign_id'";
if(!mysql_query($update))
{
 die('Error:'.mysql_error());
}
else
{
 header("Location:../../view/view_admin_campaign.php");
}
?>