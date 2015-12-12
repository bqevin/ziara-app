<?php
session_start();
$service = $_POST['service'];
$_SESSION['service'] = $service;
header("Location:../../view/services_choose.php");
?>