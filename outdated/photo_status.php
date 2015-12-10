<?php
session_start();
include('../config/database/travel_db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<style>
p,p2{background-color:white;opacity:0.9;color:orange;}
</style>
</head>
<body>
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
<a href="your_campaigns.php">Campaigns</a>
<a href="../controller/events/your_events.php">Events</a>
</td></tr></table>
<table bgcolor="white"width="45%">
<tr>
<td width="45%">
<p>Add a photo status
<br><form method="post"action="../controller/action/photo_status_action.php"enctype="multipart/form-data">
<font color="red">status:</font><br><textarea rows="5"cols="20"name="status"placeholder="photo status..."maxlength="200"></textarea><br>
<input type="file"name="image"/><br>
<input type="submit"name="sumit"value="Upload"style="background-color:cyan;color:red;border-radius:8px;"/>
</form></p></td></tr></table></div></body></html>