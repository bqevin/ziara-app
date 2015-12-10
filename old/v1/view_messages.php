<?php
session_start();
include('travel_db_connect.php');
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
<title> Ziara</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<style>
#cyan{background-color:cyan;color:red;border-radius:8px;}
</style>
</head>
<body style="background-image:url(shading.png);background-repeat:repeat;"link="lime"alink="lime"vlink="lime"/>
<div id="para"align="center">
<p>
<?php
$email = $_SESSION['email'];
$getimage = "SELECT * FROM info WHERE email = '$email'";
$result = mysql_query($getimage,$link);
?></p>
<div id="para"align="center">

<table bgcolor="dark-yellow"style="width:750px;">
<tr>
<td style="width:30px;">
<?php
while($row=mysql_fetch_array($result))
{
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
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
<table width="100%">
<tr>
<td align="left" width="45%">
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
  echo"<p style='background-color:white;border-radius:8px;'><font color='red'size='03'>{$row['fname']} {$row['lname']}</font><br>
  <font color='blue'>{$row['message']}</font></p>";
}
?></td>
<td width="10%"></td>
<td width="45%"align="left">
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
  echo"<p style='background-color:white;border-radius:8px;'><font color='green'size='03'>{$row['fname']} {$row['lname']}</font><br>
  <font color='blue'>{$row['message']}</font></p>";
}
?></td></tr></table>

<p><form method="post"action="reply_action.php"enctype="multipart/form-data">
<textarea rows="10"cols="50"name="message"placeholder="Reply..."style="border-radius:8px;"maxlength="1000"></textarea><br>
<input type="hidden"name="receiver_email"value= <?php echo $sender_email;?>>
<input type="submit"value="Reply"id="cyan"></p></body></html>
   
