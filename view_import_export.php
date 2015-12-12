<?php
session_start();
include('travel_db_connect.php');
$import_export_id = $_SESSION['import_export_id'];
$country = $_SESSION['country'];
$get = "SELECT * FROM import_export WHERE import_export_id='$import_export_id'";
$retval = mysql_query($get,$link);
if(!$retval)
{
die('cannot fetch data:'.mysql_error());
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Ziara</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<style>
</style>
</head>
<body style="background-image:url(shading.png);background-repeat:repeat;width:100%;"link="lime"alink="lime"vlink="lime"/>

<?php

$email = $_SESSION['email'];
$getimage = "SELECT * FROM info WHERE email = '$email'";
$result = mysql_query($getimage,$link);
?>
<div id="para"align="center">

<table bgcolor="dark-yellow"width="70%">
<tr>
<td width="10%">
<?php
while($row=mysql_fetch_array($result))
{
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:100px;height:100px;" ><br>';
}
?></td>

<td width="5%"><a href="country.php">Home</a></td>
<td width="2.5%"></td>
<td width="5%"><a href="Profile.php">Profile</a></td>
<td width="2.5%"></td>
<td width="5%"><a href="Posts.php">Posts</a></td>
<td width="2.5%"></td>
<td width="5%"><a href="Messages.php">Messages</a></td>
<td width="2.5%"></td>
<td width="5%"><a href="Friends.php">Friends</a></td>
<td width="2.5%"></td>
<td width="5%"><a href="Notifications.php">Notifications</a></td>
<td width="2.5%"></td>
<td width="5%"><a href="your_campaigns.php">Campaigns</a></td>
<td width="2.5%"></td>
<td width="7.5%"><a href="your_events.php">Events</a>
<td width="2.5%">
</td></tr></table>
<div id="para"align="center">
<table bgcolor="white"width="70%">
<tr>
<td align="left">
<?php
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $admin_email = $row['admin_email'];
  echo'<img src="data:image;base64,'.$row['photo'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
  echo"<font color='orange'>Name:</font><font color='blue'>{$row['business']}</font><br>
  <font color='orange'>Category:</font><font color='blue'>{$row['type']}</font><br>
  <font color='orange'>Product(s):</font><font color='blue'>{$row['products']}</font><br>
      <font color='orange'>Phone Number:</font><font color='blue'>{$row['number']}</font><br>
	  <font color='orange'>Email:</font><font color='blue'>{$row['email']}</font><br>
	  <font color='orange'>Website:</font><a href='{$row['website']}'>{$row['website']}</a><br>
	  <font color='orange'>Location:</font><font color='blue'>{$row['location']}</font><br>
	  <font color='orange'>Status:</font><font color='blue'>{$row['description']}</font><br>";
	  if($admin_email!=$email)
	  {
	  echo"<form method='post'action='message_import_admin.php'>
	  <input type='hidden'name='receiver_email'value='$admin_email'>
	  <input type='submit'value='Message The Admin'style='background-color:cyan;color:red;border-radius:8px;'></form>";
	  }
}
?></td></tr></table></div></body></html>