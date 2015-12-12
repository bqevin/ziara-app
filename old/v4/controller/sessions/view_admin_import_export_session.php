<?php
session_start();
$admin_import_export_id = $_POST['import_export_id'];
$_SESSION['admin_import_export_id'] = $admin_import_export_id;
header("Location:../../view/view_admin_import_export.php");
?>