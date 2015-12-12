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
#submit{background-color:#33FF99;color:white;border-radius:5px;width:100px;height:40px;}
#submit:hover{background-color:white;}
#link{color:#6699FF;font-size:20px;text-decoration:none;font-weight:normal;}
#span{font-size:20px;color:#00FF66;}
#input{width:400px;height:40px;border-color:black;border-radius:5px;}
#select{border-radius:5px;border-color:black;width:200px;height:40px;}
</style>
<body style="background-image:url(safari.jpg);background-repeat:no-repeat;background-size: cover;">
<table width="100%"style="height:40px;background-color:#99CC00;">
<tr>
<td width="10%">
<span style="color:white;text-shadow:4px 4px 8px green;font-size:25px;font-weight:bold;"><i>Ziara.</i></span></td>
<td width="35%">
<form method="post"action="search_action.php">
<input type="text"name="email"placeholder="search by email"style="width:250px;height:40px;border-radius:5px;border-color:black;">
<input type="submit"id="submit"value="search"></form></td>
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
<td width="50%"style="background-color:#FFFFCC;border-radius:5px;">
<?php
$event_id = $_GET['event_id'];
$qry_event = "SELECT * FROM events WHERE event_id = '$event_id'";
$retval = mysql_query($qry_event,$link);
if(!$retval)
{
  die('Error on 50:'.mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $event_id = $row['event_id'];
  $owner = $row['owner'];
  $event = $row['event'];
  $pnumber = $row['pnumber'];
  $email = $row['email'];
  $daye = $row['daye'];
  $monthe = $row['monthe'];
  $yeare = $row['yeare'];
  $location = $row['location'];
  $description = $row['description'];
  $country = $row['country'];
   echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:5px;width:200px;height:200px;background-color:white;" ><br>';
   echo"<form method='post'action='edit_event_pic.php'>
  <input type='hidden'name='event_id'value='$event_id'>
  <input type='submit'value='change'id='submit'></form><br>";
  echo"<span id='span'>Event By:</span><span style='font-size:20px;'>$owner</span><br>";
  echo"<span id='span'>Type Of Event:</span><span style='font-size:20px;'>$event</span><br>";
  echo"<span id='span'>Phone Number:</span><span style='font-size:20px;'>$pnumber</span><br>";
  echo"<span id='span'>Email:</span><span style='font-size:20px;'>$email</span><br>";
  echo"<span id='span'>Date:</span><span style='font-size:20px;'>$daye-$monthe-$yeare</span><br>";
  echo"<span id='span'>Location:</span><span style='font-size:20px;'>$location</span><br>";
  
  echo"<span id='span'>Description:</span><span style='font-size:20px;'>$description</span><br>";
  echo"<span id='span'>Country:</span><span style='font-size:20px;'>$country</span><br>";
  echo"<form method='post'action='edit_event.php'>
  <input type='hidden'name='event_id'value='$event_id'>
  <input type='submit'value='Edit'id='submit'></form><br>";
}
  

?></td><td width="25%"></td></tr></table></body></html>
