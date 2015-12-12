<?php
session_start();
$photo_id = $_GET['photo_status_id'];
$_SESSION['photo_status_id']=$photo_id;
header("Location:../../view/comment_photo.php");
?>