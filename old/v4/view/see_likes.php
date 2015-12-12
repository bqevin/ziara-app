<?php
session_start();
include('travel_db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<style>
p,p2{background-color:white;opacity:0.9;color:blue;}
</style>
</head>
<body>
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
$status_id = $_GET['status_id'];
$qry = "SELECT * FROM status_like WHERE status_id='$status_id'";
$retval = mysql_query($qry,$link);
if(!$retval)
{
 die('cannot fetch data:'.mysql_error());
}
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $status_liker_email = $row['status_liker_email'];
  $get = "SELECT * FROM info WHERE email='$status_liker_email'";
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
	