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
<td width="50%"style="background-color:#FFFFCC;">
<?php
$campaign_id = $_POST['campaign_id'];
$qry_cname = "SELECT * FROM campaigns WHERE campaign_id='$campaign_id'";
$results = mysql_query($qry_cname,$link);
if(!$results)
{
  die('Error on 47:'.mysql_error());
}
while($row = mysql_fetch_array($results,MYSQL_ASSOC))
{
  $cname = $row['cname'];
  $subject = $row['subject'];
  $architect = $row['architect'];
  $email = $row['email'];
  $pnumber = $row['pnumber'];
  $website = $row['website'];
  $description = $row['description'];
  echo"
  <form method='post'action='edit_campaign_action.php'>
  <span id='span'>Campaign Name:</span><br><input id='input'value='$cname'name='cname'><br>
  <span id='span'>Architect:</span><br><input id='input'value='$architect'name='architect'><br>
  <span id='span'>Subject:</span><br><select name='subject'id='input'><br>
  <option value='Antisemitism'>Antisemitism</option>
  <option value='Diseases'>Disease(s)</option>
  <option value='Antisemitism'>Antisemitism</option>
  <option value='Education'>Education</option>
  <option value='Government Oppression'>Government Oppression</option>
  <option value='Media Freedom'>Media Freedom</option>
 <option value='Terrorism'>Terrorism</option>
 <option value='Poverty'>Poverty</option></select><br>
  <span id='span'>Email:</span><br><input id='input'value='$email'name=email><br>
  <span id='span'>Phone Number:</span><br><input id='input'value='$pnumber'name='pnumber'><br>
  <span id='span'>Website:</span><br><input id='input'value='$website'name='website'><br>
  <span id='span'>Description:</span><br><textarea name='description'rows='5'cols='50'style='border-color:black;border-radius:5px;'>$description</textarea><br>
  <input type='hidden'name='campaign_id'value='$campaign_id'>
  <input type='submit'id='submit' value='edit'></form>";
  
}
?></td><td width="25%"></td></tr></table></body></html>