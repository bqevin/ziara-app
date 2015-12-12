<?php
session_start();
include('../config/database/travel_db_connect.php');
$jobs_id = $_SESSION['job_id'];
$get = "SELECT * FROM jobs WHERE jobs_id='$jobs_id'";
$retval = mysql_query($get,$link);
if(!$retval)
{
die('cannot fetch data:'.mysql_error());
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
</style>
</head>
<body>

<?php

$email = $_SESSION['email'];
$getimage = "SELECT * FROM info WHERE email = '$email'";
$result = mysql_query($getimage,$link);
?>
<div id="para"align="middle">

<table bgcolor="dark-yellow"width="45%">
<tr>
<th>
<?php
while($row=mysql_fetch_array($result))
{
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:100px;height:100px;" ><br>';
}
?></th><td>

<a href="country.php">Home</a>
<a href="Profile.php">Profile</a>
<a href="Posts.php">Posts</a>
<a href="Messages.php">Messages</a>
<a href="Friends.php">Friends</a>
<a href="Notifications.php">Notifications</a>
<a href="your_campaigns.php">Campaigns</a>
<a href="../controller/events/your_events.php">Events</a>
</td></tr></table>
<div id="para"align="middle">
<table bgcolor="silver"width="45%">
<tr>
<td bgcolor="white"width="40%">
<?php
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
 $admin_email = $row['admin_email'];
  echo'<img src="data:image;base64,'.$row['photo'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
  echo"<font color='orange'>Name:</font><font color='blue'>{$row['employer']}</font><br>
  <font color='orange'>Job:</font><font color='blue'>{$row['job']}</font><br>
      <font color='orange'>Phone Number:</font><font color='blue'>{$row['number']}</font><br>
	  <font color='orange'>Email:</font><font color='blue'>{$row['email']}</font><br>
	  <font color='orange'>Website:</font><a href='{$row['website']}'>{$row['website']}</a><br>
	  <font color='orange'>Location:</font><font color='blue'>{$row['location']}</font><br>
	  	  <font color='orange'>Job Description:</font><font color='blue'>{$row['description']}</font><br>";
		  if($admin_email!=$email)
	  {
	  echo"<form method='post'action='message_job_admin.php'>
	  <input type='hidden'name='receiver_email'value='$admin_email'>
	  <input type='submit'value='Message The Admin'style='background-color:cyan;color:red;border-radius:8px;'></form>";
	  }


}
?></td></tr></table></div></body></html>