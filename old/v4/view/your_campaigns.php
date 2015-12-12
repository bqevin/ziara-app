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
<a href="../controller/events/your_events.php">Events</a>
</td></tr></table>
<table bgcolor="white"width="45%">
<tr>
<td width="45%">
<?php
$qry = "SELECT * FROM campaign_supporters WHERE supporter_email='$email'";
$retval = mysql_query($qry,$link);
if(!$retval)
{
 die('cannot fetch data:'.mysql_error());
}
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $campaign_id = $row['campaign_id'];
  $get="SELECT * FROM campaign WHERE campaign_id='$campaign_id'";
  $result=mysql_query($get,$link);
  if(!$result)
  {
   die('cannot fetch data:'.mysql_error());
   }
   while($row=mysql_fetch_array($result,MYSQL_ASSOC))
   {
     echo'<img src="data:image;base64,'.$row['photo'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
     echo"<font color='orange'>Code Name:</font><font color='blue'>{$row['codee']}</font><br>
	 <font color='orange'>Subject Addressed:</font><font color='blue'>{$row['title']}</font>
	 <form method='post'action='..controller/sessions/campaigns_choose_sessions.php'>
	 <input type='hidden'name='campaign_id'value='$campaign_id'>
	 <input type='submit'value='view'style='background-color:cyan;color:red;border-radius:8px;'>
	 <hr color='red'size='01'width='100%'>";
    }
}
?></td></tr></table></div></body></html>
	 
  