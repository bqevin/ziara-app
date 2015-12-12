<?php
session_start();
include('travel_db_connect.php');
$event_id = $_POST['event_id'];
$country = $_SESSION['country'];
$get = "SELECT * FROM events WHERE event_id='$event_id'AND country='$country'";
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

<td width="5%"><a href="country.php">Home</a></td><td width="2.5%"></td>
<td width="5%"><a href="Profile.php">Profile</a></td><td width="2.5%"></td>
<td width="5%"><a href="Posts.php">Posts</a></td><td width="2.5%"></td>
<td width="5%"><a href="Messages.php">Messages</a></td><td width="2.5%"></td>
<td width="5%"><a href="Friends.php">Friends</a></td><td width="2.5%"></td>
<td width="5%"><a href="Notifications.php">Notifications</a></td><td width="2.5%"></td>
<td width="5%"><a href="your_campaigns.php">Campaigns</a></td><td width="2.5%"></td>
<td width="5%"><a href="your_events.php">Events</a></td><td width="2.5%">
</td></tr></table>
<div id="para"align="center">
<table bgcolor="white"width="70%">
<tr>
<td align="left">
<?php
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  echo'<img src="data:image;base64,'.$row['photo'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
  echo"
     <font color='orange'>Event By:</font><font color='blue'>{$row['owner']}</font><br>
      <font color='orange'>Type Of Event:</font><font color='blue'>{$row['event']}</font><br>
	  <font color='orange'>Contact Number:</font><font color='blue'>{$row['number']}</font><br>
	  <font color='orange'>Email:</font><font color='blue'>{$row['email']}</font><br>
	  <font color='orange'>Website:</font><a href='{$row['website']}'>{$row['website']}</a><br>
	   <font color='orange'>Country:</font><font color='blue'>{$row['country']}</font><br>
	  <font color='orange'>Location:</font><font color='blue'>{$row['location']}</font><br>
	  	  <font color='orange'>Date:</font><font color='blue'>{$row['daye']}-{$row['monthe']}-{$row['yeare']}</font><br>
         
	  <font color='orange'>Status:</font><font color='blue'>{$row['description']}</font><br>
	  <hr color='red'width='100%'size='01'>";
	  $like_count = mysql_query("SELECT * FROM event_attend WHERE event_id='$event_id'");
   $row = mysql_fetch_array($like_count);
   $number_of_likes = mysql_num_rows($like_count);
   echo"<font color='orange'>Number Of People Attending This Event:</font><a href='see_attenders.php?event_id=$event_id'>$number_of_likes</a><br>
   <hr color='red'width='100%'size='01'>";

  
}
?>
</td></tr></table>