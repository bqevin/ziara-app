<?php
?>
<!DOCTYPE html>
<html>
<head>
<style>
</style>
</head>
<body >
<div id="para1"align="center">
<table style="border-radius:8px;"cell-padding="5"cell-spacing="5" bgcolor="white" width="30%">
<tr>
<td cell-padding="5"cell-spacing="5" align="center">
<p1>
<h1><font size="05"color="lime">Ziara Login.</font></h1>
<?php
if(isset($_GET['msg']))
{
$message = $_GET['msg'];
if($message==1)
echo"<span style='color:red;background-color:white;opacity:0.8;'>You have successfully registered please login below.</span>";
if($message==2)
echo"<span style='color:red;background-color:white;opacity:0.8;'>Your email and password combination is wrong.</span>";
}
 

 ?>
<form action="../controller/action/login_action.php"method="post">
<font color="orange">Email:</font><br><input type="text"name="email"placeholder="Email..."style="border-radius:8px;width:200px;"/><br>
<font color="orange">Password:</font><br><input type="password"name="password"placeholder="Password..."style="border-radius:8px;width:200px;"/><br><br>
<input type="submit"value="Login"style="background-color:cyan;width:200px;height:25px;border-radius:8px;color:red;"/></td></tr></table>
</form></p1></td></tr></table></body></html>