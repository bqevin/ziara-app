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
<body style="background-image:url(shading.png);background-repeat:repeat;"link="lime"alink="lime"vlink="lime"/>
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
<td width="5%"><a href="your_events.php">Events</a></td><td width="2.5%">
</td></tr></table>
<table bgcolor="white"width="70%">
<tr>
<td >
<?php
$campaign_id = $_GET['campaign_id'];
$qry = "SELECT * FROM campaign_supporters WHERE campaign_id='$campaign_id'";
$retval = mysql_query($qry,$link);
if(!$retval)
{
 die('cannot fetch data:'.mysql_error());
}
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $supporter_email = $row['supporter_email'];
  $get = "SELECT * FROM info WHERE email='$supporter_email'";
  $result = mysql_query($get,$link);
  if(!$result)
  {
     die('cannot get data from table info:'.mysql_error());
  }
  while($row=mysql_fetch_array($result,MYSQL_ASSOC))
  {
    $liker_email = $row['email'];
	echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
    echo"<font color='orange'>Name:</font><font color='blue'>{$row['fname']} {$row['lname']}</font><br>
	<font color='orange'>Gender:</font><font color='blue'>{$row['gender']}</font><br>";
	
	if($liker_email!=$email)
	{
	 echo"<a href='view_profile.php?email=$liker_email'>view profile</a>";
	}
	echo"<hr color='red'size='01'color='red'>";
}
}
?>
</td></tr></table></div></body></html>