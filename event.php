<?php
session_start();
include('travel_db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<style>
p,p2{background-color:white;opacity:0.9;color:blue;}
</style>
</head>
<body style="background-image:url(sarah.jpg);background-repeat:repeat;"link="green"alink="lightgreen"vlink="darkgreen"/>
<div id="para"align="middle">
<?php
$email = $_SESSION['email'];
$getimage = "SELECT * FROM info WHERE email = '$email'";
$result = mysql_query($getimage,$link);
?>
<div id="para"align="middle">

<table bgcolor="yellow"width="45%">
<tr>
<th>
<?php
while($row=mysql_fetch_array($result))
{
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
}
?></th><td>

<a href="country.php">Home</a>
<a href="Profile.php">Profile</a>
<a href="Posts.php">Posts</a>
<a href="Messages.php">Messages</a>
<a href="Friends.php">Friends</a>
<a href="Notifications.php">Notifications</a>
<a href="Campaigns.php">Campaigns</a>
</td></tr></table>
<table bgcolor="silver"width="45%">
<tr>
<td align="center">
<p><i>If you want to create an event in <?php echo $_SESSION['country'];?> register your event to help foreignors and residents have
an easy time getting to know about it.Please be clear and precise as possible.Honesty will help you build a good track record and rapport with people seeking to attend your
event.<br><font color="orange">If you don't have a website for your centre and you would require a professional website please contact us
and we will build you a dynamic and proffessional website that suits your business.</font></i></p>
<h1><font color="red"><i>Please fill in the details below.</i></font></h1>
<?php
if(isset($_GET['msg']))
{
$message = $_GET['msg'];
if($message==1)
{
 echo"<span style='color:brown;background-color:white;'>You have successfully registered your event.</span>";
}
}
?>
<p1>
<form method="post"action="event_action.php"enctype="multipart/form-data">
<font color="green">Event By:</font><br><input type="text"name="owner"placeholder="Event"><br>
<font color="green">Type Of Event:</font><br>
<select name="event">
<option value="Business">Business</option>
<option value="Charity">Charity</option>
<option value="Education">Education</option>
<option value="musical">Musical</option>
<option value="special school">Party</option>
<option value="polytechnic">Political</option>
<option value="religious school">Protest Event</option></select><br>
<font color="green">Contact Number:</font><br><input type="text"name="number"placeholder="contact number"><br>
<font color="green">Email:</font><br><input type="text"name="email"placeholder="email..."><br>
<font color="green">Website:</font><br><input type="text"name="website"placeholder="website"><br>
<font color="green">Brief description:</font><br><textarea rows="5"cols="40"name="description"placeholder="brief description..."></textarea><br>
<font color="green">Photo/Logo:<br><input type="file"name="image"><br>
<input type="submit"name="sumit"value="submit"></form></p1></td></tr></table>
<hr color="red"width="100%"size="04">
<table bgcolor="silver"width="45%">
<tr>
<td align="center"width="45%">
<h2><font color="red"><i>Take a look at the education centers below</i></font></h2>
<p2></i>If you are visitor in <?php echo $_SESSION['country'];?> you can check for the available education centers below you would wish to see below.</i></p2>
<p3>
<form method="post"action="event_choose_session.php">
<font color="green">Select Service:</font>
<select name="service">
<option value="university">University</option>
<option value="college">College</option>
<option value="high school">High School</option>
<option value="special school">Persons With Disability</option>
<option value="polytechnic">Polytechnic</option>
<option value="religious school">Religious school</option></select><br>
<input type="submit"value="View"></form></p3>

</body></html>
