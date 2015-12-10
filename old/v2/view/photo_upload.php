<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
</style>
<body style="background-image:url(shading.png);background-repeat:repeat;"link="red"alink="lightgreen"vlink="darkgreen"/>
<div id="para1"align="center">
<table cellspacing="5"cellpadding="5"style="border-radius:8px;"bgcolor="white">
<tr>
<td align="center">
<p1>
<?php
if(isset($_GET['msg']))
{
$message=$_GET['msg'];
if($message==3)
echo"<span style='color:red;background-color:white;opacity:0.7;'> Welcome please upload your profile picture</span>";
if($message==2)
echo"<span style='color:red;background-color:white;opacity:0.7;'>There was a problem uploading your profile picture</span>";
}
?>

<form name="photo_upload"method="post"action="../controller/action/photo_upload_action.php"enctype="multipart/form-data"/>
<input type="file"name="image"/><br><br>
<input type="submit"name="sumit"value="Upload"style="background-color:cyan;width:100px;height:25px;border-radius:8px;color:red;"/>
</p1></form></body></html>

