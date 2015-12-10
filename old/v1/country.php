<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title> Ziara</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<style>
p{background-color:brown;color:white;opacity:0.9;}
p1{background-color:yellow;opacity:0.8;}
h1,h2{color:orange;}
</style>
</head>
<body style="background-image:url(car.jpg);background-repeat:repeat;"link="lime"alink="lime"vlink="lime"/>


<div id="para"align="center">
<?php
include('travel_db_connect.php');
$email = $_SESSION['email'];
$getimage = "SELECT * FROM info WHERE email = '$email'";
$result = mysql_query($getimage,$link);
?>
<?php
$empty = "SELECT * FROM info WHERE email='$email'";
$see = mysql_query($empty,$link);
while($row = mysql_fetch_array($see))
{
  $fname = $row['fname'];
  $lname = $row['lname'];
  if($row['job']=="null"or $row['skills']=="null"or $row['religion']=="null" or $row['relationship']=="null" or $row['kids']=="null"or $row['hobbies']=="null"or $row['places']=="null"or $row['about']=="null")
  {
     echo"<span style='color:blue;background-color:yellow;width:500px;'>$fname $lname your profile is incomplete.Please complete your profile <a href='edit_profile.php'>here</a> fields should not be null.</span>";
    }
}
?>
<table bgcolor="dark-yellow"style="width:750px;">
<tr>
<td style="30px;">
<?php
while($row=mysql_fetch_array($result))
{
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
}
?></td>
<td style="width:70px;">
<a href="country.php">Home</a></td><td style="width:10px;"></td>

<td style="width:70px;">
<a href="Profile.php">Profile</a></td><td style="width:10px;"></td>

<td style="width:70px;">
<a href="Posts.php">Posts</a></td><td style="width:10px;"></td>
<?php
$my_messages = mysql_query("SELECT * FROM messages WHERE receiver_email='$email'");
$number_of_messages = mysql_num_rows($my_messages);
if(mysql_num_rows($my_messages)==0)
{
  echo"<td style='width:70px;'><a href='Messages.php'>Messages</a></td><td style='width:10px;'></td>";
}
else if(mysql_num_rows($my_messages)!=0)
{
  $txts = mysql_query("SELECT * FROM seen_messages WHERE receiver_email='$email'");
  $number_of_texts = mysql_num_rows($txts);
  $number_of_pings =   $number_of_messages - $number_of_texts;
  if($number_of_pings<=0)
  {
     echo"<td style='width:70px;'><a href='Messages.php'>Messages</td><td style='width:10px;'></td>";
  }
  else if($number_of_pings!=0)
  {
  echo"<td style='width:70px;'><a href='seen_messages.php?receiver_email=$email'>Messages($number_of_pings)</a></td><td style='width:10px;'></td>";
}
}

     
?> 

<td style="width:70px;"><a href="Friends.php">Friends</a></td><td style="width:10px;"></td>
<?php
$get_nots = mysql_query("SELECT * FROM comments WHERE status_owner='$email'AND commenter_email!='$email'");
$get_nots_number = mysql_num_rows($get_nots);
if(mysql_num_rows($get_nots)==0)
{
  echo"<td style='width:70px;'><a href='Notifications.php'>Notifications</a></td><td style='width:10px;'></td>";
}
else if(mysql_num_rows($get_nots)!=0)
{
  $index = mysql_query("SELECT * FROM seen_nots WHERE status_owner='$email'");
  $number_of_indices = mysql_num_rows($index);
  $actual_number = $get_nots_number - $number_of_indices;
  if($actual_number<=0)
  {
    echo"<td style='width:70px;'><a href='Notifications.php'>Notifications</a></td><td style='width:10px;'></td>";
   }
   else
   {
  echo"<td style='width:70px;'><a href='seen_nots.php?status_owner=$email'>Notifications($actual_number)</a></td><td style='width:10px;'></td>";
  }
}
?>

<td style="width:70px;"><a href="your_campaigns.php">Campaigns</a></td><td style="width:10px;"></td>
<td style="width:70px;"><a href="your_events.php">Events</a></td><td style="width:5px;"></td><td style="width:5px;">
<a href="menu.php">Menu</</td></tr></table></div>

<div id="para"align="center"><p2>
<table bgcolor="white"style="width:750px;">
<tr>
<td align="left">

<?php
if(isset($_GET['msg']))
{
 $message = $_GET['msg'];
 if($message==1)
 {
 echo"<span style='color:red;background-color:green;'>Your photo status has updated.</span>";
 }
 if($message==2)
 {
  echo"<span style='color:red;background-color:green;'>Your status has been updated.</span>";
 }
 if($message==3)
 {
 echo"<span style='color:red;background-color:green;'>Status cannot be empty.</span>";
 }
 }
 ?>
<form method="post"action="status_action.php">
<font color="FF0099">Say Something:</font><br><textarea rows="5"cols="40"name="status"placeholder="Say Something..."maxlength="400"></textarea>
<input type="submit"value="Submit"style="background-color:cyan;color:red;border-radius:8px;"></form></p>
<img src="photos.jpeg"width="40"height="30"><a href="photo_status.php">Add Photos</a><br>

