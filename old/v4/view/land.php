<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Ziara - Welcome to Ziara</title>
		<meta name="generator" content="Ziara" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/font-awesome.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="../css/styles.css" rel="stylesheet">
		<style type="text/css">
		div.row{ width: 100%;	}
		</style>
	</head>
	<body>
<div class="wrapper">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
                      
          <?php
					  include('../config/database/travel_db_connect.php');
					  $email = $_SESSION['email'];
					  $getimage = "SELECT * FROM info WHERE email = '$email'";
					  $result = mysql_query($getimage,$link);
				 ?>
		    <?php include("../modules/sidebar.php");?>
          
            <!-- main right col -->
            <div class="column col-sm-10 col-xs-11" id="main">
            <!--top Nav-->
        <?php include("../modules/top_nav.php");?>
            <!--top Nav END-->
                <div class="padding">
                    <div class="full col-sm-9">
                      
                        <!-- content -->                      
                      	<div class="row">
                      	<h4 class="lead" style="color: #1F94DE; font-size: 40px;"><i class="fa fa-globe"></i> Register your land in <?php echo $_SESSION['country'];?> for sale</h4>
                     <blockquote>
	                 <p>
	                	Please be clear and precise as possible.</p>
					</blockquote>
					<?php
						if(isset($_GET['msg']))
						{
						$message = $_GET['msg'];
						if($message==1)
						{
						 echo"<h2 class='text-success'>You have successfully registered the land/estate!</h2>";
						}
						if($message==2)
						{
						 echo"<h2 class='text-danger'>Please fill in all the fields!</h2>";
						}
						}
					?>
					<form method="post"action="../controller/action/land_action.php"enctype="multipart/form-data">
					<div class="form-group">
				    <label for="email">Your Name/Company</label>
				    <input type="text" name="company" style="width:60%;" class="form-control"  placeholder="Name of seller">
				    </div>
					<div class="form-group">
				    <label for="email">Contact Number</label>
				    <input type="text" name="number" style="width:60%;" class="form-control"  placeholder="Your Phone">
				    </div>
					<div class="form-group">
				    <label for="email">Email address</label>
				    <input type="email" name="email" style="width:60%;" class="form-control" id="email" placeholder="Email">
				  </div>
					<!-- <div class="form-group">
				    <label for="email">Phone Number</label>
				    <input type="tel" name="number" style="width:60%;" class="form-control" id="phone" placeholder="Phone Number">
				    </div> -->
				    <div class="form-group">
				    <label for="email">Website</label>
				    <input type="tel" name="website" style="width:60%;" class="form-control" id="web" placeholder="Website">
				    </div>					    
			    <div class="form-group">
			    <label for="email">Location</label>
			    <input type="tel" name="location" style="width:60%;" class="form-control"  placeholder="Location">
			    </div>
			    <div class="form-group">
			    <label for="email">Price in Dollars</label>
			    <input type="tel" name="price" style="width:60%;" class="form-control"  placeholder="$$$">
			    </div>	
					<label>Brief Description:</label>
					<textarea class="form-control" style="width:70%;" rows="5"cols="40"name="description" placeholder="brief description..." maxlength="1500">
						
					</textarea>
					<br>
				  <div class="form-group">
				    <input type="file" name="image">
				    <p class="help-block">Current photo of the piece of land/estate</p>
				  </div>
					<input type="submit" class="btn btn-success" style="width:150px;" name="sumit" value="submit">
					</form>
					
					<br><br>
					<hr style="border: 1px solid #CED1CD;">
					<p class="lead">Check out lands on sale from <?php echo $_SESSION['country'];?> here</p>
					<form method="post" action="../controller/sessions/land_choose_session.php" enctype="multipart/form-data">
					<input type="submit"name="sumit" value="Check"  style="width:150px;" class="btn btn-success"><br><br>
					</form>
                    </div><!--/row-->
                        
                      
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
          
        </div>
    </div>
</div>
	<!-- script references -->
		<script src="../js/jquery-2.1.4.min"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/scripts.js"></script>
	</body>
</html>