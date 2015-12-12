<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<style>
#submit{background-color:#33FF99;width:100px;height:25px;border-radius:5px;color:white;}
#submit:hover{background-color:white;}
</style>
<body style="background-image:url(safari.jpg);background-repeat:no-repeat;background-size: cover;">
<table width="100%">
<tr>
<td width="25%"></td>
<td width="50%" style="background-color:#FFFFCC;border-radius:5px;opacity:0.9;">
<h1 style="font-size:20px;">Photo Upload</h1>
<form name="photo_upload"method="post"action="photo_upload_action.php"enctype="multipart/form-data"/>
<input type="file"name="image"/><br><br>
<input type="submit"name="sumit"value="Upload" id="submit"></form></td><td width="25%"></td></tr></table></body></html>