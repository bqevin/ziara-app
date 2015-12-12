<?php
session_start();
include('../config/database/travel_db_connect.php');
$my_email = $_SESSION['email'];
$campaign_id = $_SESSION['admin_campaign_id'];
$qry = "SELECT * FROM campaign WHERE admin_email = '$my_email'AND campaign_id='$campaign_id'";
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
<body>

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
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:100px;height:100px;" ><br>';
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
    echo"<span style='background-color:green;color:red;'>No field should be left empty!</span>";
  }
}
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  
  echo"
  <form method='post'action='edit_campaign_profile_action.php'>
 <font color='orange'>Code Name:</font><br><input type='text'name='codee'value='{$row['codee']}'><br>
 <font color='orange'>By:</font><br><input type='text'name='bye'value='{$row['bye']}'><br>
 <font color='orange'>Subject Addressed:</font><br><input type='text'name='title'value='{$row['title']}'><br>
 <font color='orange'>Email:</font><br><input type='text'name='email'value='{$row['email']}'><br>
 <font color='orange'>Contact Number:</font><br><input type='text'name='number'value='{$row['number']}'><br>
 <font color='orange'>Website:</font><br><input type='text'name='website'value='{$row['website']}'><br>
 <font color='orange'>Country:</font><br><input type='text'name='country'value='{$row['country']}'><br>
 <font color='orange'>Description:</font><br><textarea rows='5'cols='40'name='description'maxlength='1500'>{$row['description']}</textarea><br>
 <input type='submit'value='Done'style='background-color:cyan;color:red;border-radius:8px;'></form>";
 }
 ?>
 </p></td></tr></table></body></html>
  