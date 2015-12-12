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
if(isset($_GET['msg']))
{
   $message = $_GET['msg'];
   if($message==1)
   {
     echo"<span style='color:red;'>Plese Select An Image!</span>";
   }
   if($message==2)
   {
     echo"<span style='color:red;'>Only the website field can be left empty!</span>";
   }
   if($message==3)
   {
     echo"<span style='color:red;'>Job created successfully!</span>";
   }
 }
 ?>
<form method="post"action="create_job_action.php" enctype="multipart/form-data">
<span id='span'>Name Of Company:</span><br><input type='text'id='input'name='fname' placeholder='Name Of Company'><br>
<span id='span'>Type Of Job:</span><br><select name='type'id='input'>
<option value='Aviation'>Aviation</option>
<option value='Medical'>Medical</option>
<option value='Media'>Media</option>
<option value='Casual Labourer'>Casual Labourer</option>
<option value='Computing and Information Sciences'>Computing and Information Sciences</option>
<option value='Insurance/Banking'>Insurance/Banking</option>
<option value='Engineering'>Engineering</option>
<option value='Hotel and Hospitality'>Hotel and Hospitality</option>
<option value='Modelling'>Modelling</option>
<option value='Private Investigator'>Private Investigator</option>
<option value='Researcher'>Researcher</option>
<option value='Teaching'>Teaching</option>
<option value='Tourism and Travel'>Tourism and Travel</option>
<option value='Law and Jupiter'>Law and Jupiter</option>
<option value='Sales and Marketing'>Sales and Marketing</option>
<option value='Beauty and Therapy'>Beauty and Therapy</option></select><br>
<span id='span'>Contact Number:</span><br><input type='text'id='input'name='pnumber' placeholder='Contact Number'><br>
<span id='span'>Email:</span><br><input type='text'id='input'name='email' placeholder='Email'><br>
<span id='span'>Website:</span><br><input type='text'id='input'name='website' placeholder='Website'><br>
<span id='span'>Location:</span><br><input type='text'id='input'name='location' placeholder='Location'><br>
<span id='span'>Brief Description:</span><br><textarea name='description' rows='5'cols='50'placeholder='brief description'style='border-radius:5px;border-color:black;'></textarea><br>
<input type="file"name="image">
<input type="submit"id="submit"value="create" name="submit">
</form>
<hr style='color:#6699FF'size='3'width='100%'>
<?php
$email = $_SESSION['email'];
$qry = "SELECT * FROM jobs WHERE admin_email='$email'";
$results = mysql_query($qry,$link);
if(!$results)
{
  die('Error on 94:'.mysql_error());
}
while($row = mysql_fetch_array($results,MYSQL_ASSOC))
{
  $fname = $row['fname'];
  $job_id = $row['job_id'];
  $type = $row['type'];
  echo'<img src="data:image;base64,'.$row['photo'].'" style="border-radius:5px;width:200px;height:200px;background-color:white;" ><br>';
  echo"<span id='span'>Name Of Business:</span><span style='font-size:20px;'>$fname</span><br>";
  echo"<span id='span'>Type Of Job:</span><span style='font-size:20px;'>$type</span><br>";
  echo"<a href='see_job.php?job_id=$job_id'style='color:lime;font-size:20px;text-decoration:none;'>VIEW DETAILS</a>";
  echo"<hr style='color:#6699FF'size='1'width='100%'>";
}
?>

</td><td width='25%'></td></tr></table></body></html>
