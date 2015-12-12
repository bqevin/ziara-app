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
                      	<h4 class="lead" style="color: #1F94DE; font-size: 40px;"><i class="fa fa-plane"></i> Share jobs in <?php echo $_SESSION['country'];?></h4>
                     <blockquote>
	                 <p>
	                	 Help visitors easily find jobs. Please be detailful and precise at the same time.
						</p>
					</blockquote>
					<?php
						if(isset($_GET['msg']))
						{
						$message = $_GET['msg'];
						if($message==1)
						{
						 echo"<h2 class='text-success'>Thank you for sharing jobs in your country of visit!</h2>";
						}
						if($message==2)
						{
						 echo"<h2 class='text-danger'>Please fill in all the fields!</h2>";
						}
						}
					?>
					<form method="post" action="../controller/action/jobs_action.php" enctype="multipart/form-data">
					<div class="form-group">
				    <label for="employer">Employer</label>
				    <input type="text" name="employer" style="width:60%;" class="form-control"  placeholder="Employer Name">
				    </div>
					<label>Job Field</label>
					<select name="job" style="width:50%;" class="form-control">
						<option value="aviation">Aviation</option>
						<option value="medical">Medical </option>
						<option value="media">Media</option>
						<option value="casual">Casual Labourer</option>
						<option value="computing">Computing And Information Sciences</option>
						<option value="finance">Insurance,Banking,etc</option>
						<option value="engineering">Engineering</option>
						<option value="hospitality">Hotel And Hospitality</option>
						<option value="modelling">Modelling</option>
						<option value="musician">Musician</option>
						<option value="investigator">Private Investigator</option>
						<option value="rental">Rental Houses</option>
						<option value="research">Research</option>
						<option value="teaching">Teaching</option>
						<option value="travel">Tourism And Travel Agency</option>
						<option value="law">Law and Justice</option>
						<option value="sales">Sales and Marketing</option>
						<option value="security">Security</option>
						<option value="beauty">Beauty and Therapy</option>
						<option value="religion">Religious</option>
						<option value="others">Others</option>
					</select>

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
			    <input type="text" name="location" style="width:60%;" class="form-control"  placeholder="Location">
			    </div>	
					<label>Brief Description:</label>
					<textarea class="form-control" style="width:70%;" rows="5"cols="40" name="description" maxlength="1500">
						
					</textarea>
					<br>
				  <div class="form-group">
				    <input type="file" name="image">
				    <p class="help-block">Job Sample/Offices picture</p>
				  </div>
					<input type="submit" class="btn btn-success" style="width:150px;" name="sumit" value="submit">
				</form>
					
					<br><br>
					<hr style="border: 1px solid #CED1CD;">
					<p class="lead">Available jobs in <?php echo $_SESSION['country'];?> </p>
					<form method="post"action="../controller/sessions/jobs_choose_session.php" enctype="multipart/form-data">
					<select name="job" class="form-control" style="width:50%;">
					<option value="aviation">Aviation</option>
					<option value="medical">Medical</option>
					<option value="media">Media</option>
					<option value="casual">Casual Labourer</option>
					<option value="computing">Computing And Information Sciences</option>
					<option value="finance">Insurance,Banking,etc</option>
					<option value="engineering">Engineering</option>
					<option value="hospitality">Hotel And Hospitality</option>
					<option value="modelling">Modelling</option>
					<option value="musician">Musician</option>
					<option value="investigator">Private Investigator</option>
					<option value="rental">Rental Houses</option>
					<option value="research">Research</option>
					<option value="teaching">Teaching</option>
					<option value="travel">Tourism And Travel Agency</option>
					<option value="law">Law and Justice</option>
					<option value="sales">Sales and Marketing</option>
					<option value="security">Security</option>
					<option value="beauty">Beauty and Therapy</option>
					<option value="religion">Religious</option>
					<option value="others">Others</option>
					</select><br>
					<input type="submit"  value="Check Out"  style="width:150px;" class="btn btn-success"><br><br>
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