<?php
session_start();
include('../config/database/travel_db_connect.php');
$photo_id = $_SESSION['photo_status_id'];
$qry = "SELECT * FROM status WHERE status_id = '$photo_id'";
$retval = mysql_query($qry,$link);
if(!$retval)
{
 die('could not fetch data:'.mysql_error());
}
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
<?php
$get_status_owner = "SELECT * FROM status WHERE status_id='$photo_id'";
$status_owner = mysql_query($get_status_owner,$link);
if(!$status_owner)
{
  die('cannot fetch data:'.mysql_error());
}
while($row=mysql_fetch_array($status_owner,MYSQL_ASSOC))
{
   $status_owner_email = $row['email'];
 }
 ?>
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
<td width="45%">
<?php
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  echo"
  <font color='orange'>{$row['fname']}{$row['lname']}</font><br>
  <font color='blue'>{$row['status']}</font><br>";
  echo'<img src="data:image;base64,'.$row['image'].'" style="width:200px;height:200px;" ><br>';
  echo"<hr color='red'width='100%'size='01'>";
  
}
?>
<form method="post"action="comment_main_photo.php">
<font color="red">Comment:</font><br><textarea rows="5"cols="25"name="status"placeholder="comment..."maxlength="200"></textarea><br>
<input type="hidden"name="status_id"value="<?php echo $photo_id;?>">
<input type="hidden"name="status_owner"value="<?php echo $status_owner_email;?>">
<input type="submit"value="comment"style="background-color:cyan;color:red;border-radius:8px"></form>
<?php
$get_comments = "SELECT * FROM comments WHERE status_id = '$photo_id'ORDER BY status_id DESC";
$comments = mysql_query($get_comments,$link);
if(!$comments)
{
die('cannot fetch data:'.mysql_error());
}

while($row=mysql_fetch_array($comments,MYSQL_ASSOC))
{
$commenter_email = $row['commenter_email'];
$id = $row['id'];

echo"
<hr color='red'size='01'width='100%'>
<font color='lime'>{$row['fname']} {$row['lname']}</font><br>
<font color='blue'>{$row['status']}</font><br>";
if($email==$commenter_email)
{
 echo"<a href='edit_comment_photo.php?id=$id'>Edit</a>";
 echo"&nbsp &nbsp<a href='delete_comment_photo.php?id=$id'>Delete</a>";
 
 }
}
?>


</td></tr></table></div></body></html>
  