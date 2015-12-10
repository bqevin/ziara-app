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
                
                <!-- top nav -->
              	<div class="navbar navbar-blue navbar-static-top">  
                    <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
          				<span class="icon-bar"></span>
          				<span class="icon-bar"></span>
                      </button>
                      <a href="/" class="navbar-brand logo">Z</a>
                  	</div>
                  	<nav class="collapse navbar-collapse" role="navigation">
                    <form class="navbar-form navbar-left">
                        <div class="input-group input-group-sm" style="max-width:360px;">
                          <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                          <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                      </li>
                       <li>
                        <a href="#"><i class="fa fa-cog"></i> Profile</a>
                      </li>
                       <li>
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                      </li>
                      <li>
                        <a href="#postModal" role="button" data-toggle="modal"><i class="fa fa-plus"></i> Friends</a>
                      </li>
                       <li>
                       <?php
												$my_messages = mysql_query("SELECT * FROM messages WHERE receiver_email='$email'");
												$number_of_messages = mysql_num_rows($my_messages);
												if(mysql_num_rows($my_messages)==0)
												{
												  echo"<td style='width:70px;'><a href='Messages.php'>Messages</a></td><td style='width:10px;'></td>";
												}
												else if(mysql_num_rows($my_messages)!=0)
												{
												  $txts = mysql_query("SELECT * FROM seen_messages WHERE receiver_email='$email'");
												  $number_of_texts = mysql_num_rows($txts);
												  $number_of_pings =   $number_of_messages - $number_of_texts;
												  if($number_of_pings<=0)
												  {
												     echo"<a href='Messages.php'><i class='fa fa-comment'></i> Messages</a>";
												  }
												  else if($number_of_pings!=0)
												  {
												  echo"
												  <a href='seen_messages.php?receiver_email=$email' role='button' data-toggle='modal'>
												  <i class='fa fa-comment'></i> Messages($number_of_pings)</a>
												  ";
												}
												}     
												?> 
                        
                      </li>
                      <li>
                      <?php
											$get_nots = mysql_query("SELECT * FROM comments WHERE status_owner='$email'AND commenter_email!='$email'");
											$get_nots_number = mysql_num_rows($get_nots);
											if(mysql_num_rows($get_nots)==0)
											{
											  echo"<a href='Notifications.php'>Notifications</a>";
											}
											else if(mysql_num_rows($get_nots)!=0)
											{
											  $index = mysql_query("SELECT * FROM seen_nots WHERE status_owner='$email'");
											  $number_of_indices = mysql_num_rows($index);
											  $actual_number = $get_nots_number - $number_of_indices;
											  if($actual_number<=0)
											  {
											    echo"<a href='Notifications.php'><span class='badge'>Notifications</span></a>";
											   }
											   else
											   {

											  echo"<a href='seen_nots.php?status_owner=$email'><span class='badge' style='color:#C07474;'>Notifications ($actual_number)</span></a>";
											  }
											}
											?>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                       <?php
												$my_email = $_SESSION['email'];
												$my_image = "SELECT * FROM info WHERE email = '$email'";
												$results = mysql_query($my_image,$link);
												while($row=mysql_fetch_array($results))
												{
													echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> '
													.$row['fname'].' '.$row['lname'].
													'</a>';
												//echo'<img src="data:image;base64,'.$row['image'].'">';
												}
											?>
                        <ul class="dropdown-menu">
                          <li><a href="">More</a></li>
                          <li><a href="">More</a></li>
                          <li><a href="">More</a></li>
                          <li><a href="">More</a></li>
                          <li><a href="">More</a></li>
                        </ul>
                      </li>
                    </ul>
                  	</nav>
                </div>
                <!-- /top nav -->
              
                <div class="padding">
                    <div class="full col-sm-9">
                      
                        <!-- content -->                      
                      	<div class="row">
                      	<h4 class="lead">Developers</h4>
                      	<p>
                      		<em>Ziara</em> was developed by <a href="#"> Kelvin Kagia Kimani </a>, a computer science student in Kirinyaga University
							and improved by <a href="#">Kevin Barassa</a> a computer science student from Chuka University who ensured the  ultimate goal of connecting people of different countries is achieved.
                      	</p>

                      	<h4 class="lead">What Ziara will achieve</h4>
                      	<p>
                      		Ziara just as its name suggests, will help people from all over the world understand what happens in each country based on information posted
							 by those who have travelled there or its residents. 
						<p> It's  also an avenue to connect more opportunities includings jobs,
							 friendships, business partners, education, resources and many more.
                      	</p>
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