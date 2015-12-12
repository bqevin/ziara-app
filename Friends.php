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
#link{color:#6699FF;font-size:20px;text-decoration:none;font-weight:normal;}
#span{font-size:20px;color:#00FF66;}
.ScrollStyle{max-height:500px;overflow-y:scroll;width:1px;}
</style>
<body style="background-image:url(safari.jpg);background-repeat:no-repeat;background-size: cover;">
<table width="100%"style="height:40px;background-color:#99CC00;">
<tr>
<td width="10%">
<span style="color:white;text-shadow:4px 4px 8px green;font-size:25px;font-weight:bold;"><i>Ziara.</i></span></td>
<td width="35%">
<form method="post"action="search_action.php">
<input type="text"name="email"placeholder="search by email"style="width:250px;height:40px;border-radius:5px;border-color:black;">
<input type="submit"value="search" style="width:100px;height:40px;color:white;background-color:#33FF99;border-radius:5px;"></form></td>
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
<td width="50%" style='background-color:white;'class ="ScrollStyle">
<?php
$my_email = $_SESSION['email'];
$qry_friendship1 = "SELECT * FROM friendship WHERE host_friend='$my_email'";
$retval = mysql_query($qry_friendship1,$link);
if(!$retval)
{
  die('Error on 49:'.mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $guest_friend = $row['guest_friend'];
  $get_guest_friend = "SELECT * FROM info WHERE email='$guest_friend'";
  $retval = mysql_query($get_guest_friend,$link);
  if(!$retval)
  {
    die('Error on 58:'.mysql_error());
  }
  while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
  {
    $fname = $row['fname'];
  $lname = $row['lname'];
  $the_email = $row['email'];
  $pnumber = $row['pnumber'];
  $gender = $row['gender'];
  echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:5px;width:80px;height:80px;background-color:white;" ><br>';
  echo"<span><a href='view_profile.php?email=$the_email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>$fname $lname</a></span><br>";
  echo"<span id='span'>Email:</span><span style='font-size:20px;'>$the_email</span><br>";
  echo"<span id='span'>Phone Number:</span><span style='font-size:20px;'>$pnumber</span><br>";
  echo"<span id='span'>Gender:</span><span style='font-size:20px;'>$gender</span><br>";
  echo"<img src='user.png'style='width:15px;height:15px;'><a href='unfriend.php?guest_friend=$the_email & host_friend=$my_email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>Unfriend</a>";
  echo"&nbsp &nbsp<img src='message.png'style='width:15px;height:15px;'><a href='message_friend.php?sender_email=$my_email & receiver_email=$the_email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>Message</a>";
  echo"<hr style='color:#6699FF'size='1'width='100%'>";
 }
 }
 $qry_friendship2 = "SELECT * FROM friendship WHERE guest_friend='$my_email'";
$results = mysql_query($qry_friendship2,$link);
if(!$results)
{
  die('Error on 49:'.mysql_error());
}
while($row = mysql_fetch_array($results,MYSQL_ASSOC))
{
  $host_friend = $row['host_friend'];
  $get_host_friend = "SELECT * FROM info WHERE email='$host_friend'";
  $retval = mysql_query($get_host_friend,$link);
  if(!$retval)
  {
    die('Error on 58:'.mysql_error());
  }
  while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
  {
    $fname = $row['fname'];
  $lname = $row['lname'];
  $the_email = $row['email'];
  $pnumber = $row['pnumber'];
  $gender = $row['gender'];
  echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:5px;width:80px;height:80px;background-color:white;" ><br>';
  echo"<span><a href='view_profile.php?email=$the_email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>$fname $lname</a></span><br>";
  echo"<span id='span'>Email:</span><span style='font-size:20px;'>$the_email</span><br>";
  echo"<span id='span'>Phone Number:</span><span style='font-size:20px;'>$pnumber</span><br>";
  echo"<span id='span'>Gender:</span><span style='font-size:20px;'>$gender</span><br>";
  echo"<img src='user.png'style='width:15px;height:15px;'><a href='unfriend.php?guest_friend=$my_email & host_friend=$the_email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>Unfriend</a>";
  echo"&nbsp &nbsp<img src='message.png'style='width:15px;height:15px;'><a href='message_friend.php?sender_email=$my_email & receiver_email=$the_email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>Message</a>";
  echo"<hr style='color:#6699FF'size='1'width='100%'>";
 }
 }
?>
</td><td width="25%"></td></tr></table></body></html>
