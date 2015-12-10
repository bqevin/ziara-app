<?php
session_start();
include('../config/database/travel_db_connect.php');
$photo_status_id = $_SESSION['photo_status_id'];
$qry = "SELECT * FROM event_status WHERE event_status_id='$photo_status_id'";
$retval = mysql_query($qry,$link);
if(!$retval)
{
 die('cannot fetch data:'.mysql_error());
}

?>
<!DOCTYPE html>
<html>
<head>
<style>
p,p2{background-color:white;opacity:0.9;color:blue;}
</style>
</head>
<body style="background-image:url(sarah.jpg);background-repeat:repeat;"link="green"alink="lightgreen"vlink="darkgreen"/>
<div id="para"align="middle">
<?php
$email = $_SESSION['email'];
$getimage = "SELECT * FROM info WHERE email = '$email'";
$result = mysql_query($getimage,$link);
?>
<div id="para"align="middle">

<table bgcolor="yellow"width="45%">
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
<a href="Campaigns.php">Campaigns</a>
</td></tr></table>
<table width="45%"bgcolor="white">
<tr>
<td width="45%">
<?php
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
 echo"
 <font color='orange'>{$row['name']}</font><br>
 <font color='blue'>{$row['status']}</font><br>";
 echo'<img src="data:image;base64,'.$row['photo'].'" style="width:200px;height:200px;" ><br>';
 echo"<hr color='red'width='100%'size='01'>
	<form method='post'action='photo_event_comment.php'>
	<input type='hidden'name='photo_status_id'value='$photo_status_id'>
	<font color='red'>Comment:</font><br><textarea rows='5'cols='25'placeholder='comment...'name='status'></textarea><br>
	<input type='submit'value='comment'style='background-color:cyan;color:red;'>
	</form>";
}
?>
<?php
$get_comments = "SELECT * FROM comment_event_status WHERE event_status_id = '$photo_status_id'ORDER BY id DESC";
$results = mysql_query($get_comments,$link);
if(!$results)
{
 die('cannot fetch data:'.mysql_error());
}
while($row=mysql_fetch_array($results,MYSQL_ASSOC))
{
  $id = $row['id'];
  $commenter_email = $row['commenter_email'];
  echo"
  <hr color='cyan'width='100%'size='01'>
  <font color='lime'>{$row['fname']} {$row['lname']}</font><br>
  <font color='blue'>{$row['status']}</font><br>";
  if($email==$commenter_email)
  {
  echo"<a href='edit_comment_event_status.php?id=$id'>Edit</a>";
  echo"&nbsp &nbsp<a href='delete_comment_event_status.php?id=$id'>Delete</a>";
  }
  else
  {
    echo"<a href='view_profile.php?email=$commenter_email'>View Profile</a>";
  }
}
?></td></tr></table></div>
</body></html>

