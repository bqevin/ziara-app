<?php
session_start();
include('../config/database/travel_db_connect.php');
$campaign_status_id = $_GET['campaign_status_id'];
?>
<!DOCTYPE html>
<html>
<head>
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
<table bgcolor="white"width="45%">
<tr>
<td width="45%">

<?php
$qry = "SELECT * FROM campaign_status WHERE campaign_status_id='$campaign_status_id'";
$retval = mysql_query($qry,$link);
if(!$retval)
{
 die('cannot fetch data:'.mysql_error());
}
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  echo"<form method='post'action='edit_campaign_status_action.php'>
  <font color='red'>Edit Status:</font><br><textarea rows='5'cols='25'name='status'maxlength='300'>{$row['status']}</textarea><br>
  <input type='hidden'name='campaign_status_id'value='$campaign_status_id'>
  <input type='submit'value='submit'style='background-color:cyan;color:red;border-radius:8px;'></form>";
}
?>
</td></tr></table></div></body></html>