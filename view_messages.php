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
<td width="40%">

<?php
$sender_email = $_GET['sender_email'];
$my_email = $_SESSION['email'];
$qry = "SELECT * FROM messages WHERE receiver_email='$my_email'AND sender_email='$sender_email' ORDER BY message_id ASC";
$retval = mysql_query($qry,$link);
if(!$retval)
{
  die('Error on 48:'.mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $fname = $row['fname'];
  $lname = $row['lname'];
  $message = $row['message'];
  echo"<p style='background-color:white;border-radius:5px;'><span style='color:#6699FF;font-size:20px;font-weight:bold;'>$fname $lname</span><br>
  <span style='font-size:20px;'>$message</span></p>";
}
?>
<td width="20%"></td>
<td width="40%">

<?php
$sender_email = $_GET['sender_email'];
$my_email = $_SESSION['email'];
$query = "SELECT * FROM messages WHERE receiver_email='$sender_email'AND sender_email='$my_email' ORDER BY message_id ASC";
$reports = mysql_query($query,$link);
if(!$reports)
{
  die('Error on 48:'.mysql_error());
}
while($row = mysql_fetch_array($reports,MYSQL_ASSOC))
{
  $fname = $row['fname'];
  $lname = $row['lname'];
  $message = $row['message'];
  echo"<p style='background-color:white;border-radius:5px;'><span style='color:#6699FF;font-size:20px;font-weight:bold;'>$fname $lname</span><br>
  <span style='font-size:20px;'>$message</span></p>";
}
?>
</td></tr></table>
<table width="100%">
<tr>
<td width="30%"></td>
<td width="40%">
<?php
if(isset($_GET['msg']))
{
  $message = $_GET['msg'];
  if($message==1)
  {
    echo"<p style='color:red;font-size:20px;'>Reply cannot be empty</p>";
   }
 }
 ?>
<form method='post'action='reply_message.php'>
<textarea name="message"rows="5"cols="50"style="border-radius:5px;border-color:black;"></textarea>
<input type="hidden"name="receiver_email"value="<?php echo $sender_email;?>">
<input type="submit"id="submit"value="reply"></form>
</td>
<td width="30%"></td>
</tr></table></body></html>
  
