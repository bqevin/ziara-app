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
<table width="45%" bgcolor="white">
<tr>
<td width="45%">
<p>
<font size ="03"color="orange">Who created Ziara</font><br>
<font color="blue">Ziara was created by Kelvin Kagia Kimani with the help of Kevin Barassa who also fully tested and made the necessary changes to be what it is today.</font><br>
<font size ="03"color="orange">Ziara's Objectives</font><br>
<font color="blue">
=>To help anyone share experiences of countries they have visited or residing in writing and photo sharing to help others know those countries better.<br>
=>To help anyone start or launch campaigns to adress any topic of interest in their countries of interest.<br>
=>To help anyone start or launch events in their countries of interest.<br>
=>To help anyone get jobs or education oppurtunities in their countries of events.<br>
=>To help anyone get services easily in countries they visit.<br>
=>To help anyone buy land in countries of interest.<br>
=>To help anyone get friends in countries of interest.<br>
=>To help importers/Exporters and business people from different countries meet online etc...
</font><br>
<font size ="03"color="orange">Our Mission</font><br>
<font color="blue">To create an online prescence where people from different countries share experiences,interest and engage positively.</font><br>
<font size ="03"color="orange">Our Vision</font><br>
<font color="blue">To Make a one world prescence at one place.</font><br>
<font size ="03"color="orange">What next for Ziara</font><br>
<font color="blue">We are working on many ideas to ensure Ziara will be the best web application that caters all your needs.If you have an idea you that you think can improve how ziara works you can <a href="contact.php">contact us here</a>The idea will be reviewed by our developers if it suits our interest we shall reward the suggester with an appreciation gift,which is not always guaranteed.</font><br>
<font size ="03"color="orange">Jobs At Ziara</font><br>
<font color="blue">Jobs will be posted <a href="ziara_jobs.php">here</a> regularly as need arises.</font></br>