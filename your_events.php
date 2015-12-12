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
<td width="5%"><a href="your_events.php">Events</a></td><td width="2.5%">
</td></tr></table>
<table bgcolor="white"width="70%">
<tr>
<td align="left">
<?php
$qry = "SELECT * FROM event_attend WHERE attendee_email='$email'";
$retval = mysql_query($qry,$link);
if(!$retval)
{
 die('cannot fetch data:'.mysql_error());
}
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $event_id = $row['event_id'];
  $get="SELECT * FROM events WHERE event_id='$event_id'";
  $result=mysql_query($get,$link);
  if(!$result)
  {
   die('cannot fetch data:'.mysql_error());
   }
   while($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
  echo'<img src="data:image;base64,'.$row['photo'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
  echo"<font color='orange'>Event By:</font><font color='blue'>{$row['owner']}</font><br>
<font color='orange'>Location:</font><font color='blue'>{$row['location']}</font><br>
<font color='orange'>Date:</font><font color='blue'>{$row['daye']}-{$row['monthe']}-{$row['yeare']}</font></br>
  <form method='post'action='view_event_session.php'>
  <input type='hidden'name='event_id'value={$row['event_id']}>
  <input type='submit'value='view'style='background-color:cyan;color:red;border-radius:8px;'></form>
  <hr color='red'width='100%'size='1'>";
 }
   
   }
?></td></tr></table></div></body></html>
	 
  