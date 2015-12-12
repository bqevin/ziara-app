<?php
session_start();
include('../config/database/travel_db_connect.php');
$my_email = $_SESSION['email'];
$qry = "SELECT * FROM comments WHERE commenter_email!= '$my_email' AND status_owner='$my_email' ";
$retval= mysql_query($qry,$link);
if(!$retval)
{
 die('Cannot fetch data:'.mysql_error());
}

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
<table width="45%"bgcolor="white">
<tr>
<td width="45%">
<?php
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $the_status_id = $row['status_id'];
  echo"<font color='orange'>{$row['fname']} {$row['lname']} </font><font color='blue'>commented on your <a href='../controller/sessions/comment_status_session.php?status_id=$the_status_id'>status</a></font><hr color='red'width='100%'size='01'>";
  }
?>
</td></tr></table>
