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
<body style="background-image:url(car.jpg);background-repeat:repeat;"link="lime"alink="lime"vlink="lime"/>
<div id="para"align="middle">
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
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
}
?></td>

<td style="width:80px;"><a href="country.php">Home</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Profile.php">Profile</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Posts.php">Posts</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Messages.php">Messages</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Friends.php">Friends</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Notifications.php">Notifications</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Campaigns.php">Campaigns</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="your_events.php">Events</a></td><td style="width:10px;">
</td></tr></table></div>
<div id="para1"align="center">
<table style="width:750px;"bgcolor="white">
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