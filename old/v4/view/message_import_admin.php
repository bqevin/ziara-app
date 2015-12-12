<?php
session_start();
include('../config/database/travel_db_connect.php');
@$receiver_email = $_POST['receiver_email'];
?>
<!DOCTYPE html>
<html>
<head>
<style>
p,p2{background-color:white;opacity:0.9;color:blue;}
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
<a href="your_campaigns.php">Campaigns</a>
<a href="your_events.php">Events</a>
</td></tr></table>
<table width="45%"bgcolor="white">
<tr>
<td width="45%">
<p>
<?php
if(isset($_GET['msg']))
{
  $message = $_GET['msg'];
  if($message==1)
  {
    echo"<span style='background-color:green;color:red;'>Your message has been successfully sent</span>";
}
if($message==2)
  {
    echo"<span style='background-color:green;color:red;'>Message cannot be empty!</span>";
}
}
?>
<form method="post"action="../controller/action/message_import_admin_action.php">
<input type="hidden"name="receiver_email"value="<?php echo $receiver_email;?>">
<font color="orange">Write Message:</font><br><textarea rows="5"cols="40"name="message"placeholder=" write message..."maxlength="200"></textarea><br>
<input type="submit"value="Send"style="background-color:cyan;color:red;border-radius:8px;"></form>
<a href='view_import_export.php'><-Back</a></p></td></tr></table></div></body></html>