<?php
session_start();
$service = $_POST['service'];
$_SESSION['education']=$service;
header("Location:education_choose.php");
?>
