<?php
session_start();
$country = $_POST['country'];
$_SESSION['country'] = $country;
header("Location:../../view/indexxx.php");
?>