<?php
session_start();
$friend_email = $_POST['email'];
$_SESSION['buddy_email']=$friend_email;
header("Location:../../view/view_buddy_profile.php");
?>