<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
p{background-color:brown;color:white;opacity:0.8;}
</style>
</head>
<body>
<div id="table"align="left">
<table width="100%">
<tr>
<td align="center"width="12%"bgcolor="khaki"><a href="country.php">Home</a></td>
<td align="center"width="12%"bgcolor="khaki"><a href="campaigns.php">Campaigns</a></td>
<td align="center"width="12%"bgcolor="khaki"><a href="service.php">Service Providers</a></td>
<td align="center"width="12%"bgcolor="khaki"><a href="education.php">Education Centers</a></td>
<td align="center"width="12%"bgcolor="khaki"><a href="friends_here.php">Find Friends</a></td>
<td align="center"width="12%"bgcolor="khaki"><a href="jobs.php">Find Jobs</a>
<td width="28%"></td></tr></table>

<div id="para"align="center">
<p>Welcome in <?php echo $_SESSION['country'];?> <?php echo $_SESSION['fname'];?>
.</p>
<?php
include('travel_db_connect.php');
$email = $_SESSION['email'];
$getimage = "SELECT * FROM profile_pic WHERE email = '$email'";
$result = mysql_query($getimage,$link);
?>
<table width="100%">
<tr>
<td align="center"width="30%"height="100%"bgcolor="yellow"style="opacity:0.9;"><?php
while($row=mysql_fetch_array($result))
{
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
}
?>
<a href="country.php">Home</a><br>
<a href="Profile.php">Profile</a><br>
<a href="Posts.php">Posts</a><br>
<a href="Messages.php">Messages</a><br>
<a href="Friends.php">Friends</a></br>
<a href="Notifications.php">Notifications</a><br>
<a href="Campaigns.php">Campaigns</a>
</td>
<td align="center"width="50%"bgcolor="white">
<p>
<form method="post"action="../controller/status_action.php">
<font color="FF0099">Say Something:</font><br><textarea rows="5"cols="40"name="status"placeholder="Say Something..."></textarea>
<input type="submit"value="Submit"></form>
<a href="photo_status.php">Add Photos</a><br>
<?php

$country = $_SESSION['country'];
$email = $_SESSION['email'];
$status = "SELECT * FROM photo_status,status WHERE country='$country'ORDER BY status_time DESC";
$retval = mysql_query($status,$link);
if(!$retval)
{
die('could not fetch data:'.mysql_error());
}
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
 echo"<font color='blue'>{$row['fname']}
 {$row['lname']}</font><br>
 <font color='lime'>{$row['status']}</font><br>
 
 ";
 }
 $status_photo = "SELECT * FROM photo_status WHERE country = '$country'";
 $result = mysql_query($status_photo,$link);
 if(!$result)
 {
  die('could not fetch data:'.mysql_error());
  }
  while($row=mysql_fetch_array($result,MYSQL_ASSOC))
  {
   echo"<font color='blue'>{$row['fname']}</font>
        <font color='blue'>{$row['lname']}</font><br>
        <font color='lime'>{$row['status']}</font><br>
		<img src='data:image;base64,".$row['status_photo']."' style='width:200px;height:200px;' ></p></div><br>";
  }
		
		
 ?>
 
</p>
</td>
<td width="20%"></td></tr></table>



</body></html>

