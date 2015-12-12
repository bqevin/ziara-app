<?php
session_start();
$type = $_POST['type'];
$_SESSION['type'] = $type;
header("Location:../../view/import_export_choose.php");
?>