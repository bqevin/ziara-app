<?php
session_start();
$admin_education_id = $_POST['education_id'];
$_SESSION['admin_education_id'] = $admin_education_id;
header("Location:../../view/view_admin_education.php");
?>