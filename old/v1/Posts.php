<?php
session_start();
include('travel_db_connect.php');
$my_email = $_SESSION['email'];
$country = $_SESSION['country'];
$get_posts = "SELECT * FROM status WHERE email='$my_email'AND country = '$country'ORDER BY status_id DESC";
$posts = mysql_query($get_posts,$link);
if(!$posts)
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
p,p2{background-color:white;opacity:0.9;color:blue;}
</style>
</head>
<body style="background-image:url(car.jpg);background-repeat:repeat;"link="lime"alink="lime"vlink="lime"/>
<div id="para"align="center">
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
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
}
?></td>

<td style="width:80px;"><a href="country.php">Home</a></td>
<td style="width:10px;"></td>
<td style="width:80px;"><a href="Profile.php">Profile</a></td>
<td style="width:10px;"></td>
<td style="width:80px;"><a href="Posts.php">Posts</a></td>
<td style="width:10px;"></td><td style="width:80px;"><a href="Messages.php">Messages</a></td>
<td style="width:10px;"></td>
<td style="width:80px;"><a href="Friends.php">Friends</a></td>
<td style="width:10px;"></td>
<td style="width:80px;"><a href="Notifications.php">Notifications</a></td>
<td style="width:10px;"></td>
<td style="width:80px;"><a href="Campaigns.php">Campaigns</a></td>
<td style="width:10px;"></td>
<td style="width:80px;"><a href="your_events.php">Events</a>
<td style="width:10px;"></td>
</td></tr></table>
<table style="width:750px;"bgcolor="white">
<tr>
<td align="left">
<?php
while($row=mysql_fetch_array($posts,MYSQL_ASSOC))
{
  if(empty($row['name']))
 {
   $status_id = $row['status_id'];
   $comment_counter = mysql_query("SELECT * FROM comments WHERE status_id='$status_id'");
 $get_counter = mysql_num_rows($comment_counter);
 echo"
 
 <hr width='100%'size='1'style='opacity:0.9;color:red;'>
 
 <font color='orange'>{$row['fname']}
 {$row['lname']}</font><br>
 <p3 style='width:600px;'><font color='blue'>{$row['status']}</font></p3><br>";
 $status_like = mysql_query("SELECT * FROM status_like WHERE status_id = '$status_id' AND status_liker_email = '$email'");
 $row = mysql_fetch_array($status_like);
 if(mysql_num_rows($status_like)==0)
 {
   $like_count = mysql_query("SELECT * FROM status_like WHERE status_id='$status_id'");
   $row = mysql_fetch_array($like_count);
   $number_of_likes = mysql_num_rows($like_count);
   echo"<a href='see_likes.php?status_id=$status_id'> $number_of_likes</a> <a href='like_status.php?status_id=$status_id'>like</a>";
   
   
   
   
 }
 else if(mysql_num_rows($status_like)==1)
 {
   $like_count = mysql_query("SELECT * FROM status_like WHERE status_id='$status_id'");
   $row = mysql_fetch_array($like_count);
   $number_of_likes = mysql_num_rows($like_count);
   echo"<a href='see_likes.php?status_id=$status_id'> $number_of_likes</a> <a href='unlike_status.php?status_id=$status_id'>unlike</a>";
   
   
 }
 echo"&nbsp &nbsp<a href='comment_status_session.php?status_id=$status_id'>$get_counter Comment</a>";
 echo"&nbsp &nbsp<a href='edit_status.php?status_id=$status_id'>Edit</a>";
 echo"&nbsp &nbsp<a href='delete_status.php?status_id=$status_id'>Delete</a>";
 }
 
 
 else
 {
    $photo_id = $row['status_id'];
	$comment_counter_photo = mysql_query("SELECT * FROM comments WHERE status_id='$photo_id'");
 $get_counter_photo = mysql_num_rows($comment_counter_photo);
   echo"
   <hr width='100%'size='1'style='opacity:0.9;color:red;'>
   
   <font color='orange'>{$row['fname']}
 {$row['lname']}</font><br>
 <p3 style='width:600px;'><font color='blue'>{$row['status']}</font></p3><br>
 <img src='data:image;base64,".$row['image']."' style='width:200px;height:200px;' ><br>";
 $photo_like = mysql_query("SELECT * FROM status_like WHERE status_id = '$photo_id' AND status_liker_email = '$email'");
 $row = mysql_fetch_array($photo_like);
 if(mysql_num_rows($photo_like)==0)
 {
   
   $like_count = mysql_query("SELECT * FROM status_like WHERE status_id='$photo_id'");
   $row = mysql_fetch_array($like_count);
   $number_of_likes = mysql_num_rows($like_count);
   echo"<a href='see_likes.php?status_id=$photo_id'>$number_of_likes</a> <a href='like_photo.php?status_id=$photo_id'>like</a>";
   
   
 }
 else if(mysql_num_rows($photo_like)==1)
 {
   $like_count = mysql_query("SELECT * FROM status_like WHERE status_id='$photo_id'");
   $row = mysql_fetch_array($like_count);
   $number_of_likes = mysql_num_rows($like_count);
   echo"<a href='see_likes.php?status_id=$photo_id'>$number_of_likes</a> <a href='unlike_photo.php?status_id=$photo_id'>unlike</a>";
 }
 echo"&nbsp &nbsp<a href='comment_photo_session.php?photo_status_id=$photo_id'>$get_counter_photo Comment</a>";
 echo"&nbsp &nbsp<a href='edit_status.php?status_id=$photo_id'>Edit</a>";
 echo"&nbsp &nbsp<a href='delete_status.php?status_id=$photo_id'>Delete</a>";
 }
 }
 
 ?></td></tr><table>
 
 