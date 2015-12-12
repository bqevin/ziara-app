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
#span{font-size:20px;color:#00FF66;}
#input{width:400px;height:40px;border-color:black;border-radius:5px;}
.ScrollStyle{max-height:1000px;overflow-y:scroll;width:1px;}
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
<td width="50%" style='background-color:white;'>
<?php
$campaign_id = $_GET['campaign_id'];
$my_cnames = "SELECT * FROM campaigns WHERE campaign_id='$campaign_id'";
$retval = mysql_query($my_cnames,$link);
if(!$retval)
{
  die('Error on 49:'.mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $cname = $row['cname'];
  $subject = $row['subject'];
  $architect = $row['architect'];
  $email = $row['email'];
  $pnumber = $row['pnumber'];
  $website = $row['website'];
  $description = $row['description'];
  $campaign_id = $row['campaign_id'];
  echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:5px;width:200px;height:200px;background-color:white;" ><br>';
  
  echo"<span id='span'>Campaign Name:</span><span style='font-size:20px;'>$cname</span><br>";
  echo"<span id='span'>Architect:</span><span style='font-size:20px;'>$architect</span><br>";
  echo"<span id='span'>Subject:</span><span style='font-size:20px;'>$subject</span><br>";
  echo"<span id='span'>Email:</span><span style='font-size:20px;'>$email</span><br>";
  echo"<span id='span'>Phone Number:</span><span style='font-size:20px;'>$website</span><br>";
  echo"<span id='span'>Website:</span><span style='font-size:20px;'>$email</span><br>";
  echo"<span id='span'>Description:</span><span style='font-size:20px;'>$description</span><br>";
  
}
?>  
</td><td width="25%"></td></body></html>