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
$campaign_id = $_GET['campaign_id'];
$get_cname = mysql_query("SELECT * FROM campaigns WHERE campaign_id='$campaign_id'");
if(!$get_cname)
{
  die('Error on 47:'.mysql_error());
}
$row = mysql_fetch_array($get_cname);
if(mysql_num_rows($get_cname)>0)
{
   $cname = $row['cname'];
}

$country = $_SESSION['country'];
if(isset($_GET['msg']))
{
  $message = $_GET['msg'];
  if($message==1)
  {
    echo"<span style='color:red;'>Please select an image!</span>";
  }
  if($message == 2)
  {
    echo"<span style='color:red;'>Please upload a photo!</span>";
  }
 }
 ?>
<form method="post"action="photo_campaign_action.php"enctype="multipart/form-data">
<span id="span">Status:</span><br>
<textarea rows="5"cols="40" style="border-radius:5px;border-color:black;"name="status"></textarea><br>
<input type="hidden"name="cname"value="<?php echo $cname;?>">
<input type="hidden"name="campaign_id"value="<?php echo $campaign_id;?>">
<input type="file"name="image"/>
<input type="submit"name="submit"id="submit"value="upload"></form>
</td><td width="25%"></td></body></html>