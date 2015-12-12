<?php
session_start();
include('travel_db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<title> Ziara</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<style>
p,p2{background-color:white;opacity:0.9;color:blue;}
</style>
</head>
<body style="background-image:url(shading.png);background-repeat:repeat;width:100%;"link="lime"alink="lime"vlink="lime"/>
<div id="para"align="middle">
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
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
}
?></td>

<td width="5%"><a href="country.php">Home</a></td><td width="2.5%"></td>
<td width="5%"><a href="Profile.php">Profile</a></td><td width="2.5%"></td>
<td width="5%"><a href="Posts.php">Posts</a></td><td width="2.5%"></td>
<td width="5%"><a href="Messages.php">Messages</a></td><td width="2.5%"></td>
<td width="5%"><a href="Friends.php">Friends</a></td><td width="2.5%"></td>
<td width="5%"><a href="Notifications.php">Notifications</a></td><td width="2.5%"></td>
<td width="5%"><a href="Campaigns.php">Campaigns</a></td><td width="2.5%"></td>
<td width="5%"><a href="your_events.php">Events</a><td width="2.5%"><td width="2.5%">
</td></tr></table></div>
<div id="para1"align="center">
<table width="70%"bgcolor="white">
<tr>
<td align="left">
<p><img src="campaigns.jpeg"width="200"height="200"><a href="campaigns.php">&nbsp &nbsp <font size="06"><i>Campaigns.</i></font></a></p>
<hr color="red"size="01">
<p><img src="events.jpeg"width="200"height="200"><a href="events.php">&nbsp &nbsp <font size="06"><i>Events.</i></font></a></p>
<hr color="red"size="01">
<p><img src="service.jpeg"width="200"height="200"><a href="service.php">&nbsp &nbsp <font size="06"><i>Service Providers.</i></font></a></p>
<hr color="red"size="01">
<p><img src="education.jpeg"width="200"height="200"><a href="education.php">&nbsp &nbsp <font size="06"><i>Education Centres.</i></font></a></p>
<hr color="red"size="01">
<p><img src="land.jpeg"width="200"height="200"><a href="land.php">&nbsp &nbsp <font size="06"><i>Land For Sale.</i></font></a></p>
<hr color="red"size="01">
<p><img src="jobs.jpeg"width="200"height="200"><a href="jobs.php">&nbsp &nbsp <font size="06"><i>Jobs.</i></font></a></p>
<hr color="red"size="01">
<p><img src="import.jpeg"width="200"height="200"><a href="import_export.php">&nbsp &nbsp <font size="06"><i>Import/Exports</i></font></a></p>
<hr color="red"size="01"></td></tr></table></div></body></html>