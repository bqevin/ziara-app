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
<p>If you are a resident of <?php echo $_SESSION['country'];?> and you are looking foward to employ someone.Register your job here to help foreignors and residents have
an easy time getting jobs.Please be clear and precise as possible.Honesty will help you build a good track record and rapport with people seeking your
a job from you.<br><font color="orange">If you don't have a website for your business and you would require a professional website please contact us
and we will build you a dynamic and proffessional website that suits your business.</font></p>
<h1><font color="red">Please fill in the details below.</font></h1>
<?php
if(isset($_GET['msg']))
{
$message = $_GET['msg'];
if($message==1)
{
 echo"<span style='color:red;background-color:green;'>You have successfully registered your job vacancy.</span>";
}
if($message==2)
{
 echo"<span style='color:red;background-color:green;'>Please fill in all the fields!</span>";
}
}
?>
<p1>
<form method="post"action="jobs_action.php"enctype="multipart/form-data">
<font color="green">Name Of Employer:</font><br><input type="text"name="employer"placeholder="Name Of Employer..."style="border-radius:8px;width:300px;"><br>
<font color="green">Type Of Job:</font><br>
<select name="job"style="border-radius:8px;width:300px;">
<option value="aviation">Aviation</option>
<option value="medical">Medical</option>
<option value="media">Media</option>
<option value="casual">Casual Labourer</option>
<option value="computing">Computing And Information Sciences</option>
<option value="finance">Insurance,Banking,etc</option>
<option value="engineering">Engineering</option>
<option value="hospitality">Hotel And Hospitality</option>
<option value="modelling">Modelling</option>
<option value="musician">Musician</option>
<option value="investigator">Private Investigator</option>
<option value="rental">Rental Houses</option>
<option value="research">Research</option>
<option value="teaching">Teaching</option>
<option value="travel">Tourism And Travel Agency</option>
<option value="law">Law and Justice</option>
<option value="sales">Sales and Marketing</option>
<option value="security">Security</option>
<option value="beauty">Beauty and Therapy</option>
<option value="religion">Religious"</option>
<option value="others">Others</option></select><br>
<font color="green">Contact Number:</font><br><input type="text"name="number"placeholder="contact number"style="border-radius:8px;width:300px;"><br>
<font color="green">Email:</font><br><input type="text"name="email"placeholder="email..."style="border-radius:8px;width:300px;"><br>
<font color="green">Website:</font><br><input type="text"name="website"placeholder="website"style="border-radius:8px;width:300px;"><br>
<font color="green">Location:</font><br><input type="text"name="location"placeholder="location"style="border-radius:8px;width:300px;"><br>
<font color="green">Brief description:</font><br><textarea rows="5"cols="40"name="description"placeholder="brief description..."style="border-radius:8px;"maxlength="700"></textarea><br>
<font color="green">Photo/Logo:<br><input type="file"name="image"><br>
<input type="submit"name="sumit"value="submit"style="background-color:cyan;color:red;border-radius:8px;"></form></p1></td></tr></table></div>
<hr color="red"width="100%"size="04">
<div id="view"align="center">
<table bgcolor="silver"style="width:750px;">
<tr>
<td align="left">
<h2><font color="red">Take a look at the services below</font></h2>
<p2></i>If you are visitor in <?php echo $_SESSION['country'];?> or an interested in a job you can look for job categories you are interested in below.</i></p2>
<p3>
<form method="post"action="jobs_choose_session.php">
<select name="job"style="border-radius:8px;width:300px;">
<option value="aviation">Aviation</option>
<option value="medical">Medical </option>
<option value="media">Media</option>
<option value="casual">Casual Labourer</option>
<option value="computing">Computing And Information Sciences</option>
<option value="finance">Insurance,Banking,etc</option>
<option value="engineering">Engineering</option>
<option value="hospitality">Hotel And Hospitality</option>
<option value="modelling">Modelling</option>
<option value="musician">Musician</option>
<option value="investigator">Private Investigator</option>
<option value="rental">Rental Houses</option>
<option value="research">Research</option>
<option value="teaching">Teaching</option>
<option value="travel">Tourism And Travel Agency</option>
<option value="law">Law and Justice</option>
<option value="sales">Sales and Marketing</option>
<option value="security">Security</option>
<option value="beauty">Beauty and Therapy</option>
<option value="religion">Religious"</option>
<option value="others">Others</option></select><br>
<input type="submit"value="view"style="background-color:cyan;color:red;border-radius:8px;"/><br></div>
</body></html>
