<?php
session_start();
include('../../config/database/travel_db_connect.php');

@$admin_email = $_POST['admin_email'];

?>
<!DOCTYPE html>
<html>
<head>
<style>
#cyan{background-color:cyan;color:red;border-radius:8px;}
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

<a href="your_events.php">Events</a>

</td></tr></table>
<table bgcolor="white"width="45%">
<tr>
<td align="center">
<p>
<?php
if(isset($_GET['msg']))
{
 $message = $_GET['msg'];
 if($message==1)
 {
   echo"<span style='color:red;background-color:green;'>Your message has been send successfully</span>";
 }
 if($message==2)
 {
   echo"<span style='color:red;background-color:green;'>Message cannot be empty!</span>";
 }
}
?>

<form method="post"action="../action/campaign_message_event_action.php"enctype="multipart/form-data">
<input type="hidden"name="receiver_email"value="<?php echo $admin_email;?>">

<font color="orange">Message:</font><br><textarea rows="10"cols="40"placeholder="message..."maxlength="200"name="message"></textarea><br>

<input type="submit"value="Send Message"id="cyan"name="sumit"></form></p></body></html>