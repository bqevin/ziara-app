<?php
session_start();
$education_id = $_POST['education_id'];
$_SESSION['education_id'] = $education_id;
header("Location:../../view/view_education.php");
?>
