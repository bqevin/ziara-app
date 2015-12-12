<?php
session_start();
$admin_service_id = $_POST['service_id'];
$_SESSION['admin_service_id'] = $admin_service_id;
header("Location:../../view/view_admin_service.php");
?>