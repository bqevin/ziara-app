<?php
session_start();
$land_id = $_POST['land_id'];
$_SESSION['land_id'] = $land_id;
header("Location:../../view/view_land.php");
?>