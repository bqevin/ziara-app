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
                      	<h4 class="lead" style="color: #1F94DE; font-size: 40px;"><i class="fa fa-music"></i> Create an Event in <?php echo $_SESSION['country'];?></h4>
                     <blockquote>
	                 <p>
	                	 Please Register your event as precisely &amp; clearly as possible.
	                 <p>Honesty will help you build a good track record and rapport with people seeking to attend your
					event.
						</p>
					</blockquote>
					<?php
						if(isset($_GET['msg']))
						{
						$message = $_GET['msg'];
						if($message==1)
						{
						 echo"<h2 class='text-success'>You have successfully created your event!</h2>";
						}
						if($message==2)
						{
						 echo"<h2 class='text-danger'>Please fill in all the fields!</h2>";
						}
						}
					?>
					<form method="post"action="../controller/action/event_action.php"enctype="multipart/form-data">
					<div class="form-group">
				    <label for="email">Event By</label>
				    <input type="text" name="owner" style="width:60%;" class="form-control"  placeholder="Organizer">
				    </div>
					<label>Type Of Event</label>
					<select name="event" style="width:50%;" class="form-control">
						<option value="Business">Business</option>
						<option value="Charity">Charity</option>
						<option value="Education">Education</option>
						<option value="Modelling">Modelling</option>
						<option value="Musical">Musical</option>
						<option value="Special school">Party</option>
						<option value="Political">Political</option>
						<option value="Protest">Protest Event</option>
						<option value="Religious">Religious Event</option></select>
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
				    <div class="row">
					  <div class="col-xs-2">
					  <label>Day</label>
						<select name="daye" class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
						</select>	
					  </div>
					  <div class="col-xs-3">
					  <label>Month</label>
					   <select name="monthe" class="form-control">
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select>
					  </div>
					  <div class="col-xs-2">
					  <label>Year</label>
					   <select name="yeare" class="form-control">
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
						</select>
					  </div>
					</div>
				    
			    <div class="form-group">
			    <label for="email">Location</label>
			    <input type="tel" name="location" style="width:60%;" class="form-control"  placeholder="Location">
			    </div>	
					<label>Brief Description:</label>
					<textarea class="form-control" style="width:70%;" rows="5"cols="40"name="description" placeholder="brief description..." maxlength="1500">
						
					</textarea>
					<br>
				  <div class="form-group">
				    <input type="file" name="image">
				    <p class="help-block">Attach Event Poster</p>
				  </div>
					<input type="submit" class="btn btn-success" style="width:150px;" name="sumit"value="submit">
					</form>
					
					<br><br>
					<hr style="border: 1px solid #CED1CD;">
					<p class="lead">Check other events available in <?php echo $_SESSION['country'];?></p>
					<form method="post"action="../controller/sessions/event_choose_session.php" enctype="multipart/form-data">
					<label><font color="green">Subject:</font></label>
					<select name="event" class="form-control" style="width:50%;">
						<option value="Business">Business</option>
						<option value="Charity">Charity</option>
						<option value="Education">Education</option>
						<option value="Modelling">Modeling</option>
						<option value="Musical">Musical</option>
						<option value="Special school">Party</option>
						<option value="Political">Political</option>
						<option value="Protest">Protest Event</option>
						<option value="Religious">Religious Event</option>
						</select><br>
					<input type="submit"name="sumit" value="View"  style="width:150px;" class="btn btn-success"><br><br>
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