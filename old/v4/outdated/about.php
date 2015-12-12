<?php
session_start();
include('../config/database/travel_db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<style>
p,p2{background-color:white;opacity:0.9;color:blue;}
</style>
</head>
<body>
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
<table width="45%"bgcolor="white">
<tr>
<td width="45%">
<h1 style="color:orange;">Developers</h1>
<p>
	<font color="blue">Ziara was developed by Kelvin Kagia Kimani from scratch a computer science student in Kirinyaga University.
	It was tested by Kevin Barassa a computer science student in Chuka University he made the necessary changes
	to make sure the website achieved its ultimate goal of connecting people of different countries
	</font>
</p>
<h2 style="color:orange;">What Ziara will Achieve</h2>
<p>
	<font color="blue">
	Ziara just as its name will help people from all over the world understand what happens in each country based on information posted
	 by those who have travelled there or its residents plus it will help connect in various ways i.e jobs,
	 friendships,as business partners or people who share the same ideology.
	</font>
</p>

