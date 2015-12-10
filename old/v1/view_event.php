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
</style>
</head>
<body style="background-image:url(car.jpg);background-repeat:repeat;"link="lime"alink="lime"vlink="lime"/>

<?php

$email = $_SESSION['email'];
$getimage = "SELECT * FROM info WHERE email = '$email'";
$result = mysql_query($getimage,$link);
?>
<div id="para"align="center">

<table bgcolor="dark-yellow"style="width:750px;">
<tr>
<td style="width:30px;">
<?php
while($row=mysql_fetch_array($result))
{
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:100px;height:100px;" ><br>';
}
?></td>

<td style="width:80px;"><a href="country.php">Home</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Profile.php">Profile</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Posts.php">Posts</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Messages.php">Messages</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Friends.php">Friends</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Notifications.php">Notifications</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="your_campaigns.php">Campaigns</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="your_events.php">Events</a><td style="width:10px;">
</td></tr></table>
<div id="para"align="center">
<table bgcolor="white"style="width:750px;">
<tr>
<td align="left">

<?php
$event_id = $_SESSION['event_id'];
$country = $_SESSION['country'];
$get = "SELECT * FROM events WHERE country='$country'AND event_id='$event_id'";
$retval = mysql_query($get,$link);
if(!$retval)
{
die('cannot fetch data:'.mysql_error());
}
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{ 
  
  echo'<img src="data:image;base64,'.$row['photo'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
  
}
?>
 <table>
 <tr>
 <td>
 <p>
 <form method="post"action="about_event.php">
 <input type="hidden"name="event_id"value="<?php echo $event_id; ?>">
 <input type="submit"value="About"style='background-color:cyan;color:red;border-radius:8px;'>
 </form></p></td>
 <td>
 <p>
 <?php
 $attend = mysql_query("SELECT * FROM event_attend WHERE event_id ='$event_id'AND attendee_email='$email'");
 $rows = mysql_fetch_array($attend);
 if(mysql_num_rows($attend)==0)
 {
  echo
  "<form method='post'action='attend_event.php'>
  <input type='hidden'name='event_id'value='$event_id'>
  <input type='hidden'name='attendee_email'value='$email'>
 <input type='submit'value='Attend'style='background-color:cyan;color:red;border-radius:8px;'></form>";
 }
 else if(mysql_num_rows($attend)==1)
 {
  echo
  "<form method='post'action='unattend_event.php'>
  <input type='hidden'name='event_id'value='$event_id'>
  <input type='hidden'name='attendee_email'value='$email'>
 <input type='submit'value='Unattend'style='background-color:cyan;color:red;border-radius:8px;'></form>";
 }
 
 ?>
</p></td>
 <td>
 <p>
 <?php
 if(isset($_GET['msg']))
 {
   $message = $_GET['msg'];
   if($message==1)
   {
     echo"<br><span style='background-color:green;color:red;'>Your status has been updated successfully!</span>";
    }
	if($message==2)
   {
     echo"<br><span style='background-color:green;color:red;'>Your photo status has been updated successfully!</span>";
    }
	if($message==3)
	{
	 echo"<br><span style='background-color:green;color:red;'>Status cannot be empty!</span>";
	 }
	 
	 
}
?>
 
 <?php
 $message = "SELECT * FROM events WHERE event_id='$event_id'";
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
	  echo" <form method='post'action='message_event.php'>
       <input type='hidden'name='admin_email'value='$admin_email'>
       <input type='submit'name='submit'value='Message The Admin'style='background-color:cyan;color:red;border-radius:8px;'>
      </form>";
	}
  }
 ?>
 </p></td></tr></table>
 <?php
 $get_name = "SELECT * FROM events WHERE event_id='$event_id'";
 $name = mysql_query($get_name,$link);
 if(!$name)
 {
  die('cannot fetch data:'.mysql_error());
 }
while($row=mysql_fetch_array($name,MYSQL_ASSOC))
{
  $jina = $row['owner'];
}
?>
<?php
if($email==$admin_email)
{
 echo"
 <form method='post'action='add_event_status.php'>
 <input type='hidden'name='id'value='$event_id'>
 <input type='hidden'name='name'value='$jina'>
 <font color='orange'>Add Status:</font><br><textarea rows='5'cols='40'placeholder='Add Status...'name='status'></textarea><br>
 <input type='submit'value='submit'style='background-color:cyan;color:red;border-radius:8px;'></form>";
 echo"
 <form method='post'action='add_photo_status.php'>
 <input type='hidden'name='id'value='$event_id'>
 <input type='hidden'name='name'value='$jina'>
 <input type='submit'value='Add Photos'style='background-color:cyan;color:red;border-radius:8px;'></form>";
}
?>
<?php
$get_status = "SELECT * FROM event_status WHERE id='$event_id'ORDER BY event_status_id DESC";

$status = mysql_query($get_status,$link);
if(!$status)
{
 die('cannot fetch data:'.mysql_error());
}
while($row=mysql_fetch_array($status,MYSQL_ASSOC))
{
  $admin_email = $row['admin_email'];
  if(empty($row['photo']))
  {
  $event_status_id = $row['event_status_id'];
  $number_of_comments = mysql_query("SELECT * FROM comment_event_status WHERE event_status_id='$event_status_id'");
  $number = mysql_num_rows($number_of_comments);
  echo"
  <hr color='red'width='100%'size='01'>
  <font color='orange'>{$row['name']}</font><br>
  <font color='blue'>{$row['status']}</font><br>";
  echo"<a href='comment_event_status_session.php?event_status_id=$event_status_id'>$number Comment</a>";
  if($email==$admin_email)
  {
  echo"&nbsp &nbsp<a href='edit_event_status.php?event_status_id=$event_status_id'>Edit</a>";
  }
  echo"&nbsp &nbsp<a href='delete_event_status.php?event_status_id=$event_status_id'>Delete</a>";
}
else
{
  $photo_status_id = $row['event_status_id'];
  $number_of_commentz = mysql_query("SELECT * FROM comment_event_status WHERE event_status_id='$photo_status_id'");
  $numberz = mysql_num_rows($number_of_commentz);
 echo"
  <hr color='red'width='100%'size='01'>
  <font color='orange'>{$row['name']}</font><br>
  <font color='blue'>{$row['status']}</font><br>";
   echo'<img src="data:image;base64,'.$row['photo'].'" style="width:200px;height:200px;" ><br>';
   echo"<a href='comment_event_status_session.php?event_status_id=$photo_status_id'>$numberz Comment</a>";
   if($email==$admin_email)
   {
   echo"&nbsp &nbsp<a href='edit_event_status.php?event_status_id=$photo_status_id'>Edit</a>";
   }
   echo"&nbsp &nbsp<a href='delete_event_status.php?event_status_id=$photo_status_id'>Delete</a>";
  }
 }
?>
  


 
</td></tr></table></div></body></html>