<?php
$country = $_SESSION['country'];
$email = $_SESSION['email'];
$status = "SELECT * FROM status WHERE country='$country'ORDER BY status_id DESC";
$retval = mysql_query($status,$link);
if(!$retval)
{
die('could not fetch data:'.mysql_error());
}
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
 
   
 if(empty($row['name']))
 {
   $status_id = $row['status_id'];
   $status_email = $row['email'];
   $comment_counter = mysql_query("SELECT * FROM comments WHERE status_id='$status_id'");
 $get_counter = mysql_num_rows($comment_counter);
 echo"
 
 <hr width='100%'size='1'color='orange'>
 
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
   echo"<a href='see_likes.php?status_id=$status_id'> $number_of_likes</a> <a href='like_status.php?status_id=$status_id'><img src='love2.jpg'height='10'width='10'></a>";
   
   
 }
 else if(mysql_num_rows($status_like)==1)
 {
    $like_count = mysql_query("SELECT * FROM status_like WHERE status_id='$status_id'");
   $row = mysql_fetch_array($like_count);
   $number_of_likes = mysql_num_rows($like_count);
   echo"<a href='see_likes.php?status_id=$status_id'> $number_of_likes</a> <a href='unlike_status.php?status_id=$status_id'><img src='love1.jpg'height='10'width='10'></a>";
 }
 
 echo"&nbsp &nbsp<a href='comment_status_session.php?status_id=$status_id'>$get_counter comment</a>";
 if($email!=$status_email)
 {
 echo"&nbsp &nbsp<a href='view_profile.php?email=$status_email'>view profile</a>";
 }
 }
 else
 {
    $photo_id = $row['status_id'];
	$photo_email = $row['email'];
	$comment_counter_photo = mysql_query("SELECT * FROM comments WHERE status_id='$photo_id'");
 $get_counter_photo = mysql_num_rows($comment_counter_photo);
   echo"
   
   <hr width='100%'size='1'color='orange'>
   
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
   echo"<a href='see_likes.php?status_id=$photo_id'>$number_of_likes</a> <a href='like_photo.php?status_id=$photo_id'><img src='love2.jpg'height='10'width='10'></a>";
 }
 else if(mysql_num_rows($photo_like)==1)
 {
    $like_count = mysql_query("SELECT * FROM status_like WHERE status_id='$photo_id'");
   $row = mysql_fetch_array($like_count);
   $number_of_likes = mysql_num_rows($like_count);
   echo"<a href='see_likes.php?status_id=$photo_id'> $number_of_likes</a> <a href='unlike_photo.php?status_id=$photo_id'><img src='love1.jpg'height='10'width='10'></a>";
 }
 echo"&nbsp &nbsp<a href='comment_photo_session.php?photo_status_id=$photo_id'>$get_counter_photo comment</a>";
 if($email!=$photo_email)
 {
 echo"&nbsp &nbsp<a href='view_profile.php?email=$photo_email'>view profile</a>";
 }
 }
 }
 ?></td></tr><table></p2>
 <table style="width:750px;">
 <tr>
 <td bgcolor="white" align="left">
  
 <h1>Your Admin Panel</h1>
 <p2>
 <?php
$my_email = $_SESSION['email'];
$my_image = "SELECT * FROM info WHERE email = '$email'";
$results = mysql_query($my_image,$link);
while($row=mysql_fetch_array($results))
{
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
}
?>
<font color="lime"><a href="admin_campaign.php">Campaigns</a></font><br>
<font color="lime"><a href="admin_events.php">Events</a></font><br>
<font color="lime"><a href="admin_lands.php">Buy/Sell Land</a></font><br>
<font color="lime"><a href="admin_service.php">Service Providers</a></font><br>
<font color="lime"><a href="admin_education.php">Education Centres</a></font><br>
<font color="lime"><a href="admin_job.php">Jobs</a></font><br>
<font color="lime"><a href="admin_import_export.php">Import/Export</a></font>
</p2>



<h2>Ziara</h2>
<p3>
 <font color="lime"><a href="about.php">About Us</a></font><br>
 <font color="lime"><a href="contact.php">Contact Us</a></font><br>
 <font color="lime"><a href="#">Terms And Conditions</a></font><br>
<font color="lime"><a href="faqs.php">FAQs</a></font><br>
<font color="lime"><a href="ziara_jobs.php">Jobs</a></font><br>
<font color="lime"><a href="#">Help</a></font><br>
<font color="lime"><a href="settings.php">Settings</a></font><br>
<font color="lime"><a href="log_out.php">Logout(<?php echo $_SESSION['fname'];?> <?php echo $_SESSION['lname'];?>)</a></font><br></td>
 </tr></table>
<table bgcolor="lime"border="0"bordercolor="white"cellspacing= 0.5 style="width:750px;">
<th><font face="Georgia"color="white">Ziara Social Web App &#0169|All rights reserved|Designed by:Ziara</a></th></table>
 

</body></html>

