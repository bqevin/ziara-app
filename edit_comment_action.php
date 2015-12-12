<?php
session_start();
include('travel_db_connect.php');
$status_id = $_POST['status_id'];
$status_owner = $_POST['status_owner'];
$comment = $_POST['comment'];
$comment_id = $_POST['comment_id'];
if(empty($comment))
{
  header("Location:edit_comment.php?msg=1 & comment_id=$comment_id");
}
else if(!empty($comment))
{
  $update = "UPDATE comments SET comment='$comment'WHERE id='$comment_id'";
  if(!mysql_query($update))
  {
    die('Error on 14:'.mysql_error());
  }
  else 
  {
    header("Location:comment.php?status_id=$status_id & owner_email=$status_owner");
  }
}
?>