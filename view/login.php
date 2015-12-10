<?php
?>
<!DOCTYPE html>
<html>
	<head><title>Welcome to Ziara :: Home</title>
	<!--Meta Links-->
	<meta name="author" content="Ziara" /> 
	<meta name="distribution" content="global" />
	<meta name="robots" content="follow, all" />
	<meta property="og:title" content="Ziara " />
	<meta property="og:url" content="http://www.yourziara.com/" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta name="description" content="We help you discover places you have never before through people who have visited those places or people who live there via photo-sharing and writing" />
	<meta name="keywords" content="Open Access, Investing, virtual travel, connecting the world,we are one" />
	<meta name="application-name" content="Ziara Web App " />
	<!--End-->
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.ico">

	<!--Start MDL-->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	<link href="../css/styles.css" rel="stylesheet">
    <link href="../css/roboto.min.css" rel="stylesheet">
    <link href="../css/material.min.css" rel="stylesheet">
    <link href="../css/ripples.min.css" rel="stylesheet">
    <!--End MDL-->

	<script type="text/javascript" src="js/"></script>
<!-- 	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/landing.css"> -->
<style>
body{
	background: url("../img/html_bg2.jpg");
	background-size: cover;
	background-repeat: no-repeat;}

</style>
<script type="text/javascript">

</script>
</head>

<body>
	<!-- <div class="clearfix"></div> -->
<p>&nbsp;</p>
<!--Start MDL-->
<div class="container">
										<!-- <div class="col-lg-6">
                    	<strong><h1>Ziara</h1>
											<h3>Virtual travel experience</h3></strong>
											<p class="lead">We help you discover places you have never before through photo-sharing and writing.
												Make NEW friends and stay in touch via personal messaging,launch events,launch
												campaigns to adress any issue of your choice!
											</p>
                    </div> -->
                    <div class="col-lg-4 col-lg-offset-1">
                    <?php
					if(isset($_GET['msg']))
					{
					$message = $_GET['msg'];
					if($message==1)
						echo'<div class="bs-component">
						        <div class="alert alert-dismissable alert-success">
						            <button type="button" class="close" data-dismiss="alert">&times;</button>
						            <strong>Successful!</strong> Please login below to activate your account.
						        </div>
							</div>';
					if($message==2)
						echo'<div class="bs-component">
						        <div class="alert alert-dismissable alert-info">
						            <button type="button" class="close" data-dismiss="alert">&times;</button>
						            <strong>Oops! Your email/password combination is wrong.</strong> 
						        </div>
							</div>';
					}
					 

					 ?>
                        <div class="well bs-component">
                            <form class="form-horizontal" name="frm1" action="../controller/action/login_action.php"method="post">
                                <fieldset>
                                    <legend>Ziara Login</legend>
                                    <div class="form-group">
                                        <!-- <label for="inputEmail" class="col-lg-2 control-label">Email</label> -->
                                        <div class="col-lg-10">
                                            <input type="text"name="email" class="form-control" id="inputEmail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="inputPassword" class="col-lg-2 control-label">Password</label> -->
                                        <div class="col-lg-10">
                                            <input type="password" name="password" class="form-control floating-label" id="focusedInput" placeholder="Password" data-hint="Combine both alphanumerics, big &amp; small caps for stronger passwords.">
                                           <!--  <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Checkbox
                                                </label>
                                            </div>
                                            <br>
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" checked> Toggle button
                                                </label>
                                            </div> -->
                                        </div>
                                    </div>
						                        
                                    <br>
             
                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <!-- <button class="btn btn-default">Cancel</button> -->
                                            <button type="submit" class="btn btn-primary"> Login <i style="color:inherit;" class="mdi-action-done"></i></button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            <a href="forgot_password.php">Forgot Password?</a>
                        </div>
                    </div>
                    
</div>

<!--End MDL-->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script src="../js/ripples.min.js"></script>
<script src="../js/material.min.js"></script>
<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
</body>
</html>
