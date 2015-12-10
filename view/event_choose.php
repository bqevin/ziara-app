<?php
session_start();
include('../config/database/travel_db_connect.php');

?>
<!DOCTYPE html>
<html>
<head>
<style>
</style>
</head>
<body >
<div id="para"align="center">
<p>
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
<a href="../controller/events/your_events.php">Events</a>
</td></tr></table>

<table bgcolor="silver"width="35%">
<tr>
<td width="35%"bgcolor="white">
<?php
$country = $_SESSION['country'];
$event = $_SESSION['event'];
$view = "SELECT * FROM events WHERE country = '$country'AND event='$event' ";
$retval = mysql_query($view,$link);
if(!$retval)
{
 die('Cannot fetch data:'.mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
  echo'<img src="data:image;base64,'.$row['photo'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
  echo"<font color='orange'>Event By:</font><font color='blue'>{$row['owner']}</font><br>
<font color='orange'>Location:</font><font color='blue'>{$row['location']}</font><br>
<font color='orange'>Date:</font><font color='blue'>{$row['daye']}-{$row['monthe']}-{$row['yeare']}</font></br>
  <form method='post'action='../controller/events/view_event_session.php'>
  <input type='hidden'name='event_id'value={$row['event_id']}>
  <input type='submit'value='view'style='background-color:cyan;color:red;border-radius:8px;'></form>
  <hr color='red'width='100%'size='1'>";
 }
 ?></td></tr></table></p>
 </body></html>