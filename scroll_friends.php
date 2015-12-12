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
#submit{background-color:#33FF99;color:white;border-radius:5px;width:200px;height:40px;}
#submit:hover{background-color:white;}
#link{color:#6699FF;font-size:20px;text-decoration:none;font-weight:normal;}
#span{font-size:20px;color:#00FF66;}
.ScrollStyle{max-height:500px;overflow-y:scroll;width:1px;}
</style>
<body style="background-image:url(safari.jpg);background-repeat:no-repeat;background-size: cover;">
<table width="100%"style="height:40px;background-color:#99CC00;">
<tr>
<td width="10%">
<span style="color:white;text-shadow:4px 4px 8px green;font-size:25px;font-weight:bold;"><i>Ziara.</i></span></td>
<td width="35%">
<form method="post"action="search_action.php">
<input type="text"name="email"placeholder="search by email"style="width:250px;height:40px;border-radius:5px;border-color:black;">
<input type="submit"value="search" style="width:100px;height:40px;color:white;background-color:#33FF99;border-radius:5px;"></form></td>
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
<td width="50%"style="background-color:white;"class ="ScrollStyle">
<?php
$my_email = $_SESSION['email'];
$country = $_SESSION['country'];
$qry_citizens = "SELECT * FROM info WHERE country='$country' and email!='$my_email'";
$retval = mysql_query($qry_citizens,$link);
if(!$retval)
{
  die('Error on 47:'.mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $fname = $row['fname'];
  $lname = $row['lname'];
  $email = $row['email'];
  $pnumber = $row['pnumber'];
  $gender = $row['gender'];
  echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:5px;width:80px;height:80px;background-color:white;" ><br>';
  echo"<span id='span'>Name:</span><span style='font-size:20px;'>$fname $lname</span><br>";
  echo"<span id='span'>Email:</span><span style='font-size:20px;'>$email</span><br>";
  echo"<span id='span'>Phone Number:</span><span style='font-size:20px;'>$pnumber</span><br>";
  echo"<span id='span'>Gender:</span><span style='font-size:20px;'>$gender</span><br>";
  $qry_request1 = mysql_query("SELECT * FROM friend_requests WHERE host_friend='$my_email' AND guest_friend='$email'");
  if(!$qry_request1)
  {
    die('Error 0n 66:'.mysql_error());
  }
  $row = mysql_fetch_array($qry_request1);
  if(mysql_num_rows($qry_request1)>0)
  {
    echo"&nbsp<img src='add_user.png'style='width:20px;height:20px;'><a href='accept_friend_request.php?guest_friend=$email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>Accept</a>";
	echo"&nbsp &nbsp<img src='user.png'style='width:20px;height:20px;'><a href='cancel_friend_request.php?guest_friend=$email'style='color:#6699FF;font-size:20px;font-weight:bold;text-decoration:none;'>Decline</a>";
  }
  else if(mysql_num_rows($qry_request1)==0)
  {
     $qry_request2 = mysql_query("SELECT * FROM friend_requests WHERE host_friend='$email' AND guest_friend='$my_email'");
	 if(!$qry_request2)
	 {
	    die('Error on 79:'.mysql_error());
	 }
	 $row = mysql_fetch_array($qry_request2);
	 if(mysql_num_rows($qry_request2)>0)
	 {
	    echo"<form method='post'action='cancel_request.php'>
		<input type='hidden'name='host_friend'value='$email'>
		 <input type='submit'value='cancel friend request'id='submit'></form>";
	 }
	 else if(mysql_num_rows($qry_request2)==0)
	 {
	     
	    $qry_friendship = mysql_query("SELECT * FROM friendship WHERE host_friend='$my_email' AND guest_friend='$email'");
		if(!$qry_friendship)
		{
		  die('Error on 97:'.mysql_error());
		}
		$row = mysql_fetch_array($qry_friendship);
		if(mysql_num_rows($qry_friendship)>0)
		{
		   echo"<form method='post'action='send_message.php'>
		   <input type='hidden'name='receiver_email'value='$email'>
		   <input type='submit'value='Message'id='submit'></form>";
		}
		else if(mysql_num_rows($qry_friendship)==0)
		{
		   
		 $qry_friendship1 = mysql_query("SELECT * FROM friendship WHERE host_friend='$email' AND guest_friend='$my_email'");
		if(!$qry_friendship1)
		{
		  die('Error on 97:'.mysql_error());
		}
		$row = mysql_fetch_array($qry_friendship1);
		if(mysql_num_rows($qry_friendship1)>0)
		{
		   echo"<form method='post'action='send_message.php'>
		   <input type='hidden'name='receiver_email'value='$email'>
		   <input type='submit'value='Message'id='submit'></form>";
		}
		else if(mysql_num_rows($qry_friendship1)==0)
		{
		   echo"<form method='post'action='send_friend_request.php'>
		   <input type='hidden'name='host_friend'value='$email'>
		   <input type='submit'value='+Add Friend'id='submit'></form>";
		}
		}
	}
	}
	
	
		  
  echo"<hr style='color:#6699FF'size='1'width='100%'>";
}

?></td><td width="25%"></td></tr></table></body></html>