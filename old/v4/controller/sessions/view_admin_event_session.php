<?php
session_start();
$admin_event_id = $_POST['event_id'];
$_SESSION['admin_event_id'] = $admin_event_id;
header("Location:../events/view_admin_event.php");
?>