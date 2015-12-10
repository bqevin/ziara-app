<?php
session_start();
$service_id = $_POST['service_id'];
$_SESSION['service_id'] = $service_id;
header("Location:view_service.php");
?>
