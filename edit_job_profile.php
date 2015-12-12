<?php
session_start();
include('travel_db_connect.php');
$my_email = $_SESSION['email'];
$job_id = $_SESSION['admin_job_id'];
$qry = "SELECT * FROM jobs WHERE admin_email = '$my_email'AND jobs_id='$job_id'";
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
<td width="5%"><a href="your_events.php">Events</a></td><td width="2.5%"></td>
</td></tr></table>
<table bgcolor="white"width="70%">
<tr>
<td align="left">
<p>
<?php
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  
  echo"
  <form method='post'action='edit_job_profile_action.php'>
 <font color='orange'>Name:</font><br><input type='text'name='employer'value='{$row['employer']}'style='width:300px;'><br>
 <font color='orange'>Type Of Service:</font><br><input type='text'name='job'value='{$row['job']}'style='width:300px;'><br>
 <font color='orange'>Contact Number:</font><br><input type='text'name='number'value='{$row['number']}'style='width:300px;'><br>
 <font color='orange'>Email:</font><br><input type='text'name='email'value='{$row['email']}'style='width:300px;'><br>
 <font color='orange'>Website:</font><br><input type='text'name='website'value='{$row['website']}'style='width:300px;'><br>
 <font color='orange'>Country:</font><br><input type='text'name='country'value='{$row['country']}'style='width:300px;'><br>
 <font color='orange'>Location:</font><br><input type='text'name='location'value='{$row['location']}'style='width:300px;'><br>
 
 <font color='orange'>Description:</font><br><textarea rows='5'cols='40'name='description'maxlength='1500'>{$row['description']}</textarea><br>
 <input type='submit'value='Done'style='background-color:cyan;color:red;border-radius:8px;'></form>";
 }
 ?>
 </p></td></tr></table></body></html>
  