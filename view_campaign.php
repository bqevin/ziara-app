<?php
session_start();
include('travel_db_connect.php');
$campaign_id = $_SESSION['campaign_id'];
$get = "SELECT * FROM campaign WHERE campaign_id='$campaign_id'";
$retval = mysql_query($get,$link);
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
<body style="background-image:url(shading.png);background-repeat:repeat;width:100%;"link="lime"alink="lime"vlink="lime"/>

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
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:100px;height:100px;" ><br>';
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
<div id="para"align="center">
<table bgcolor="white"width="70%">
<tr>
<td align="left">
<?php
if(isset($_GET['msg']))
{
  $message = $_GET['msg'];
  if($message==1)
  {
    echo"<span style='background-color:green;color:red;'>status cannot be empty</span>";
  }
 }
 ?>
<?php
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  echo'<img src="data:image;base64,'.$row['photo'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
}
?>
<table>
<tr>
<td>
<p>
<form method ="post"action="about_campaign.php">
<input type="hidden"name="campaign_id"value="$campaign_id">
<input type="submit"value="About"style='background-color:cyan;color:red;border-radius:8px;'></form></p></td>
<td>
<p>
<?php
$select = mysql_query("SELECT * FROM campaign_supporters WHERE campaign_id = '$campaign_id' AND supporter_email = '$email'");
$row = mysql_fetch_array($select);
if(mysql_num_rows($select)==1)
{
 echo"
<form method ='post'action='unsupport_campaign.php'>
<input type='hidden'name='campaign_id'value='$campaign_id'>
<input type='submit'value='Unsupport'style='background-color:cyan;color:red;border-radius:8px;'></form>";
}
else if(mysql_num_rows($select)==0)
{
 echo"
<form method ='post'action='support_campaign.php'>
<input type='hidden'name='campaign_id'value='$campaign_id'>
<input type='hidden'name='supporter_email'value='$email'>
<input type='submit'value='Support'style='background-color:cyan;color:red;border-radius:8px;'></form>";
}
?></p>
<td>
 <p>
 <?php
 $message = "SELECT * FROM campaign WHERE campaign_id='$campaign_id'";
 $get_info = mysql_query($message,$link);
 if(!$get_info)
 {
  die('cannot fetch data:'.mysql_error());
 }
 while($row = mysql_fetch_array($get_info,MYSQL_ASSOC))
 {
    $admin_email = $row['admin_email'];
	if($email!=$admin_email)
	{
	  echo" <form method='post'action='campaign_message_event.php'>
       <input type='hidden'name='admin_email'value='$admin_email'>
       <input type='submit'name='submit'value='Message The Admin'style='background-color:cyan;color:red;border-radius:8px;'>
      </form>";
	}
  }
 ?></p></td></tr></table>
 <table>
 <tr>
 
<td>
<?php
$reports = "SELECT * FROM campaign WHERE campaign_id = '$campaign_id'";
$take = mysql_query($reports,$link);
if(!$take)
{
 die('could not fetch data:'.mysql_error());
}
while($row=mysql_fetch_array($take,MYSQL_ASSOC))
{
  $bye = $row['bye'];
}
?>
<?php
if(isset($_GET['msg']))
{
 $message = $_GET['msg'];
 if($message==1)
 {
   echo"<span style='background-color:green;color:red;'>Your status has been updated.</span>";
 }
 if($message==2)
 {
   echo"<span style='background-color:green;color:red;'>Your photo status has been updated.</span>";
 }
 
 }
 ?>
<?php
if($email == $admin_email)
{
  echo"
  <p>
  <form method='post'action='campaign_status.php'>
  <font color='orange'>Say Something:</font><br>
  <input type='hidden'name='admin_email'value='$admin_email'>
  <input type='hidden'name='id'value='$campaign_id'>
  <input type='hidden'name='name'value='$bye'>
  <textarea rows='5'cols='40'placeholder='Say something'name='status'maxlength='200'></textarea><br>
  <input type='submit'value='submit'style='background-color:cyan;color:red;border-radius:8px;'></form>
  <form method='post'action='campaign_status_photo.php'>
  <input type='hidden'name='admin_email'value='$admin_email'>
  <input type='hidden'name='id'value='$campaign_id'>
  <input type='hidden'name='name'value='$bye'>
  <input type='submit'value='Add Photos'style='background-color:cyan;color:red;border-radius:8px;'></form>
  </p>";
  }
  ?>
  <?php
  $get_status = "SELECT * FROM campaign_status WHERE id = '$campaign_id'ORDER BY campaign_status_id DESC";
  $status = mysql_query($get_status,$link);
  if(!$status)
  {
    die('cannot fetch data:'.mysql_error());
  }
  while($row = mysql_fetch_array($status,MYSQL_ASSOC))
  {
     $admin_email = $row['admin_email'];
     if(empty($row['photo']))
	 {
	  $campaign_status_id = $row['campaign_status_id'];
	  $get_number_of_comments = mysql_query("SELECT * FROM comment_campaign_status WHERE campaign_status_id='$campaign_status_id'");
	  $number = mysql_num_rows($get_number_of_comments);
    echo"<hr color='red'width='100%'size='01'>
	<font color='orange'>{$row['name']}</font><br>
	<font color='blue'>{$row['status']}</font><br>";
	echo"<a href='comment_campaign_status_session.php?campaign_status_id=$campaign_status_id'>$number comment</a>";
	if($email==$admin_email)
	{
	echo"&nbsp &nbsp<a href='edit_campaign_status.php?campaign_status_id=$campaign_status_id'>Edit</a>";
	}
	echo"&nbsp &nbsp<a href='delete_campaign_status.php?campaign_status_id=$campaign_status_id'>Delete</a>";
  }
  else
  {
    $campaign_photo_id = $row['campaign_status_id'];
	$get_number_of_comments_photo = mysql_query("SELECT * FROM comment_campaign_status WHERE campaign_status_id='$campaign_photo_id'");
	  $numbers = mysql_num_rows($get_number_of_comments_photo);
  echo"<hr color='red'width='100%'size='01'>
	<font color='orange'>{$row['name']}</font><br>
	<font color='blue'>{$row['status']}</font><br>";
	echo'<img src="data:image;base64,'.$row['photo'].'" style="width:200px;height:200px;" ><br>';
	echo"<a href='comment_campaign_photo_session.php?campaign_status_id=$campaign_photo_id'>$numbers comment</a>";
	if($email==$admin_email)
	{
	echo"&nbsp &nbsp<a href='edit_campaign_status.php?campaign_status_id=$campaign_photo_id'>Edit</a>";
	}
	echo"&nbsp &nbsp<a href='delete_campaign_status.php?campaign_status_id=$campaign_photo_id'>Delete</a>";
  
  }
 }
  ?>
	
</td></tr></table></div></body></html>