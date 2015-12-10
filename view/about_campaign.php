<?php
session_start();
include('../config/database/travel_db_connect.php');
$campaign_id = $_SESSION['campaign_id'];
$country = $_SESSION['country'];
$get = "SELECT * FROM campaign WHERE campaign_id='$campaign_id'AND country='$country'";
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
<body style="background-image:url(shading.png);background-repeat:repeat;"link="lime"alink="lime"vlink="lime"/>

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
<a href="your_events.php">Events</a>
</td></tr></table>
<div id="para"align="middle">
<table bgcolor="silver"width="45%">
<tr>
<td bgcolor="white"width="40%">
<?php
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  echo'<img src="data:image;base64,'.$row['photo'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
  echo"
     <font color='orange'>Code Name:</font><font color='blue'>{$row['codee']}</font><br>
      <font color='orange'>Title:</font><font color='blue'>{$row['title']}</font><br>
	  <font color='orange'>By:</font><font color='blue'>{$row['bye']}</font><br>
	  <font color='orange'>Email:</font><font color='blue'>{$row['email']}</font><br>
	  <font color='orange'>Contact Number:</font><font color='blue'>{$row['number']}</font><br>
	  <font color='orange'>Website:</font><a href='{$row['website']}'>{$row['website']}</a><br>
	   <font color='orange'>Country:</font><font color='blue'>{$row['country']}</font><br>
	  
         
	  <font color='orange'>Status:</font><font color='blue'>{$row['description']}</font><br>
	  <hr color='red'width='100%'size='01'>";
	  $like_count = mysql_query("SELECT * FROM campaign_supporters WHERE campaign_id='$campaign_id'");
   $row = mysql_fetch_array($like_count);
   $number_of_likes = mysql_num_rows($like_count);
   echo"<font color='orange'>Number Of People Supporting This Campaign:</font><a href='see_supporters.php?campaign_id=$campaign_id'>$number_of_likes</a><br>
   <hr color='red'width='100%'size='01'>";

  
}
?>
</td></tr></table>