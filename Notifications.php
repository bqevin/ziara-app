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
<td width="50%" style="background-color:white;">
<?php
$my_email = $_SESSION['email'];
$get_seen_nots = mysql_query("SELECT * FROM seen_nots WHERE status_owner='$my_email'");
if(!$get_seen_nots)
{
  die('Error:'.mysql_error());
}
$row = mysql_fetch_array($get_seen_nots);
if(mysql_num_rows($get_seen_nots)>0)
{
  $get_my_nots = "SELECT * FROM seen_nots WHERE status_owner='$my_email' AND commenter_email!='$my_email'";
  $retval = mysql_query($get_my_nots);
  if(!$retval)
  {
    die('Error on 49:'.mysql_error());
  }
  while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
  {
    $status_id = $row['status_id'];
	
	$commenter_email = $row['commenter_email'];
	$fname = $row['fname'];
	$lname = $row['lname'];
	$get_owner_emailz = "SELECT * FROM status WHERE status_id='$status_id'";
	 $retvalx = mysql_query($get_owner_emailz);
	 if(!$retvalx)
	 {
	   die('Error on 92:'.mysql_error());
	 }
	 while($row = mysql_fetch_array($retvalx,MYSQL_ASSOC))
	 {
	   $the_email = $row['email'];
	 }
	echo"<span><a href='view_profile.php?email=$commenter_email'style='font-size:15px;font-weight:bold;color:#33FF99;text-decoration:none;'>$fname $lname</a></span>";
	echo"&nbsp &nbsp<span>commented on your</span>";
	echo"&nbsp &nbsp<span><a href='comment.php?status_id=$status_id & owner_email=$the_email'style='font-size:15px;font-weight:bold;color:#33FF99;text-decoration:none;'>status</a></span><br>";
	 echo"<hr style='color:#6699FF'size='1'width='100%'>";
  }
}
$get_them_nots = mysql_query("SELECT * FROM see_nots2 WHERE email='$my_email'");
if(!$get_them_nots)
{
  die('Error on 66:'.mysql_error());
}
$row = mysql_fetch_array($get_them_nots);
if(mysql_num_rows($get_them_nots)>0)
{
   $a = "SELECT * FROM see_nots2 WHERE email='$my_email' AND commenters!='$my_email' GROUP BY commenters";
   $results = mysql_query($a);
   if(!$results)
   {
     die('Error on 75:'.mysql_error());
   }
   while($row = mysql_fetch_array($results,MYSQL_ASSOC))
   {
     $commenters = $row['commenters'];
	 $status_id = $row['status_id'];
	 $get_owner_email = "SELECT * FROM status WHERE status_id='$status_id'";
	 $retvalz = mysql_query($get_owner_email);
	 if(!$retvalz)
	 {
	   die('Error on 92:'.mysql_error());
	 }
	 while($row = mysql_fetch_array($retvalz,MYSQL_ASSOC))
	 {
	   $email = $row['email'];
	 }
	 $get_name = "SELECT * FROM info WHERE email = '$commenters' ";
	 $report = mysql_query($get_name);
	 if(!$report)
	 {
	   die('Error on 84:'.mysql_error());
	 }
	 while($row = mysql_fetch_array($report,MYSQL_ASSOC))
	 {
	    $fname = $row['fname'];
		$lname = $row['lname'];
		$the_email = $row['email'];
		echo"<span><a href='view_profile.php?email=$the_email'style='font-size:15px;font-weight:bold;color:#33FF99;text-decoration:none;'>$fname $lname</a></span>";
	    echo"&nbsp &nbsp<span>commented on a</span>";
	    echo"&nbsp &nbsp<span><a href='comment.php?status_id=$status_id & owner_email=$email'style='font-size:15px;font-weight:bold;color:#33FF99;text-decoration:none;'>status</a></span><br>";
		 echo"<hr style='color:#6699FF'size='1'width='100%'>";
	 }
	}
  }
  if(mysql_num_rows($get_seen_nots)==0 and mysql_num_rows($get_them_nots)==0)
  {
     echo"<p style='width:300px;height:35px;color:red;background-color:pink;text-align:center;border-radius:5px;'>No notifications.</p>";
  }
 ?></td>
 <td width="25%"></td></tr></table></body></html>
	  