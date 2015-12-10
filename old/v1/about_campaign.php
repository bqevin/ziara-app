<?php
session_start();
include('travel_db_connect.php');
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
<title> Ziara</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<style>
</style>
</head>
<body style="background-image:url(car.jpg);background-repeat:repeat;"link="lime"alink="lime"vlink="lime"/>

<?php

$email = $_SESSION['email'];
$getimage = "SELECT * FROM info WHERE email = '$email'";
$result = mysql_query($getimage,$link);
?>
<div id="para"align="center">

<table bgcolor="dark-yellow"style="width:750px;">
<tr>
<td style="width:30px;">
<?php
while($row=mysql_fetch_array($result))
{
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:100px;height:100px;" ><br>';
}
?></td>

<td style="width:80px;"><a href="country.php">Home</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Profile.php">Profile</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Posts.php">Posts</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Messages.php">Messages</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Friends.php">Friends</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Notifications.php">Notifications</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="your_campaigns.php">Campaigns</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="your_events.php">Events</a><td style="width:10px;">
</td></tr></table>
<div id="para"align="center">
<table bgcolor="white"style="width:750px;">
<tr>
<td align="left">
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