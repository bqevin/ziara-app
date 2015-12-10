<?php
session_start();
$status_id = $_GET['status_id'];
$_SESSION['main_status_id']=$status_id;
header("Location:../../view/comment_status.php");
?>