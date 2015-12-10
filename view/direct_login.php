<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/login.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<style>
body{background-color: #EEE;}
h2{font-size: 13px;}
</style>
</head>
<body>
<div id="para1"align="center">
<table cell-padding="5"cell-spacing="5" width="50%">
<tr>
<td cell-padding="5"cell-spacing="5" align="center">
<p1>
<h1>Ziara Login.</h1>
<?php
if(isset($_GET['msg']))
{
$message = $_GET['msg'];
if($message==1)
{
echo"<h2 id='callout_danger'>Your Email password combination is incorrect!</h2>";
}
if($message==2)
{
echo"<h2 id='callout_success'>Thank you for updating your profile.Please login below!</h2>";
}
}
?>
<form action="../controller/action/direct_login_action.php"method="post">
<input type="text"name="email"placeholder="Email Address"/>
<input type="password" name="password" placeholder="Password"/>
<input type="submit"value="Login">
</form></p1>
<br>
<a href="forgot_password.php">Forgot Password</a>
</td></tr></table></body></html>