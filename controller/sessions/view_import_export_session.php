<?php
session_start();
$import_export_id = $_POST['import_export_id'];
$_SESSION['import_export_id'] =$import_export_id ;
header("Location:../../view/view_import_export.php");
?>
