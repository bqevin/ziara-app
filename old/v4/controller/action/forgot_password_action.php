<?php
error_reporting(0);
session_start();
include('../../config/travel_db_connect.php');
$email = mysql_real_escape_string($_POST['email']);
$login = mysql_query("SELECT * FROM info WHERE email='$email'");
$row = mysql_fetch_array($login);
if(mysql_num_rows($login)>0)
{
  function randStrgen($len){
	$result = "";
	$chars = "abcdefghijklmnopqrstuvwxyz0123456789!$%&?+";
	$charArray = str_split($chars);
	for ($i=0; $i < $len; $i++) { 
	$randItem = array_rand($charArray);
	$result .= "".$charArray[$randItem];
	}
	return $result;
 }
  $hashTempPass = randStrgen(8);
  $conn = mysqli_connect("localhost","root","","travel");
  $sql = "UPDATE info SET password='$hashTempPass' WHERE email='$email' LIMIT 1";
  $query = mysqli_query($conn, $sql);
  $to=$row['email'];
  $subject='Password Reset';
  $message='
	  <h2>Hello '.$row['fname'].',</h2>
	  <p style="font-size:16px;">This is an automated message from www.yourziara.com. 
	  <p style="font-size:16px;">You indicated that you forgot your login password. <p>
	  We generated a temporary password for you to log in with, then once logged in you can change your password to anything you like.</p>
	  <p style="font-size:16px;">Your NEW password to login will be:<h3><b>'.$hashTempPass.'</b></h3></p>'; 
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From:help@yourziara.com';
  $m=mail($to,$subject,$message,$headers);
	  if ($m) {
	  	header("Location:../../views/direct_login.php");
	  }else{
	  	echo "Could not send mail. Please try again later";
	  }
}
else
{
  header("Location:../../views/forgot_password.php");
}
?>
