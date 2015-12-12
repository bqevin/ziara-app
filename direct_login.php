<<?php
?>
<!DOCTYPE html>
<html>
<head>
<title> Ziara</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<style>
#submit{background-color:#33FF99;color:white;border-radius:5px;width:400px;height:40px;}
#submit:hover{background-color:white;}
</style>
</head>
<body style="background-image:url(safari.jpg);background-repeat:no-repeat;background-size: cover;">
<table width="100%">
<tr>
<td width="25%"></td>
<td width="50%" style="background-color:#FFFFCC;border-radius:5px;opacity:0.9;">
<h1 style="font-size:20px;">Ziara Login</h1>
<?php
if(isset($_GET['msg']))
{
$message = $_GET['msg'];
if($message==1)
echo"<span style='color:red;'>You have successfully registered please login below.</span>";
if($message==2)
echo"<span style='color:red;'>Your email and password combination is wrong.</span>";
}
 ?>
<form method="post"action="direct_login_action.php">
<span style="font-size:20px;color:#00FF66;">Email:</span><br>
<input type="text"name="email"placeholder="Email"style="width:400px;height:40px;border-radius:5px;border-color:black;"><br>
<span style="font-size:20px;color:#00FF66;">Password:</span><br>
<input type="password"name="password"placeholder="Password"style="width:400px;height:40px;border-radius:5px;border-color:black;"><br>
<input type="submit"value="Login" id="submit"></form></td><td width="25%"></td></tr></table></body></html>
