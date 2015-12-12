<?php
session_start();
include('../config/database/travel_db_connect.php');
$admin_email = $_SESSION['email'];
$query = "SELECT * FROM service WHERE admin_email='$admin_email'";
$retval = mysql_query($query,$link);
if(!$retval)
{
 die('Error:'.mysql_error());
}
?>
<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body style="background-image:url(shading.png);background-repeat:repeat;"link="lime"alink="lime"vlink="lime"/>
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
<td width="45%">
<?php
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
echo'<img src="data:image;base64,'.$row['photo'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
echo"<font color='orange'>Name:</font><font color='blue'>{$row['business']}</font><br>
  <font color='orange'>Location:</font><font color='blue'>{$row['location']}</font><br>
  
  <form method='post'action='view_admin_service_session.php'>
  <input type='hidden'name='service_id'value={$row['service_id']}>
  <input type='submit'value='View'style='background-color:cyan;color:red;border-radius:8px;'></form>
  <hr color='red'width='100%'size='01'>";
  }
 ?>
 </td></tr></table>
 </body></html>
