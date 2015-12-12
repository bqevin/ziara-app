<?php
session_start();
include('../config/database/travel_db_connect.php');
$campaign_id = $_POST['id'];
$admin_email = $_POST['admin_email'];
$bye = $_POST['name'];
?>
<!DOCTYPE html>
<html>
<head>
<style>

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
<p>
<form method="post"action="campaign_status_photo_action.php"enctype="multipart/form-data">
<font color="orange">Add Caption:</font><br><textarea rows="5"cols="40"maxlength="250"name="status"placeholder="caption..."></textarea><br>
<input type='hidden'name='admin_email'value='<?php echo $admin_email;?>'>
<input type='hidden'name='id'value='<?php echo $campaign_id; ?>'>
<input type='hidden'name='name'value='<?php echo $bye; ?>'>
<input type="file"name="image"><br>
<input type="submit"name="sumit"value="Submit"style="background-color:cyan;color:red;border-radius:8px;"></form></td></table></div></body></html>