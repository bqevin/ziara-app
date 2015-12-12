<?php
session_start();
include('../config/database/travel_db_connect.php');
$id = $_POST['id'];
$name = $_POST['name'];
?>
<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body style="background-image:url(shading.png);background-repeat:repeat;"link="lime"alink="lime"vlink="lime"/>
<div id="para"align="middle">
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
<table bgcolor="white"width="45%">
<tr>
<td>
<p>
<form method='post'action="add_photo_status_action.php"enctype="multipart/form-data">
<input type="hidden"name="name"value="<?php echo $name;?>">
<input type="hidden"name="id"value="<?php echo $id;?>">
<font color="orange">Add Caption:</font><br><textarea rows="5"cols="40"name="status"placeholder="caption..."maxlength='200'></textarea><br>
<input type="file"name="image">

<input type="submit"name="sumit"value="Upload."style="background-color:cyan;color:red;border-radius:8px;"></form></p>
</td></tr></table></body></html>