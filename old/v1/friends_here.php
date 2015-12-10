<?php
session_start();
include('travel_db_connect.php');
$country = $_SESSION['country'];
$query = "SELECT * FROM info WHERE country = '$country'";
$retval = mysql_query($query,$link);
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
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" >';
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

<table bgcolor="white"style="width:750px;">
<tr>
<td align="left">
<?php

$check_friend = "SELECT * FROM friends WHERE country = '$country'";
$set = mysql_query($check_friend,$link);
if(!$set)
{
die('Error:'.mysql_error());
}
while($row=mysql_fetch_array($set,MYSQL_ASSOC))
{
   $email_exist = $row['friend_email'];
  
  
}

$mine_email = $_SESSION['email'];
while($row = mysql_fetch_array($retval))
{
   
   if($row['email']!=$mine_email)
    {
	 echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
     echo"<font color='red'>Name:</font><font color='blue'>{$row['fname']} {$row['lname']}</font><br>
	   <font color='red'>Gender:</font><font color='blue'>{$row['gender']}</font><br>
	   <form method='post'action='view_friend_profile.php'>
	   <input type='hidden'name='id'value='{$row['user_id']}'>
	   <input type='hidden'name='email'value='{$row['email']}'>
	   <input type='submit'value='view profile'style='background-color:cyan;color:red;border-radius:8px;'></form>
	   <hr color='red'size='01'width='100%'>";
    }

}
?>
</td></tr></table></body></html>