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
<div id="para"align="center">
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
<td width="5%"><a href="your_campaigns.php">Campaigns</a></td><td width="2.5%"></td>
<td width="5%"><a href="your_events.php">Events</a><td width="2.5%">
</td></tr></table>
<table width="70%" bgcolor="white">
<tr>
<td align="left">
<p>
<font size ="03"color="orange">Who created Ziara</font><br>
<font color="blue">Ziara was created by Kelvin Kagia Kimani with the help of Kevin Barassa who fully tested and made the necessary changes.</font><br>
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