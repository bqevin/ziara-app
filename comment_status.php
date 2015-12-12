<?php
session_start();
include('travel_db_connect.php');
$comment = $_POST['comment'];
$status_id = $_POST['status_id'];
$owner_email = $_POST['owner_email'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$commenter_email = $_SESSION['email'];
if(empty($comment))
{
  header("Location:comment.php?msg=1 & status_id=$status_id & owner_email=$owner_email");
}
else if(!empty($comment))
{
   $insert = "INSERT INTO comments(status_id,fname,lname,commenter_email,comment,status_owner)VALUES('$status_id','$fname','$lname','$commenter_email','$comment','$owner_email')";
   if(!mysql_query($insert))
   {
     die('Error on 16:'.mysql_error());
   }
   
   else
   {
    
    $my_email = $_SESSION['email'];
    $qry = "SELECT * FROM comments WHERE status_id='$status_id'AND commenter_email!='$my_email'GROUP BY commenter_email";
	$retval = mysql_query($qry,$link);
	if(!$retval)
	{
	  die('Error on 24:'.mysql_error());
	}
	while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
	{
	  $comment_id = $row['comment_id'];
	  $commenter_email = $row['commenter_email'];
	  $status_owner = $row['status_owner'];
	  $status_id = $row['status_id'];
	  $fname = $row['fname'];
	  $lname = $row['lname'];
	  $replace = "REPLACE INTO see_nots(status_id,commenters,email)VALUES('$status_id','$my_email','$commenter_email')";
	  if(!mysql_query($replace))
	  {
         die('Error on 38:'.mysql_error());
      }
	  else
	  {
	    header("Location:comment.php?status_id=$status_id & owner_email=$owner_email");
	  }
	}
	  header("Location:comment.php?status_id=$status_id & owner_email=$owner_email");
	}
	
}


?>
