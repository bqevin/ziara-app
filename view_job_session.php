<?php
session_start();
$job_id = $_POST['jobs_id'];
$_SESSION['job_id'] = $job_id;
header("Location:view_job.php");
?>