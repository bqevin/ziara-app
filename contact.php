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
<td width="5%"><a href="your_campaigns.php">Campaigns</a></td><td width="2.5%"></td>
<td width="5%"><a href="your_events.php">Events</a><td width="2.5%">
</td></tr></table>
<table width="70%"bgcolor="white">
<tr>
<td width="70%">
<h1 style="color:orange;">Contact Us</h1>
<p><font color="blue">If you would wish to contact us please fill in the form below and send us a message.We can't reply to all messages but we promise to attend to your request.</font></p></td></tr></table>
<table bgcolor="white"width="70%">
<tr>
<td align="left">
<?php
if(isset($_GET['msg']))
{
 $message = $_GET['msg'];
 if($message==1)
 {
   echo"<span style='background-color:green;color:red;'>Your message has been sent successfully.</span>";
 }
}
?>
<form method="post"action="contact_process.php">
<font color="FF0099">Subject:</font><br><input type="text"name="subject"placeholder="subject"><br>
<font color="FF0099">Message:</font><br><textarea rows="5"cols="40"name="message"placeholder="message"maxlength='400'></textarea><br>
<input type="submit"value="send"style="background-color:cyan;color:red;border-radius:8px;"></form></td></tr></table>
