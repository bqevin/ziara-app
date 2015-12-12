<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/login.css">
<style>
body{background-color: #EEE;}
</style>
<script type="text/javascript">
	var forgotPass = function(){
		var e = _("email").value;
		if (e == "") {
			_("status").innerHTML = "Type your email address please";
		}else{
			_("submit").style.display = "none";
			_("status").innerHTML = "Please wait...";
			var ajax = ajaxObj("POST","forgot_password_action.php");
			ajax.onreadystatechange = function(){
				if (ajaxReturn(ajax) == true) {
					var response = ajax.responseText;
					if (response == "success") {
						_("status").innerHTML = "Pasword Reset Successful!";
					}else if (response == "no_exist") {
						_("status").innerHTML = "Sorry the Email address doesn't exist in our systems. Please <a href='../index.php'>Create account here </a>";
					}else if (response == "email_send_failed") {
						_("status").innerHTML = "Sorry the Email could't be sent to your account";
					}else{
							_("status").innerHTML = "An unknown error occured. Please try again later";
					
					}
				}
			}
			ajax.send("e="+e)
		}
	};
</script>
</head>
<body>
<div id="para1"align="center">
<table style="border-radius:8px;"cell-padding="5"cell-spacing="5" width="50%">
<tr>
<td cell-padding="5"cell-spacing="5" align="center">
<p1>
<h1>Ziara | Forgot Password</h1>
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
<form action="../controller/action/forgot_password_action.php"method="post">
<input type="text"name="email"placeholder="Enter your email"/>
<input type="submit" value="Reset Password">
</form></p1></td></tr></table></body></html>