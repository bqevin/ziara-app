<?php
session_start();
$service = $_POST['service'];
$_SESSION['education']=$service;
header("Location:../../view/education_choose.php");
?>
