<?php
session_start();
include('../config/database/travel_db_connect.php');
$id = $_GET['id'];
$qry = "SELECT * FROM comments WHERE id = '$id'";
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
<body >
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
<table width="45%"bgcolor="white">
<tr>
<td bgcolor="white">
<?php
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
  echo"<form method='post'action='../controller/action/edit_main_status_comment_action.php'>
  <font color='red'>Edit status:</font><br><textarea rows='5'cols='25'name='status'maxlength='1500'>{$row['status']}</textarea><br>
  <input type='hidden'name='id'value='$id'>
  <input type='submit'value='comment'style='color:red;background-color:cyan;border-radius:8px;'></form>";
}
?>
</td></tr></table></body></html>