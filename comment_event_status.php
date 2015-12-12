<?php
session_start();
include('travel_db_connect.php');
$event_status_id = $_SESSION['event_status_id'];
$qry = "SELECT * FROM event_status WHERE event_status_id = '$event_status_id'";
$retval = mysql_query($qry,$link);
if(!$retval)
{
 die('Error:'.mysql_error());
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
<td width="5%"><a href="your_events.php">Events</a><td width="2.5%">
</td></tr></table>
<table bgcolor="white"width="70%">
<tr>
<td align="left">
<?php
if(isset($_GET['msg']))
{
 $message = $_GET['msg'];
 if($message==1)
 {
   echo"<span style='background-color:green;color:red;'>Comment cannot be empty</span><br>";
 }
}
?>
<?php
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
  echo"<hr color='red'width='100%'size='01'>";
  if(!empty($row['photo']))
  {
	echo"<font color='orange'>{$row['name']}</font><br>
	<font color='blue'>{$row['status']}</font><br>";
	echo'<img src="data:image;base64,'.$row['photo'].'" style="width:200px;height:200px;" ><br>';
	echo"<hr color='red'width='100%'size='01'>
	<form method='post'action='status_event_comment.php'>
	<input type='hidden'name='event_status_id'value='$event_status_id'>
	<font color='red'>Comment:</font><br><textarea rows='5'cols='40'placeholder='comment...'name='status'></textarea><br>
	<input type='submit'value='comment'style='background-color:cyan;color:red;border-radius:8px;'>
	</form>";
	}
	else
	{
	 echo"<font color='orange'>{$row['name']}</font><br>
	<font color='blue'>{$row['status']}</font><br>";
	echo"<hr color='red'width='100%'size='01'>
	<form method='post'action='status_event_comment.php'>
	<input type='hidden'name='event_status_id'value='$event_status_id'>
	<font color='red'>Comment:</font><br><textarea rows='5'cols='25'placeholder='comment...'name='status'maxlength='300'></textarea><br>
	<input type='submit'value='comment'style='background-color:cyan;color:red;border-radius:8px;'>
	</form>";
	}
	  
}
?>
<?php
$get_comments = "SELECT * FROM comment_event_status WHERE event_status_id='$event_status_id'ORDER BY id DESC";
$results = mysql_query($get_comments,$link);
if(!$results)
{
 die('cannot fetch data:'.mysql_error());
}
while($row=mysql_fetch_array($results,MYSQL_ASSOC))
{
  $commenter_email = $row['commenter_email'];
  $id = $row['id'];
  echo"
  <hr color='cyan'width='100%'size='01'>
  <font color='orange'>{$row['fname']} {$row['lname']}</font><br>
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
?>
</td></tr></table></body></html>