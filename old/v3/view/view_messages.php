<?php
session_start();
include('../config/database/travel_db_connect.php');
$sender_email = $_SESSION['sender_email'];
$receiver_email = $_SESSION['receiver_email'];
$qry = "SELECT * FROM messages WHERE sender_email = '$sender_email'AND receiver_email='$receiver_email'";
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
#cyan{background-color:cyan;color:red;border-radius:8px;}
</style>
</head>
<body >
<div id="para"align="center">
<p>
<?php
$email = $_SESSION['email'];
$getimage = "SELECT * FROM info WHERE email = '$email'";
$result = mysql_query($getimage,$link);
?></p>
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
<a href="../controller/events/your_events.php">Events</a
</td></tr></table>
<table bgcolor="silver"width="45%">
<tr>
<td>
<?php
if(isset($_GET['msg']))
{
  $message = $_GET['msg'];
  if($message==1)
  {
    echo"<span style='background-color:green;color:red;'>Message cannot be empty!</span>";
  }
 }
 ?>
<p>
<?php
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  echo"<p style='background-color:white;'><font color='red'size='03'>{$row['fname']} {$row['lname']}</font><br>
  <font color='blue'>{$row['message']}</font></p>";
}
?>
</td>
<td>
<p>
<?php
$query = "SELECT * FROM messages WHERE sender_email='$receiver_email'AND receiver_email = '$sender_email'";
$receive = mysql_query($query,$link);
if(!$receive)
{
 die('cannot fetch data:'.mysql_error());
}
while($row = mysql_fetch_array($receive,MYSQL_ASSOC))
{
  echo"<p style='background-color:white;'><font color='red'size='03'>{$row['fname']} {$row['lname']}</font><br>
  <font color='blue'>{$row['message']}</font></p>";
}
?></td></tr></table>

<p><form method="post"action="reply_action.php"enctype="multipart/form-data">
<textarea rows="10"cols="40"name="message"placeholder="Reply..."style="border-radius:8px;"maxlength="1000"></textarea><br>
<input type="hidden"name="receiver_email"value= <?php echo $sender_email;?>>
<input type="submit"value="Reply"id="cyan"></p></body></html>
   
