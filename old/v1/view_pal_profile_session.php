<?php
session_start();
$your_email = $_POST['email'];
$_SESSION['pal_email'] = $your_email;
header("Location:view_pal_profile.php");
?>