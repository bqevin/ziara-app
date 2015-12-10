<?php
session_start();
$job = $_POST['job'];
$_SESSION['job'] = $job;
header("Location:../../view/jobs_choose.php");
?>