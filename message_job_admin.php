<?php
session_start();
include('travel_db_connect.php');
@$receiver_email = $_POST['receiver_email'];
?>
<!DOCTYPE html>
<html>
<head>
<title> Ziara</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<style>
p,p2{background-color:white;opacity:0.9;color:blue;}
</style>
</head>
<body style="background-image:url(shading.png);background-repeat:repeat;width:100%;"link="lime"alink="lime"vlink="lime"/>
<div id="para"align="middle">
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
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
}
?></td>

<td width="5%"><a href="country.php">Home</a></td><td width="2.5%"></td>
<td width="5%"><a href="Profile.php">Profile</a></td><td width="2.5%"></td>
<td width="5%"><a href="Posts.php">Posts</a></td><td width="2.5%"></td>
<td width="5%"><a href="Messages.php">Messages</a></td><td width="2.5%"></td>
<td width="5%"><a href="Friends.php">Friends</a></td><td width="2.5%"></td>
<td width="5%"><a href="Notifications.php">Notifications</a></td><td width="2.5%"></td>
<td width="5%"><a href="your_campaigns.php">Campaigns</a></td><td width="2.5%"></td>
<td width="5%"><a href="your_events.php">Events</a></td><td width="2.5%">
</td></tr></table>
<table width="70%"bgcolor="white">
<tr>
<td align="left">
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
    echo"<span style='background-color:green;color:red;'>Message cannot be empty</span>";
}
}
?>
<form method="post"action="message_job_admin_action.php">
<input type="hidden"name="receiver_email"value="<?php echo $receiver_email;?>">
<font color="orange">Write Message:</font><br><textarea rows="5"cols="40"name="message"placeholder=" write message..."maxlength="200"></textarea><br>
<input type="submit"value="Send"style="background-color:cyan;color:red;border-radius:8px;"></form>
<a href='view_job.php'><-Back</a></p></td></tr></table></div></body></html>