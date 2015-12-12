<?php
session_start();
include('../config/database/travel_db_connect.php');
$email = $_SESSION['email'];
$qry = "SELECT * FROM messages WHERE receiver_email = '$email'GROUP BY sender_email ORDER BY id DESC";
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
</style>
</head>
<body style="background-image:url(car.jpg);background-repeat:repeat;"link="lime"alink="lime"vlink="lime"/>
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
<table bgcolor="white"style="width:750px;">
<tr>
<td align="left">
<p>
<?php
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
 $id = $row['id'];
 $sender_email = $row['sender_email'];
 $receiver_email = $row['receiver_email'];
 $indice = mysql_query("SELECT * FROM messages WHERE sender_email = '$sender_email'AND receiver_email='$email'");
 $number_of_indices = mysql_num_rows($indice);
 $inbox = mysql_query("SELECT * FROM inbox WHERE receiver_email='$email' AND sender_email='$sender_email'");
 $inbox_number = mysql_num_rows($inbox);
 $real_inbox = $number_of_indices - $inbox_number;
 if(mysql_num_rows($inbox)==0)
 {
 echo"<font color='orange'>Sent By:</font><font color='blue'>{$row['fname']} {$row['lname']}</font><br>
<font color='orange'>Country:</font><font color='blue'>{$row['country']}</font><br>
<a href='insert_inbox.php?id=$id&sender_email=$sender_email&receiver_email=$receiver_email'>View Message($number_of_indices)</a>
<hr color='orange'width='100%'size='01'>";
}
else if(mysql_num_rows($inbox)!=0)
{
 echo"
 <font color='orange'>Sent By:</font><font color='blue'>{$row['fname']} {$row['lname']}</font><br>
<font color='orange'>Country:</font><font color='blue'>{$row['country']}</font><br>
 <a href='insert_inbox.php?id=$id&sender_email=$sender_email&receiver_email=$receiver_email'>View Message($real_inbox)</a>
<hr color='orange'width='100%'size='01'>";
}
}
?>



 </p></td></tr></table></body></html>

