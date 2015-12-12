<?php
include('travel_db_connect.php');
$email = $_GET['email'];
$code = $_GET['code'];
$qry = mysql_query("SELECT * FROM info WHERE email='$email'");
if(!$qry)
{
  die('Error on 5:'.mysql_error());
}
$row = mysql_fetch_array($qry);
if(mysql_num_rows($qry)>0)
{
  $db_confirm_code = $row['confirm_code'];
  if($code == $db_confirm_code)
  {
    $update = "UPDATE info SET confirmed = '1',confirm_code='0'WHERE email = '$email'";
    if(!mysql_query($update))
	{
	  die('Error on 13:'.mysql_error());
	}
	else
	{
	  header("Location:login.php");
	}

	
  }
  else
  {
    echo"<span style='color:red;font-size:20px;'>There was an error,your email link may have expired please contact us</span>";
  }
}
?>
     