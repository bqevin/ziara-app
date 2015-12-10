<?php
session_start();
$service = $_POST['service'];
$_SESSION['service'] = $service;
header("Location:services_choose.php");
?>