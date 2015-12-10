<?php
session_start();
$job = $_POST['job'];
$_SESSION['job'] = $job;
header("Location:jobs_choose.php");
?>