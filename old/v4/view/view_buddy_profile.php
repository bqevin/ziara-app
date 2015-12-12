<?php
session_start();
include('../config/database/travel_db_connect.php');
$email = $_SESSION['buddy_email'];
$country = $_SESSION['country'];
$query = "SELECT * FROM info WHERE  email='$email'";
$retval = mysql_query($query,$link);
if(!$retval)
{
die('could not fetch data:'.mysql_error());
}

?>
<!DOCTYPE html>
<html>
<head>
<style>
</style>
</head>
<body >
<?php
$my_email = $_SESSION['email'];
$getimage = "SELECT * FROM info WHERE email = '$my_email'";
$result = mysql_query($getimage,$link);
?>
<div id="para"align="middle">
<table bgcolor="dark-yellow"width="45%">
<tr>
<th>
<?php
while($row=mysql_fetch_array($result))
{
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" >';
}
?></th>
<td>
<a href="country.php">Home</a>
<a href="Profile.php">Profile</a>
<a href="Posts.php">Posts</a>
<a href="Messages.php">Messages</a>
<a href="Friends.php">Friends</a>
<a href="Notifications.php">Notifications</a>
<a href="your_campaigns.php">Campaigns</a>
<a href="your_events.php">Events</a>
</td></tr></table>
<div id="para"align="middle">
<table bgcolor="silver"width="45%">
<tr>
<td width="45%"bgcolor="white">

<?php

while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
 $friend_email = $row['email'];
 $country = $row['country'];
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:90%90%90%90%;width:90px;height:90px;" ><br>';
echo"<font color='orange'>Name:</font><font color='blue'>{$row['fname']} {$row['lname']}</font><br>";
echo"<font color='orange'>Email:</font><font color='blue'>{$row['email']}</font><br>";
echo"<font color='orange'>Country:</font><font color='blue'>{$row['country']}</font><br>";
echo"<font color='orange'>Gender:</font><font color='blue'>{$row['gender']}</font><br>";
echo"<font color='orange'>Job:</font><font color='blue'>{$row['job']}</font><br>";
echo"<font color='orange'>Skills:</font><font color='blue'>{$row['skills']}</font><br>";
echo"<font color='orange'>Religion:</font><font color='blue'>{$row['religion']}</font><br>";
echo"<font color='orange'>Relationship:</font><font color='blue'>{$row['relationship']}</font><br>";
echo "<font color='orange'>Hobbies:</font><font color='blue'>{$row['hobbies']}</font><br>";
if($row['gender']=="Female")
{
 echo"<font color='orange'>Places She Has Visited:</font><font color='blue'>{$row['places']}</font><br>";
}
else
{
 echo"<font color='orange'>Places He Has Visited:</font><font color='blue'>{$row['places']}</font><br>";
}
if($row['gender']=="Female")
{
 echo"<font color='orange'>About Her:</font><font color='blue'>{$row['about']}</font><br>";
}
else
{
 echo"<font color='orange'>About Him:</font><font color='blue'>{$row['about']}</font><br>";
}

}
?>
<table>
<tr>
<td>
<form method="post"action="block_buddy.php">
<input type="hidden"name="email"value="<?php echo $email;?>">
<input type="submit"value="Unfriend"style="background-color:cyan;color:red;border-radius:8px;"></form></td>
<td>
<form method="post"action="message_buddy.php">
<input type="hidden"name="email"value="<?php echo $email;?>">
<input type="submit"value="Message"style="background-color:cyan;color:red;border-radius:8px;"></form></td></tr></table>

</td></tr></table></body></html>

