<?php
session_start();
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
<div class="row">
					
                    <div class="col-lg-5">
                    <?php
					if(isset($_GET['msg']))
					{
					$message = $_GET['msg'];
					if($message==1)
					echo'<div class="bs-component">
					        <div class="alert alert-dismissable alert-success">
					            <button type="button" class="close" data-dismiss="alert">&times;</button>
					            <strong>Congratulations '.$_SESSION["fname"].' for the patience!</strong> You are one step away.
					        </div>
					    </div>';
					}
					if(isset($_GET['msg']))
					{
						$message = $_GET['msg'];
						if($message==2)
						{
						echo'<div class="bs-component">
										        <div class="alert alert-dismissable alert-danger">
										            <button type="button" class="close" data-dismiss="alert">&times;</button>
										            <strong>Please include atleast all fields.</strong> Please.
										        </div>
										    		</div>';
						}
						}
						?>
                        <div class="well bs-component">
                            <form class="form-horizontal" name="frm1" method="post" action="../controller/action/add_info_action.php">
                                <fieldset>
                                    <legend>Let people find you easily.</legend>
                                    <!-- <span class="help-block">connect with over 1,000,000+ like minded people...</span> -->
                                    <div class="form-group">
             
                                        <div class="col-lg-10">
                                            <input type="text" name="job" placeholder="Job/Profession" class="form-control" id="inputFn">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            <input type="text" name="skills" placeholder="Skills" class="form-control" id="inputLn">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            <input type="text" name="religion"placeholder="Religion" class="form-control" id="inputLn">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="select" class="col-lg-2 control-label">Residence</label> -->
                                        <div class="col-lg-10">
	                                    <select class="form-control" name="relationship" id="select">
											<option value="" name=""> Relationship Status </option>
											<option value="Single">Single</option>
											<option value="In A Relationship">In A Relationship</option>
											<option value="Engaged">Engaged</option>
											<option value="Married">Married</option>
											<option value="Divorced">Divorced</option>
	                                    </select>
               
                                            <!-- <select multiple="" class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            <input type="text" name="kids"placeholder="No. Of Kids" class="form-control" id="inputLn">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            <textarea class="form-control" maxlength="400" placeholder="Hobbies "name="hobbies" rows="2" id="textArea"></textarea>
                                            <span class="help-block">Be precise to get quick matches. (Max. 400)</span>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            <textarea class="form-control" maxlength="300" placeholder="Places You Have Been..."name="places" rows="2" id="textArea"></textarea>
                                            <span class="help-block">Local &amp; Intenational. (Max. 300)</span>
                                        </div>
                                    </div>
           
                                    <br>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            <textarea class="form-control" maxlength="1000" placeholder="About You.."name="about" rows="3" id="textArea"></textarea>
                                            <span class="help-block">(Max. 1000)</span>
                                        </div>
                                    </div>
                                    

                                    
                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <!-- <button class="btn btn-default">Cancel</button> -->
                                            <button type="submit" class="btn btn-primary"> Make First Visit <i style="color:inherit;" class="mdi-av-play-circle-fill"></i></button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-lg-offset-1">
                    	<strong><h1>Ziara</h1>
											<h3>Virtual travel experience</h3></strong>
											<p class="lead">We help you discover places you have never before through photo-sharing and writing.
												Make NEW friends and stay in touch via personal messaging,launch events,launch
												campaigns to adress any issue of your choice!
											</p>
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
