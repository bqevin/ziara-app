<?php
session_start();
$admin_land_id = $_POST['land_id'];
$_SESSION['admin_land_id'] = $admin_land_id;
header("Location:view_admin_land.php");
?>