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
if(isset($_GET['msg']))
{
  $message = $_GET['msg'];
  if($message==1)
  {
    echo"<span style='color:red;'>Please Select An Image!</span>";
  }
  if($message==2)
  {
    echo"<span style='color:red;'>Fields cannot be empty!</span>";
  }
  if($message==3)
  {
    echo"<span style='color:red;'>Event created successfully</span>";
  }
 }
 ?>
<form method="post"action="create_event.php" enctype="multipart/form-data">
<span id="span">Event By:</span><br><input type="text"id="input"placeholder="Event By" name="who"><br>
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
<br>
<span id="span">Contact Number:</span><br><input type="text"id="input"placeholder="Contact Number" name="pnumber"><br>
<span id="span">Email:</span><br><input type="text"id="input"placeholder="Email" name="email"><br>
<span id="span">Date of Event:</span><br>
<select name="daye"id="select">
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='7'>7</option>
<option value='8'>8</option>
<option value='9'>9</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option></select>
<select name="monthe"id="select">
<option value='January'>January</option>
<option value='February'>February</option>
<option value='March'>March</option>
<option value='April'>April</option>
<option value='May'>May</option>
<option value='June'>June</option>
<option value='July'>July</option>
<option value='August'>August</option>
<option value='September'>September</option>
<option value='October'>October</option>
<option value='November'>November</option>
<option value='December'>December</option></select>
<select name="yeare"id="select">
<option value='2015'>2015</option>
<option value='2016'>2016</option>
<option value='2017'>2017</option></select>
<span id="span">Location:</span><br><input type="text"id="input"placeholder="Location" name="location"><br>
<span id="span">Brief Description:</span><br><textarea rows="5"cols="50"style='border-color:black;border-radius:5px;'name="description"></textarea><br>
<span id="span">Photo/Logo:</span><br><input type="file"name="image"><br>
<input type="submit"value="create"id="submit">



</form>
</td>
<td width="25%"></td></tr></table></body></html>