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
#td:hover{background-color:white;}
.ScrollStyle{max-height:1000px;overflow-y:scroll;width:1px;}
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
<td width="10%" id="td">
<span><a href="country.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="home.png" style="width:20px;height:20px;">Home</a></span>
</td>
<td width="5%"></td>
<td width="10%" id="td">
<?php
$my_email = $_SESSION['email'];
$qry_friends = mysql_query("SELECT * FROM friendship WHERE host_friend='$my_email'");
if(!$qry_friends)
{
  die('Error on 33:'.mysql_error());
}
$row = mysql_fetch_array($qry_friends);
$number_of_friends = mysql_num_rows($qry_friends);
$qry_requests = mysql_query("SELECT * FROM friend_requests WHERE host_friend='$my_email'");
if(!$qry_requests)
{
  die('Error on 33:'.mysql_error());
}
$row = mysql_fetch_array($qry_requests);
if(mysql_num_rows($qry_requests)>0)
{
$friend_requests = mysql_num_rows($qry_requests);
$boolean = $friend_requests - $number_of_friends;
echo"<span><a href='see_requests.php'style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src='friends.png' style='width:20px;height:20px;'>Friends($boolean)</a></span>";
}
else if(mysql_num_rows($qry_requests)==0)
{
echo"<span><a href='scroll_friends.php'style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src='friends.png' style='width:20px;height:20px;'>Friends</a></span>";
}
?>
</td>
<td width="5%"></td>
<td width="10%"id="td">
<span><a href="my_campaigns.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="microphone.png" style="width:20px;height:20px;">Campaigns</a></span>
</td>
<td width="5%"></td>
<td width="10%" id="td">
<span><a href="my_events.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="calendar.png" style="width:20px;height:20px;">Events</a></span>
</td></tr></table>
<div style="float:left;background-color:#66CC99;width:35%;">
<?php
$email = $_SESSION['email'];
$query_ppic = mysql_query("SELECT * FROM info WHERE email = '$email'");
if(!$query_ppic)
{
  die('Error on 16:'.mysql_error());
}
$row = mysql_fetch_array($query_ppic);
if(mysql_num_rows($query_ppic)==0)
{
   echo"<span><img src='avatar.jpg'style='width:150px;height:150px;border-radius:5px;border-color:white;border-width:5px;'></span><span style='color:#33FFCC;font-size:20px;font-weight:bold;'>($fname $lname) </span><br>";//if profile pic does not exist we display an avatar
}
else if(mysql_num_rows($query_ppic)>0)
{
  echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:5px;width:150px;height:150px;background-color:white;" ><br>';//if profile pic exists we display users profile pic
}
?>
<script>
function display_c()
{
   var refresh = 1000;
   mytime = setTimeout('display_ct()',refresh);
}
function display_ct()
{
  var strcount;
  var x = new Date();
  
  var x1 =  x.getHours() + ":" + x.getMinutes() + ":" + x.getSeconds();
  document.getElementById('ct').style.fontcolor='white';
  document.getElementById('ct').innerHTML = x1;
  tt = display_c();
}
</script>
</head>
<body onload=display_ct();>
<span id='ct' style='color:#33FFCC;font-size:25px;font-weight:bold;'></span>
<p><a href="country.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="home.png" style="width:20px;height:20px;">Home</a></p>
<p><a href="Profile.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="man.png" style="width:20px;height:20px;">Profile</a></p>
<?php
$my_email = $_SESSION['email'];
$get_them_nots = mysql_query("SELECT * FROM seen_nots WHERE status_owner='$my_email'AND commenter_email!='$my_email'");
if(!$get_them_nots)
{
  die('Error on 108:'.mysql_error());
}
$row = mysql_fetch_array($get_them_nots);
$c = mysql_num_rows($get_them_nots);
$get_them_nots1 = mysql_query("SELECT * FROM comments WHERE status_owner='$my_email'AND commenter_email!='$my_email'");
if(!$get_them_nots1)
{
  die('Error on 115:'.mysql_error());
}
$row = mysql_fetch_array($get_them_nots1);
$d = mysql_num_rows($get_them_nots1);
$b = $d - $c;
if($b==0)
{
echo"<p><a href='posts.php'style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src='educa.png' style='width:20px;height:20px;'>Posts</a></p>";
}
else if($b>0)
{
 echo"<p><a href='view_nots.php'style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src='educa.png' style='width:20px;height:20px;'>Posts($b)</a></p>";
}
?>
<?php
$my_email = $_SESSION['email'];
$get_seen_accepted = mysql_query("SELECT * FROM seen_friendship WHERE guest_friend='$my_email'");
if(!$get_seen_accepted)
{
  die('Error on 109:'.mysql_error());
}
$row = mysql_fetch_array($get_seen_accepted);
$num_of_seen_accepted = mysql_num_rows($get_seen_accepted);
$get_friendship = mysql_query("SELECT * FROM friendship WHERE guest_friend='$my_email'");
if(!$get_friendship)
{
  die('Error on 116:'.mysql_error());
}
$row = mysql_fetch_array($get_friendship);
$num_friendship = mysql_num_rows($get_friendship);
$friendship = $num_friendship - $num_of_seen_accepted;
if($friendship==0)
{
echo"<p><a href='Friends.php'style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src='friends.png' style='width:20px;height:20px;'>Friends</a></p>";
}
else if($friendship > 0)
{
  echo"<p><a href='see_accepted_requests.php'style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src='friends.png' style='width:20px;height:20px;'>Friends($friendship)</a></p>";
}
?>
<?php
$my_email = $_SESSION['email'];
$get_seen_messages = mysql_query("SELECT * FROM seen_messages WHERE receiver_email='$my_email'");
if(!$get_seen_messages)
{
  die('Error on 135:'.mysql_error());
}
$row = mysql_fetch_array($get_seen_messages);
$num_of_seen_messages = mysql_num_rows($get_seen_messages);
$get_messages = mysql_query("SELECT * FROM messages WHERE receiver_email='$my_email'");
if(!$get_messages)
{
  die('Error on 135:'.mysql_error());
}
$row = mysql_fetch_array($get_messages);
$num_of_messages = mysql_num_rows($get_messages);
$messagia = $num_of_messages - $num_of_seen_messages;
if($messagia==0)
{
echo"<p><a href='messages.php'style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src='message.png' style='width:20px;height:20px;'>Messages</a></p>";
}
else if($messagia>0)
{
  echo"<p><a href='see_messages.php'style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src='message.png' style='width:20px;height:20px;'>Messages($messagia)</a></p>";
}
?>
<?php
$my_email = $_SESSION['email'];
$qry_nots = mysql_query("SELECT * FROM see_nots WHERE email='$my_email'");
if(!$qry_nots)
{
  die('Error on 161:'.mysql_error());
}
$number_of_bings = mysql_num_rows($qry_nots);
if($number_of_bings>0)
{
 echo"<p><a href='seen_notifications.php'style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src='bulb.png' style='width:20px;height:20px;'>Notifications($number_of_bings)</a></p>";
}
else if($number_of_bings==0)
{
echo"<p><a href='notifications.php'style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src='bulb.png' style='width:20px;height:20px;'>Notifications</a></p>";
}
?>
<h1 style='color:#33FFCC;font-size:25px;font-weight:bold;'>Ziara</h1>
<p><a href="#"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="settings.png" style="width:20px;height:20px;">Settings</a></p>
<p><a href="log_out.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="power.png" style="width:20px;height:20px;">Log Out</a></p>
<h2 style='color:#33FFCC;font-size:25px;font-weight:bold;'>Admin Panel</h2>
<p><a href="campaigns.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="microphone.png" style="width:20px;height:20px;">Campaigns</a></p>
<p><a href="events.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="calendar.png" style="width:20px;height:20px;">Events</a></p>
<p><a href="service.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="service.png" style="width:20px;height:20px;">Service Providers</a></p>
<p><a href="education.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="degree.png" style="width:20px;height:20px;">Scholarships</a></p>
<p><a href="jobs.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="job.png" style="width:20px;height:20px;">Jobs</a></p>
</div>
<div style="float:left;width:65%;background-color:white;"class ="ScrollStyle">
<?php
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
<form method="post"action="status_action.php">
<span style="font-size:20px;color:#00FF66;">Status</span><br>
<textarea rows="5"cols="50" placeholder="post status"style="border-radius:5px;boder-color:black;" name="status"></textarea>
<input type="submit"value="status" id="submit">
</form>
<span><img src="camera.png"style="height:21px;width:25px;"></span><span><a href="photo_status.php"id="link">Photo</a></span>
&nbsp &nbsp <span><img src="video.png"style="height:25px;width:25px;"></span><span><a href="#"id="link">Video</a></span>
<hr style='color:#6699FF'size='1'width="100%">
<?php
$country = $_SESSION['country'];
$campaign = "false";
$qry_status = "SELECT * FROM status WHERE country='$country'AND campaign='$campaign'ORDER BY status_id DESC";
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
  if(empty($row['image']))
  {
  echo"<span><a href='view_profile.php?email=$the_email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>$fname $lname</a></span><br>";
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
echo"<span><a href='view_profile.php?email=$the_email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>$fname $lname</a></span><br>";
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
</div></body></html>