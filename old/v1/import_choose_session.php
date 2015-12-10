<?php
session_start();
$type = $_POST['type'];
$_SESSION['type'] = $type;
header("Location:import_export_choose.php");
?>