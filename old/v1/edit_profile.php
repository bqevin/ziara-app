<?php
session_start();
include('travel_db_connect.php');
$my_email = $_SESSION['email'];
$qry = "SELECT * FROM info WHERE email = '$my_email'";
$retval = mysql_query($qry,$link);
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
<table bgcolor="white"style="width:750px;">
<tr>
<td align="left">
<p>

<?php
if(isset($_GET['msg']))
{
  $message = $_GET['msg'];
  if($message==1)
  {
     echo"<span style='background-color:green;color:red;'>Please fill in all the field!</span>";
   }
   if($message==2)
   {
     echo"<span style='background-color:green;color:red;'>Your updated email already exists!</span>";
	 }
   }
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  
  echo"
  <form method='post'action='edit_profile_action.php'>
 <font color='orange'>First Name:</font><br><input type='text'name='fname'value='{$row['fname']}'style='width:300px;'><br>
 <font color='orange'>Last Name:</font><br><input type='text'name='lname'value='{$row['lname']}'style='width:300px;'><br>
 <font color='orange'>Email:</font><br><input type='text'name='email'value='{$row['email']}'style='width:300px;'><br>
 <font color='orange'>Country:</font><br><input type='text'name='country'value='{$row['country']}'style='width:300px;'><br>
 <font color='orange'>Gender:</font><br><input type='text'name='gender'value='{$row['gender']}'style='width:300px;'><br>
 <font color='orange'>Job:</font><br><input type='text'name='job'value='{$row['job']}'style='width:300px;'><br>
 <font color='orange'>Skills:</font><br><input type='text'name='skills'value='{$row['skills']}'style='width:300px;'><br>
 <font color='orange'>Religion:</font><br><input type='text'name='religion'value='{$row['religion']}'style='width:300px;'><br>
 <font color='orange'>Relationship:</font><br><input type='text'name='relationship'value='{$row['relationship']}'style='width:300px;'><br>
 <font color='orange'>No.Of.Kids:</font><br><input type='text'name='kids'value='{$row['kids']}'style='width:300px;'><br>
 <font color='orange'>Hobbies:</font><br><textarea rows='5'cols='40'name='hobbies'>{$row['hobbies']}</textarea><br>
 <font color='orange'>Places You Have Visited:</font><br><textarea rows='5'cols='40'name='places'>{$row['places']}</textarea><br>
 <font color='orange'>About You:</font><br><textarea rows='5'cols='40'name='about'maxlength='500'>{$row['about']}</textarea><br>
 <input type='submit'value='Done'style='background-color:cyan;color:red;border-radius:8px;'></form>";
 }
 ?>
 </p></td></tr></table></body></html>
  