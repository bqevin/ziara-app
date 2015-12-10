<?php
session_start();
include('travel_db_connect.php');
$country = $_SESSION['country'];
$you = $_SESSION['email'];
$query = "SELECT * FROM friends WHERE you = '$you' OR friend_email = '$you'ORDER BY id DESC";
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
<div id="para"align="center">
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
<td style="width:80px;"><a href="your_campaigns.php">Campaigns</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="your_events.php">Events</a><td style="width:10px;">
</td></tr></table>
<table bgcolor="white"style="width:750px;">
<tr>
<td align="left">
<?php
$qry = mysql_query("SELECT * FROM friends WHERE you = '$you' OR friend_email = '$you'ORDER BY id DESC");
$number_of_friends = mysql_num_rows($qry);
echo"<font color='orange'>Friends:</font> <font color='red'>$number_of_friends</font>&nbsp<font color='blue'>|&nbsp|&nbsp<a href='friends_here.php'>Find friends($country)</a></font><hr color='red'size='01'width='100%'>";
?>
<p>
<?php
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
  if($row['you']==$you)
  {
     $friend_email = $row['friend_email'];
     $get_friend = "SELECT * FROM  info WHERE email = '$friend_email'";
     $report = mysql_query($get_friend,$link);
     if(!$report)
	 {
	  die('cannot fetch data:'.mysql_error());
	 }
	 while($row=mysql_fetch_array($report,MYSQL_ASSOC))
	 {
	   echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
	   echo"<font color='orange'>Name:</font><font color='blue'>{$row['fname']} {$row['lname']}</font><br>
	   <font color='orange'>Gender:</font><font color='blue'>{$row['gender']}</font><br>
	   <form method='post'action='view_buddy_profile_session.php'>
	   <input type='hidden'name='email'value='$friend_email'>
	   <input type='submit'value='View Profile'style='background-color:cyan;color:red;border-radius:8px;'></form>
	   <hr color='red'size='01'width='100%'>";
	 }
}
   else if($row['friend_email']==$you)
  {
     $your_friend = $row['you'];
     $get_pal = "SELECT * FROM  info WHERE email = '$your_friend'";
     $reports = mysql_query($get_pal,$link);
     if(!$reports)
	 {
	  die('cannot fetch data:'.mysql_error());
	 }
	 while($row=mysql_fetch_array($reports,MYSQL_ASSOC))
	 {
	   echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
	   echo"<font color='orange'>Name:</font><font color='blue'>{$row['fname']} {$row['lname']}</font><br>
	   <font color='orange'>Gender:</font><font color='blue'>{$row['gender']}</font><br>
	   <form method='post'action='view_pal_profile_session.php'>
	   <input type='hidden'name='email'value='$your_friend'>
	   <input type='submit'value='View Profile'style='background-color:cyan;color:red;border-radius:8px;'><br></form>
	    <hr color='red'size='01'width='100%'>";
	 }
   }
 }

?></p></td></tr></table>


</body></html>
