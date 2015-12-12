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
<form method="post"action="<?php echo $_SERVER['PHP_SELF'];?>">
<span id="span">Type Of Event:</span><br><select name="event"id="input">
<option value='Activism'>Activism</option>
<option value='Business'>Business</option>
<option value='Education'>Education</option>
<option value='Hackathon'>Hackathon</option>
<option value='Modelling'>Modelling</option>
<option value='Musical'>Musical</option>
<option value='Party'>Party</option>
<option value='Political'>Political</option>
<option value='Religious'>Religious</option>
</select>
<input type="submit"value="search"id="submit">
<?php
if(isset($_POST['event']))
{
  $event = $_POST['event'];
  $country = $_SESSION['country'];
  $qry_events = "SELECT * FROM events WHERE event='$event'AND country='$country'";
  $retval = mysql_query($qry_events,$link);
  if(!$retval)
  {
    die('Error on 66:'.mysql_error());
  }
  while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
  {
    $owner = $row['owner'];
	$event = $row['event'];
	$event_id = $row['event_id'];
	echo"<hr style='color:#6699FF'size='3'width='100%'>";
	echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:5px;width:200px;height:200px;background-color:white;" ><br>';
	echo"<span id='span'>Event Owners:</span><span style='font-size:20px;'>$owner</span><br>";
	echo"<span id='span'>Event Type:</span><span style='font-size:20px;'>$event</span><br>";
	echo"<a href='see_event_you.php?event_id=$event_id'style='color:lime;font-size:20px;text-decoration:none;'>VIEW DETAILS</a>";
  }
 }
 ?>
</td>
<td width="25%"></td></tr></table></body></html>