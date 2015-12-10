<?php
session_start();
$admin_job_id = $_POST['jobs_id'];
$_SESSION['admin_job_id'] = $admin_job_id;
header("Location:../../view/view_admin_job.php");
?>