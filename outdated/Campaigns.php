<?php
session_start();
include('../config/database/travel_db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<style>
p,p2{background-color:white;opacity:0.9;color:blue;}
</style>
</head>
<body>
<div id="para"align="middle">
<?php
$email = $_SESSION['email'];
$getimage = "SELECT * FROM info WHERE email = '$email'";
$result = mysql_query($getimage,$link);
?>
<div id="para"align="middle">

<table bgcolor="dark-yellow"width="45%">
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
<a href="your_campaigns.php">Campaigns</a>
<a href="your_events.php">Events</a>
</td></tr></table>
<table bgcolor="silver"width="45%">
<tr>
<td align="center">

<h1><font color="red">Start A Campaign To Address Some Issue.</font></h1>
<p>This is a corner where you can address any issue you want.Create a campaign to address any issue.Some campaigns.It is recommended for those who have 
visited <?php echo $_SESSION['country'];?> or are residents because these are the people who may understand the nature of what they are addressing in detail.</p>
<?php
if(isset($_GET['msg']))
{
$message = $_GET['msg'];
if($message==1)
{
 echo"<span style='color:red;background-color:green;'>You have successfully registered your campaign.</span>";
}
if($message==2)
{
 echo"<span style='color:red;background-color:green;'>Please fill in all the fields!</span>";
}
}
?>
<p1>
<form method="post"action="campaigns_processing.php"enctype="multipart/form-data">
<font color="green">Code Name:</font><br><input type="text"name="codee"placeholder="code"style="border-radius:8px;width:200px;"><br>
<font color="green">Subject:</font><br>
<select name="title"style="border-radius:8px;width:200px;">
<option value="Antisemitism">Antisemitism</option>
<option value="Disease">Disease(s)</option>
<option value="Education">Education</option>
<option value="Government Oppression">Government Opression</option>
<option value="Media Freedom">Media Freedom</option>
<option value="Poverty">Poverty</option></select><br>
<font color="green">By:</font><br><input type="text"name="bye"placeholder="By"style="border-radius:8px;width:200px;"><br>
<font color="green">Email:</font><br><input type="text"name="email"placeholder="email"style="border-radius:8px;width:200px;"><br>
<font color="green">Number:</font><br><input type="text"name="number"placeholder="number"style="border-radius:8px;width:200px;"><br>
<font color="green">Website:</font><br><input type="text"name="website"placeholder="website"style="border-radius:8px;width:200px;"><br>
<font color="green">Brief Description:</font><br><textarea rows="5"cols="40"name="description"placeholder="brief description..."style="border-radius:8px;"maxlength="1500"></textarea><br>
<font color="green">Photo/Logo:<br><input type="file"name="image"><br>
<input type="submit"name="sumit"value="submit"style="background-color:cyan;color:red;border-radius:8px;"></form></p1></td></tr></table>
<hr color="red"width="100%"size="04">
<table bgcolor="silver"width="45%">
<tr>
<td align="center"width="45%">
<h2><font color="red">Take a look at the campaigns available</font></h2>

<p3>
<form method="post"action="../controller/sessions/campaigns_sessions.php"enctype="multipart/form-data">

<font color="green">Subject:</font><br>
<select name="title">
<option value="Antisemitism">Antisemitism</option>
<option value="Disease">Disease(s)</option>
<option value="Education">Education</option>
<option value="Government Oppression">Government Opression</option>
<option value="Media Freedom">Media Freedom</option>
<option value="Poverty">Poverty</option></select><br>
<input type="submit"name="sumit"value="View"style="background-color:cyan;color:red;border-radius:8px;"></form></p3></td></tr></table>
<hr color="red"width="100%"size="04">

</body></html>
