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
<td width="50%"style="background-color:white;">
<a href='create_service.php'style='color:66FF99;font-size:20px;font-weight:bold;text-decoration:none;'>Post A  Service</a>
<hr style='color:#6699FF'size='3'width='100%'>
<form method='post'action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name='type'id='input'>
<option value='Airline Services'>Airline Services</option>
<option value='Security Services'>Security Services</option>
<option value='Health Services'>Health Services</option>
<option value='Banking Services'>Banking Services</option>
<option value='Insurance Services'>Insurance Services</option>
<option value='Car Hire'>Car Hire</option>
<option value='Hotel Services'>Hotel Services</option>
<option value='Rental Houses'>Rental Houses</option>
<option value='Tourism and Travel Agency'>Tourism and Travel Agency</option>
<option value='Law Firm'>Law Firm</option>
<option value='Shopping Mall'>Shopping Mall</option>
<option value='Recreational Parks'>Recreational Parks</option>
<option value='Game Park/Game Reserve'>Game Park/Game Reserve</option>
<option value='Beauty and Therapy'>Beauty and Therapy</option>
<option value='Camp(s)'>Camp(s)</option>
<option value='Religious Centre'>Religious Centre</option>
</select>
<input type="submit" id="submit"value="search">
</form>
<hr style='color:#6699FF'size='3'width='100%'>
<?php
if(isset($_POST['type']))
{
  $type = $_POST['type'];
  $country = $_SESSION['country'];
  $qry_type = "SELECT * FROM service WHERE type='$type' AND country='$country'";
  $retval = mysql_query($qry_type,$link);
  if(!$retval)
  {
    die('Error on 73:'.mysql_error());
  }
  while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
  {
     $fname = $row['fname'];
  $service_id = $row['service_id'];
  $type = $row['type'];
  echo'<img src="data:image;base64,'.$row['photo'].'" style="border-radius:5px;width:200px;height:200px;background-color:white;" ><br>';
  echo"<span id='span1'>Name Of Business:</span><span style='font-size:20px;'>$fname</span><br>";
  echo"<span id='span1'>Type Of Business:</span><span style='font-size:20px;'>$type</span><br>";
  echo"<a href='look_service.php?service_id=$service_id'style='color:lime;font-size:20px;text-decoration:none;'>VIEW DETAILS</a>";
  echo"<hr style='color:#6699FF'size='1'width='100%'>";
}
}
?>

</td><td width="25%"></td></body></html>