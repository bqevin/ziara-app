<?php
session_start();
include('travel_db_connect.php')
?>
<!DOCTYPE html>
<html>
<head>
<title> Ziara</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<style>
p:hover{background-color:#00FF00;}
#submit{background-color:#33FF99;color:white;border-radius:5px;width:200px;height:40px;}
#submit:hover{background-color:white;}
</style>
<body style="background-image:url(safari.jpg);background-repeat:no-repeat;background-size: cover;">
<table width="100%"style="height:40px;background-color:#99CC00;">
<tr>
<td width="10%">
<span style="color:white;text-shadow:4px 4px 8px green;font-size:25px;font-weight:bold;"><i>Ziara.</i></span></td>
<td width="35%">
<form method="post"action="search_action.php">
<input type="text"name="email"placeholder="search by email"style="width:250px;height:40px;border-radius:5px;border-color:black;">
<input type="submit"value="search" style="width:100px;height:40px;background-color:#33FF99;color:white;border-radius:5px;"></form></td>
<td width="10%">
<span><a href="country.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="home.png" style="width:20px;height:20px;">Home</a></span>
</td>
<td width="5%"></td>
<td width="10%">
<span><a href="scroll_friends.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="friends.png" style="width:20px;height:20px;">Friends</a></span>
</td>
<td width="5%"></td>
<td width="10%">
<span><a href="my_campaigns.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="microphone.png" style="width:20px;height:20px;">Campaigns</a></span>
</td>
<td width="5%"></td>
<td width="10%">
<span><a href="my_events.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="calendar.png" style="width:20px;height:20px;">Events</a></span>
</td></tr></table>
<table width="100%">
<tr>
<td width="25%"></td>
<td width="50%" style="background-color:#FFFFCC;border-radius:5px;">
<?php
$email = $_SESSION['email'];
$see_ppic = "SELECT * FROM info WHERE email='$email'";
$retval = mysql_query($see_ppic,$link);
if(!$retval)
{
  die('Error:'.mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
  echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:5px;width:200px;height:200px;background-color:white;" ><br>';
  echo"<form method='post'action='change_ppic.php'>
  <input type='submit' id='submit'value='change photo'></form>";
  echo"<span style='font-size:20px;color:#00FF66;'>First Name:</span><span style='font-size:20px;'>{$row['fname']}</span><br>";
  echo"<span style='font-size:20px;color:#00FF66;'>Last Name:</span><span style='font-size:20px;'>{$row['lname']}</span><br>";
  echo"<span style='font-size:20px;color:#00FF66;'>Email:</span><span style='font-size:20px;'>{$row['email']}</span><br>";
  echo"<span style='font-size:20px;color:#00FF66;'>Phone Number:</span><span style='font-size:20px;'>{$row['pnumber']}</span><br>";
  echo"<span style='font-size:20px;color:#00FF66;'>Country:</span><span style='font-size:20px;'>{$row['country']}</span><br>";
  echo"<span style='font-size:20px;color:#00FF66;'>Gender:</span><span style='font-size:20px;'>{$row['gender']}</span><br>";
  echo"<form method='post'action='edit_profile.php'>
  <input type='submit' id='submit'value='Edit Profile'></form>";
}
?></td><td width="25%"></td></tr></table></body></html>
