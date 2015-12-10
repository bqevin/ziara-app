<?php
session_start();
include('../config/database/travel_db_connect.php');
$status_id = $_POST['status_id'];

$commenter_email = $_SESSION['email'];
$qry = "SELECT * FROM info WHERE email='$commenter_email'";
$retval = mysql_query($qry,$link);
while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
{
  $fname = $row['fname'];
  $lname = $row['lname'];
}
$status = $_POST['status'];
$status_owner = $_POST['status_owner'];
$insert = "INSERT INTO comments(status_id,fname,lname,commenter_email,status,status_owner)VALUES('$status_id','$fname','$lname','$commenter_email','$status','$status_owner')";
if(!mysql_query($insert))
{
 die('Error:'.mysql_error());
}
else
{
header("Location:comment_photo.php");
}
?>