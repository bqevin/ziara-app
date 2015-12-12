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
$status_id = $_GET['status_id'];
$owner_email = $_GET['owner_email'];
$qry_status = "SELECT * FROM status WHERE status_id='$status_id'";
$retval = mysql_query($qry_status,$link);
if(!$retval)
{
  die('Error on 48:'.mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $fname = $row['fname'];
  $lname = $row['lname'];
  $the_email = $row['email'];
  $status = $row['status'];
  if(empty($row['image']))
  {
  echo"<span><a href='view_profile?email=$the_email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>$fname $lname</a></span><br>";
  echo"<span style='font-size:15px;'>$status</span><br>";
  }
  else if(!empty($row['image']))
  {
    echo"<span><a href='view_profile?email=$the_email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>$fname $lname</a></span><br>";
    echo"<span style='font-size:15px;'>$status</span><br>";
	echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:5px;width:300px;height:300px;background-color:white;" ><br>';
  }
  echo"<hr style='color:#6699FF'size='1'width='100%'>";
}
?></td><td width="25%"></td></tr></table>
<table width="100%">
<tr>
<td width="25%"></td>
<td width="50%"style="background-color:#FFFFCC;border-radius:5px;">
<form method="post"action="comment_status.php">
<textarea rows="5"cols="40" name="comment"style="border-color:black;border-radius:5px;"></textarea>
<input type="hidden"name="owner_email"value="<?php echo $owner_email;?>">
<input type="hidden"name="status_id"value="<?php echo $status_id;?>">
<input type="submit"id="submit"value="comment"></form>
<hr style='color:#6699FF'size='1'width='100%'>
<?php
if(isset($_GET['msg']))
{
  $message = $_GET['msg'];
  if($message==1)
  {
    echo"<span style='color:red;'>comment cannot be empty</span>";
  }
}
$get_comments = "SELECT * FROM comments WHERE status_id='$status_id' ORDER BY comment_id DESC";
$results = mysql_query($get_comments,$link);
if(!$results)
{
  die('Error on 85:'.mysql_error());
}
while($row = mysql_fetch_array($results,MYSQL_ASSOC))
{
  $fname = $row['fname'];
  $lname = $row['lname'];
  $the_email = $row['commenter_email'];
  $comment = $row['comment'];
  $email = $_SESSION['email'];
  $comment_id = $row['comment_id'];
  echo"<span><a href='view_profile?email=$the_email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>$fname $lname</a></span><br>";
  echo"<span style='font-size:15px;'>$comment</span><br>";
  if($the_email==$email)
  {
    echo"&nbsp &nbsp &nbsp<a href='edit_comment.php?comment_id=$comment_id' style='text-decoration:none;'><img src='edit.png'style='width:15px;height:15px;'>";
	echo"&nbsp &nbsp &nbsp<a href='delete_comment.php?comment_id=$comment_id & owner_email=$owner_email & status_id= $status_id' style='text-decoration:none;'><img src='trash.png'style='width:15px;height:15px;'>";
  }
echo"<hr style='color:#6699FF'size='1'width='100%'>";
}
?>
</td>
<td width="25%"></td></tr></table>
</body></html>