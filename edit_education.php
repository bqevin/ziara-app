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
#span{font-size:20px;color:#00FF66;}
#span1{font-size:20px;color:blue;}
#input{width:400px;height:40px;border-color:black;border-radius:5px;}
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
$education_id = $_POST['education_id'];
$qry = "SELECT * FROM education WHERE education_id='$education_id'";
$results = mysql_query($qry,$link);
if(!$results)
{
  die('Error on 94:'.mysql_error());
}
while($row = mysql_fetch_array($results,MYSQL_ASSOC))
{
  $fname = $row['fname'];
  $education_id = $row['education_id'];
  $type = $row['type'];
  $pnumber = $row['pnumber'];
  $email = $row['email'];
  $website = $row['website'];
  $location = $row['location'];
  $description = $row['description'];
  echo"<form method='post'action='edit_education_action.php'>
  <span id='span'>Name Of Centre:</span><br><input type='text'name='fname'value='$fname'id='input'><br>
  <span id='span'>Type Of Education:</span><br><select name='type'id='input'>
<option value='University'>University</option>
<option value='College'>College</option>
<option value='High School'>High School</option>
<option value='Persons With Disability'>Persons With Disability</option>
<option value='Polytechnic'>Polytechnic</option>
<option value='Grade School'>Grade School</option>
<option value='Religious School'>Religious Schools</option>

</select><br>
<span id='span'>Phone Number:</span><br><input type='text' id='input'value='$pnumber'name='pnumber'><br>
<span id='span'>Email:</span><br><input type='text' id='input'value='$email'name='email'><br>
<span id='span'>Website:</span><br><input type='text' id='input' value='$website'name='website'><br>
<span id='span'>Location:</span><br><input type='text' id='input' value='$location'name='location'><br>
<span id='span'>Brief Description:</span><br><textarea rows='5'cols='50'name='description' style='border-color:black;border-radius:5px;'>$description</textarea><br>
<input type='hidden'name='education_id'value='$education_id'>
<input type='submit'value='Edit'id='submit'>

</form>";
}
?>
</td>
<td width="25%"></td></tr></table></body></html>
