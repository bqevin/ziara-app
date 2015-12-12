<?php
session_start();
include('../config/database/travel_db_connect.php');
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
<style>
</style>
</head>
<body>

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
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:100px;height:100px;" ><br>';
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
<td align="center">
<p>
<?php
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  
  echo"
  <form method='post'action='../controller/action/edit_profile_action.php'>
  
 <font color='orange'>First Name:</font><br><input type='text'name='fname'value='{$row['fname']}'><br>
 <font color='orange'>Last Name:</font><br><input type='text'name='lname'value='{$row['lname']}'><br>
 <font color='orange'>Email:</font><br><input type='text'name='email'value='{$row['email']}'><br>
 <font color='orange'>Country:</font><br><input type='text'name='country'value='{$row['country']}'><br>
 <font color='orange'>Gender:</font><br><input type='text'name='gender'value='{$row['gender']}'><br>
 <font color='orange'>Job:</font><br><input type='text'name='job'value='{$row['job']}'><br>
 <font color='orange'>Skills:</font><br><input type='text'name='skills'value='{$row['skills']}'><br>
 <font color='orange'>Religion:</font><br><input type='text'name='religion'value='{$row['religion']}'><br>
 <font color='orange'>Relationship:</font><br><input type='text'name='relationship'value='{$row['relationship']}'><br>
 <font color='orange'>No.Of.Kids:</font><br><input type='text'name='kids'value='{$row['kids']}'><br>
 <font color='orange'>Hobbies:</font><br><textarea rows='5'cols='40'name='hobbies'>{$row['hobbies']}</textarea><br>
 <font color='orange'>Places You Have Visited:</font><br><textarea rows='5'cols='40'name='places'>{$row['places']}</textarea><br>
 <font color='orange'>About You:</font><br><textarea rows='5'cols='40'name='about'maxlength='500'>{$row['about']}</textarea><br>
 <input type='submit'value='Done'style='background-color:cyan;color:red;border-radius:8px;'>
 
 </form>";
 }
 ?>
 </p></td></tr></table></body></html>
  