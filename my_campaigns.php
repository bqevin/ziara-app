<?php
session_start();
include('travel_db_connect.php')
?>
<!DOCTYPE html>
<html>
<head>
<title> Ziara </title>
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
<td width="50%"style="background-color:white;">
<h1>Start A Campaign</h1>
<?php
if(isset($_GET['msg']))
{
   $message = $_GET['msg'];
   if($message==1)
   {
     echo"<span style='color:red;'>Fields cannot be empty!</span>";
   }
   if($message==2)
   {
     echo"<span style='color:red;'>Campaign created successfully!</span>";
   }
 }
 ?>
   
<form method="post"action="start_campaign.php" enctype="multipart/form-data">
<span id="span">Campaign Name:</span><br><input type="text"name="cname"placeholder="campaign name(start with #)"id="input"><br>
<span id="span">Subject:</span><br><select name="subject"id="input">
<option value="Antisemitism">Antisemitism</option>
<option value="Diseases">Disease(s)</option>
<option value="Antisemitism">Antisemitism</option>
<option value="Education">Education</option>
<option value="Government Oppression">Government Oppression</option>
<option value="Media Freedom">Media Freedom</option>
<option value="Terrorism">Terrorism</option>
<option value="Poverty">Poverty</option></select><br>
<span id="span">Started By:</span><br><input type="text"name="architect"placeholder="Started By"id="input"><br>
<span id="span">Email:</span><br><input type="text"name="email"placeholder="Email"id="input"><br>
<span id="span">Phone Number:</span><br><input type="text"name="pnumber"placeholder="Phone Number"id="input"><br>
<span id="span">Website:</span><br><input type="text"name="website"placeholder="website"id="input"><br>
<span id="span">Brief Description:</span><br><textarea name="description"rows="5"cols="50"placeholder="description" style="border-color:black;border-radius:5px;"></textarea><br>
<input type="file"name="image" id="input"><br>
<input type="submit"id="submit"value="create" name="submit"></form>
<hr style='color:#6699FF'size='5'width='100%'>
<h1 style='font-size:20px;'>Your Campaigns</h1>
<?php
$admin = $_SESSION['email'];
$qry_my_campaigns = "SELECT * FROM campaigns WHERE admin='$admin'";
$retval = mysql_query($qry_my_campaigns,$link);
if(!$retval)
{
  die('Error on 79:'.mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $cname = $row['cname'];
  $campaign_id = $row['campaign_id'];
  echo"<a href='campaign_status.php?campaign_id=$campaign_id&cname=$cname'style='color:66FF99;font-size:20px;font-weight:bold;text-decoration:none;'>$cname</a>";
  echo"&nbsp &nbsp &nbsp &nbsp<a href='see_campaign.php?campaign_id=$campaign_id'style='color:lime;text-decoration:none;font-weight:bold;font-size:20px;'>Edit($cname)</a>";
  echo"<hr style='color:#6699FF'size='1'width='100%'>";
}
?></td><td width="25%"></td></tr></table></body></html>
