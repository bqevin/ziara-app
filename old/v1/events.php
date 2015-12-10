<?php
session_start();
include('travel_db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<title> Ziara</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<style>
p,p2{background-color:white;opacity:0.9;color:blue;}
</style>
</head>
<body style="background-image:url(car.jpg);background-repeat:repeat;"link="lime"alink="lime"vlink="lime"/>
<div id="para"align="center">
<?php
$email = $_SESSION['email'];
$getimage = "SELECT * FROM info WHERE email = '$email'";
$result = mysql_query($getimage,$link);
?>
<div id="para"align="center">

<table bgcolor="dark-yellow"style="width:750px;">
<tr>
<td style="width:30px;">
<?php
while($row=mysql_fetch_array($result))
{
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
}
?></td>

<td style="width:80px;"><a href="country.php">Home</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Profile.php">Profile</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Posts.php">Posts</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Messages.php">Messages</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Friends.php">Friends</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="Notifications.php">Notifications</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="your_campaigns.php">Campaigns</a></td><td style="width:10px;"></td>
<td style="width:80px;"><a href="your_events.php">Events</a><td style="width:10px;">

</td></tr></table>
<table bgcolor="silver"style="width:750px;">
<tr>
<td align="left">
<p>If you want to create an event in <?php echo $_SESSION['country'];?> register your event to help foreignors and residents have
an easy time getting to know about it.Please be clear and precise as possible.Honesty will help you build a good track record and rapport with people seeking to attend your
event.<br><font color="orange">If you don't have a website for your centre and you would require a professional website please contact us
and we will build you a dynamic and proffessional website that suits you.</font></p>
<h1><font color="red">Please fill in the details below.</font></h1>
<?php
if(isset($_GET['msg']))
{
$message = $_GET['msg'];
if($message==1)
{
 echo"<span style='color:red;background-color:green;'>You have successfully registered your event.</span>";
}
if($message==2)
{
 echo"<span style='color:red;background-color:green;'>Please fill in all the fields!</span>";
}
}
?>
<p1>
<form method="post"action="event_action.php"enctype="multipart/form-data">
<font color="green">Event By:</font><br><input type="text"name="owner"placeholder="Event"style="border-radius:8px;width:300px;"><br>
<font color="green">Type Of Event:</font><br>
<select name="event"style="border-radius:8px;width:300px;">
<option value="Business">Business</option>
<option value="Charity">Charity</option>
<option value="Education">Education</option>
<option value="Modelling">Modelling</option>
<option value="Musical">Musical</option>
<option value="Special school">Party</option>
<option value="Political">Political</option>
<option value="Protest">Protest Event</option>
<option value="Religious">Religious Event</option></select><br>
<font color="green">Contact Number:</font><br><input type="text"name="number"placeholder="contact number"style="border-radius:8px;width:300px;"><br>
<font color="green">Email:</font><br><input type="text"name="email"placeholder="email..."style="border-radius:8px;width:300px;"><br>
<font color="green">Website:</font><br><input type="text"name="website"placeholder="website"style="border-radius:8px;width:300px;"><br>
<font color="green">Date Of Event:</font><br><select name="daye"style="border-radius:8px;width:300px;">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option></select>
<select name="monthe"style="border-radius:8px;width:300px;">
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option></select>
<select name="yeare"style="border-radius:8px;width:300px;">
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option></select><br>
<font color="green">Location Of Event:</font><br><input type="text"name="location"placeholder="Location"style="border-radius:8px;width:300px;"><br>
<font color="green">Brief description:</font><br><textarea rows="5"cols="40"name="description"placeholder="brief description..."maxlength="1500"style="border-radius:8px;"></textarea><br>
<font color="green">Photo/Logo:<br><input type="file"name="image"><br>
<input type="submit"name="sumit"value="submit"style="background-color:cyan;color:red;border-radius:8px;"></form></p1></td></tr></table></div>
<hr color="red"width="100%"size="04">
<div id="view"align="center">
<table bgcolor="silver"style="width:750px;">
<tr>
<td align="left"width="70%">
<h2><font color="red"><i>Take a look at the events available below</i></font></h2>
<p2></i>If you are visitor in <?php echo $_SESSION['country'];?> you can check for the available events below you would wish to see below.</i></p2>
<p3>
<form method="post"action="event_choose_session.php">
<font color="green">Type Of Event:</font><br>
<select name="event"style="border-radius:8px;width:300px;">
<option value="Business">Business</option>
<option value="Charity">Charity</option>
<option value="Education">Education</option>
<option value="Modelling">Modelling</option>
<option value="Musical">Musical</option>
<option value="Special school">Party</option>
<option value="Political">Political</option>
<option value="Protest">Protest Event</option>
<option value="Religious">Religious Event</option></select><br>
<input type="submit"value="View"style="background-color:cyan;color:red;border-radius:8px;"></form></div>

</body></html>
