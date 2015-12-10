<?php
session_start();
include('../config/database/travel_db_connect.php');
$service_id = $_SESSION['admin_service_id'];
$query = "SELECT * FROM service WHERE service_id='$service_id'";
$retval = mysql_query($query,$link);
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
<body >
<div id="para"align="middle">
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
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
}
?></th><td>

<a href="country.php">Home</a>
<a href="Profile.php">Profile</a>
<a href="Posts.php">Posts</a>
<a href="Messages.php">Messages</a>
<a href="Friends.php">Friends</a>
<a href="Notifications.php">Notifications</a>
<a href="your_campaigns.php">Campaigns</a>
<a href="your_events.php">Events</a>
</td></tr></table>
<table bgcolor="white"width="45%">
<tr>
<td>
<?php
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{ 
   echo'<img src="data:image;base64,'.$row['photo'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
     echo"<form method='post'action='edit_service_profile_pic.php'>
	 <input type='submit'value='Edit Logo/pic'style='background-color:cyan;color:red;border-radius:8px;'></form><br>";
    echo"<font color='orange'> Name:</font><font color='blue'>{$row['business']}</font><br>
	<font color='orange'>Type Of Service:</font><font color='blue'>{$row['service']}</font><br>
	<font color='orange'>Contact Number:</font><font color='blue'>{$row['number']}</font><br>
	<font color='orange'>Email:</font><font color='blue'>{$row['email']}</font><br>
	<font color='orange'>Website:</font><font color='blue'><a href='{$row['website']}'>{$row['website']}</a></font><br>
	<font color='orange'>Country:</font><font color='blue'>{$row['country']}</font><br>
	<font color='orange'>Location:</font><font color='blue'>{$row['location']}</font><br>
	
	<font color='orange'>Description:</font><font color='blue'>{$row['description']}</font><br>
	<form method='post'action='edit_service_profile.php'>
	<input type='hidden'name='service_id'value={$row['service_id']}>
	<input type='submit'value='Edit'style='background-color:cyan;color:red;border-radius:8px;'></form>";
}
?></td></tr></table></body></html>