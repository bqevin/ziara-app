<?php
session_start();
include('../config/database/travel_db_connect.php');
$email = $_SESSION['email'];
$country = $_SESSION['country'];
$query = "SELECT * FROM info WHERE  email='$email'";
$retval = mysql_query($query,$link);
if(!$retval)
{
die('could not fetch data:'.mysql_error());
}

?>
<!DOCTYPE html>
<html>
<head>
<style>
</style>
</head>
<body style="background-image:url(shading.png);background-repeat:repeat;"link="lime"alink="lime"vlink="lime"/>

<?php
$my_email = $_SESSION['email'];
$getimage = "SELECT * FROM info WHERE email = '$my_email'";
$result = mysql_query($getimage,$link);
?>
<div id="para"align="middle">
<table bgcolor="dark-yellow"width="45%">
<tr>
<th>
<?php
while($row=mysql_fetch_array($result))
{
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" >';
}
?></th>
<td>
<a href="country.php">Home</a>
<a href="Profile.php">Profile</a>
<a href="Posts.php">Posts</a>
<a href="Messages.php">Messages</a>
<a href="Friends.php">Friends</a>
<a href="Notifications.php">Notifications</a>
<a href="your_campaigns.php">Campaigns</a>
<a href="your_events.php">Events</a>
</td></tr></table>
<div id="para"align="middle">
<table bgcolor="silver"width="45%">
<tr>
<td width="45%"bgcolor="white">

<?php

while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
 $friend_email = $row['email'];
 $country = $row['country'];
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:90%90%90%90%;width:200px;height:200px;" ><br>';
echo"<form method='post'action='edit_profile_pic.php'>
<input type='submit'value='change profile picture'style='background-color:cyan;color:red;border-radius:8px;'></form><br>";
echo"<font color='orange'>Name:</font><font color='blue'>{$row['fname']} {$row['lname']}</font><br>";
echo"<font color='orange'>Email:</font><font color='blue'>{$row['email']}</font><br>";
echo"<font color='orange'>Country:</font><font color='blue'>{$row['country']}</font><br>";
echo"<font color='orange'>Gender:</font><font color='blue'>{$row['gender']}</font><br>";
echo"<font color='orange'>Job:</font><font color='blue'>{$row['job']}</font><br>";
echo"<font color='orange'>Skills:</font><font color='blue'>{$row['skills']}</font><br>";
echo"<font color='orange'>Religion:</font><font color='blue'>{$row['religion']}</font><br>";
echo"<font color='orange'>Relationship:</font><font color='blue'>{$row['relationship']}</font><br>";
echo"<font color='orange'>No Of Kids:</font><font color='blue'>{$row['kids']}</font><br>";
echo "<font color='orange'>Hobbies:</font><font color='blue'>{$row['hobbies']}</font><br>";
echo"<font color='orange'>Places You Have Visited Visited:</font><font color='blue'>{$row['places']}</font><br>";
echo"<font color='orange'>About You:</font><font color='blue'>{$row['about']}</font><br>";
echo"<form method='post'action='edit_profile.php'>
<input type='submit'value='Edit Profile'style='background-color:cyan;color:red;border-radius:8px;'></form><br>";
}
?>
<p>
<?php
if(isset($_GET['msg']))
{
  $message = $_GET['msg'];
  if($message==1)
  {
   echo"<span style='color:brown;background-color:white;'>Your profile has been updated successfully</span>";
  }
 }
 ?></p>
</td></tr></table></body></html>

