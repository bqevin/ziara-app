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
#link{color:#6699FF;font-size:20px;text-decoration:none;font-weight:normal;}
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
<td width="50%"style="background-color:#FFFFCC;border-radius:5px;">
<?php
$campaign_id = $_GET['campaign_id'];
$cname = $_GET['cname'];
if(isset($_GET['msg']))
{
  $message = $_GET['msg'];
  if($message==1)
  {
     echo"<span style='color:red;'>Status cannot be empty.</span>";
  }
  if($message==2)
  {
    echo"<span style='color:red;'>Status updated successfully.</span>";
  }
 }
?>
<?php
$get_cname = mysql_query("SELECT * FROM campaigns WHERE campaign_id='$campaign_id'");
if(!$get_cname)
{
  die('Error on 63:'.mysql_error());
}
$row = mysql_fetch_array($get_cname);
if(mysql_num_rows($get_cname)>0)
{
  $cname = $row['cname'];
}
?>
<form method="post"action="status_campaign_action.php">
<span style="font-size:20px;color:#00FF66;">Status</span><br>
<input type="hidden"value="<?php echo $campaign_id;?>" name="campaign_id">
<input type="hidden"value="<?php echo $cname;?>" name="cname">
<textarea rows="5"cols="50" placeholder="post status"style="border-radius:5px;boder-color:black;" name="status"></textarea>
<input type="submit"value="status" id="submit">
</form>
<?php
$campaign_id = $_GET['campaign_id'];
$cname = $_GET['cname'];
?>
<span><img src="camera.png"style="height:21px;width:25px;"></span><span><a href="photo_status_campaign.php?campaign_id=<?php echo $campaign_id;?>" id="link">Photo</a></span>
<hr style='color:#6699FF'size='1'width="100%">
<?php
$campaign_id = $_GET['campaign_id'];
$country = $_SESSION['country'];
$qry_status = "SELECT * FROM status WHERE country='$country'AND campaign_id='$campaign_id' ORDER BY status_id DESC";
$retval = mysql_query($qry_status);
if(!$retval)
{
  die('Error on 117:'.mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $the_email = $row['email'];
  $fname = $row['fname'];
  $lname = $row['lname'];
  $status = $row['status'];
  $email = $_SESSION['email'];
  $status_id = $row['status_id'];
  $cname = $row['cname'];
  if(empty($row['image']))
  {
  echo"<span><a href='view_campaign_profile.php?email=$the_email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>$cname</a></span><br>";
  echo"<span style='font-size:15px;'>$status</span><br>";
 $qry_likes = mysql_query("SELECT * FROM likes WHERE status_id='$status_id'");
  if(!$qry_likes)
  {
    die('Error on 133:'.mysql_error());
  }
  $row = mysql_fetch_array($qry_likes);
  $num_likes = mysql_num_rows($qry_likes);
  echo"&nbsp<a href='see_likers.php?status_id=$status_id'style='color:#6699FF;text-decoration:none;'>$num_likes</a>";
  $qry_my_likes = mysql_query("SELECT * FROM likes WHERE liker_email = '$email' AND status_id='$status_id'");
  if(!$qry_my_likes)
  {
    die('Error on 142:'.mysql_error());
  }
  $row = mysql_fetch_array($qry_my_likes);
  if(mysql_num_rows($qry_my_likes)==0)
  {
    echo"&nbsp <a href='like.php?status_id=$status_id'style='text-decoration:none;'><img src='like.png'style='width:15px;height:15px;'></a>";
  }
  else if(mysql_num_rows($qry_my_likes)>0)
  {
    echo"&nbsp <a href='unlike.php?status_id=$status_id'style='text-decoration:none;'><img src='unlike.png'style='width:15px;height:15px;'></a>";
  }
  $qry_comments = mysql_query("SELECT * FROM comments WHERE status_id='$status_id'");
  if(!$qry_comments)
  {
    die('Error on 156:'.mysql_error());
  }
  $row = mysql_fetch_array($qry_comments);
  $number_of_comments = mysql_num_rows($qry_comments);
  echo"&nbsp &nbsp &nbsp<span style='color:#6699FF;'>$number_of_comments</span>";
  echo"&nbsp<a href='comment.php?status_id=$status_id &owner_email=$the_email' style='text-decoration:none;'><img src='comments.png'style='width:15px;height:15px;'>";
  if($the_email==$email)
  {
    echo"&nbsp &nbsp &nbsp<a href='edit_status.php?status_id=$status_id' style='text-decoration:none;'><img src='edit.png'style='width:15px;height:15px;'>";
	echo"&nbsp &nbsp &nbsp<a href='delete_status.php?status_id=$status_id' style='text-decoration:none;'><img src='trash.png'style='width:15px;height:15px;'>";
  }
  echo"<hr style='color:#6699FF'size='1'width='100%'>";
}
else if(!empty($row['image']))
{
echo"<span><a href='view_campaign_profile.php?email=$the_email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>$cname</a></span><br>";
  echo"<span style='font-size:15px;'>$status</span><br>";
  echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:5px;width:300px;height:300px;background-color:white;" ><br>';
  $qry_likes = mysql_query("SELECT * FROM likes WHERE status_id='$status_id'");
  if(!$qry_likes)
  {
    die('Error on 133:'.mysql_error());
  }
  $row = mysql_fetch_array($qry_likes);
  $num_likes = mysql_num_rows($qry_likes);
  echo"&nbsp<a href='see_likers.php?status_id=$status_id'style='color:#6699FF;text-decoration:none;'>$num_likes</a>";
  $qry_my_likes = mysql_query("SELECT * FROM likes WHERE status_id='$status_id' AND liker_email='$email'");
  if(!$qry_my_likes)
  {
    die('Error on 142:'.mysql_error());
  }
  $row = mysql_fetch_array($qry_my_likes);
  if(mysql_num_rows($qry_my_likes)==0)
  {
    echo"&nbsp <a href='like.php?status_id=$status_id'style='text-decoration:none;'><img src='like1.png'style='width:15px;height:15px;'></a>";
  }
  else if(mysql_num_rows($qry_my_likes)>0)
  {
    echo"&nbsp <a href='unlike.php?status_id=$status_id'style='text-decoration:none;'><img src='unlike.png'style='width:15px;height:15px;'></a>";
  }
  $qry_comments = mysql_query("SELECT * FROM comments WHERE status_id='$status_id'");
  if(!$qry_comments)
  {
    die('Error on 156:'.mysql_error());
  }
  $row = mysql_fetch_array($qry_comments);
  $number_of_comments = mysql_num_rows($qry_comments);
  echo"&nbsp &nbsp &nbsp<span style='color:#6699FF;'>$number_of_comments</span>";
  echo"&nbsp<a href='comment.php?status_id=$status_id & owner_email=$the_email' style='text-decoration:none;'><img src='comments.png'style='width:15px;height:15px;'>";
  if($the_email==$email)
  {
    echo"&nbsp &nbsp &nbsp<a href='edit_status.php?status_id=$status_id' style='text-decoration:none;'><img src='edit.png'style='width:15px;height:15px;'>";
	echo"&nbsp &nbsp &nbsp<a href='delete_status.php?status_id=$status_id' style='text-decoration:none;'><img src='trash.png'style='width:15px;height:15px;'>";
  }
  echo"<hr style='color:#6699FF'size='1'width='100%'>";
}
}
?>
</td><td width="25%"></td></tr></table></body></html>