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
            <!-- sidebar -->
            	<?php include("../modules/sidebar.php");?>
            <!-- /sidebar -->
          
            <!-- main right col -->
            <div class="column col-sm-10 col-xs-11" id="main">
	          <!--top Nav-->
	        <?php include("../modules/top_nav.php");?>
	          <!--top Nav END-->
              
                <div class="padding">
                    <div class="full col-sm-9">
                      
                        <!-- content -->                      
                      	<div class="row">
                         <!-- Left Column for Updates --> 
                         <div class="col-sm-5" style="height: auto;">
                         <?php
													$empty = "SELECT * FROM info WHERE email='$email'";
													$see = mysql_query($empty,$link);
													while($row = mysql_fetch_array($see))
													{
													  $fname = $row['fname'];
													  $lname = $row['lname'];
													  if($row['job']=="null"or $row['skills']=="null"or $row['religion']=="null" or $row['relationship']=="null" or $row['kids']=="null"or $row['hobbies']=="null"or $row['places']=="null"or $row['about']=="null")
													  {
													     echo"
													     <div class='panel panel-default'>
														   <div class='panel-heading' style='background-color: #FFF;color: #FEC00E;'>
													     $fname $lname 
													     your profile is incomplete.
													     Please <a href='edit_profile.php'>complete HERE</a> 
													      as fields should not be null.
													     
													     </div></div>";
													    }
													}
												?>
												<!-- 
																<p class="lead">
																<?php
																// if(isset($_GET['msg']))
																// {
																//   $message = $_GET['msg'];
																//   if($message==1)
																//   {
																//    echo"<span>Your profile has been updated successfully</span>";
																//   }
																//  }
																 ?>
																 </p>    --> 

                              <div class="panel panel-default">
                              <?php
                                  $my_email = $_SESSION['email'];
																	$getimage = "SELECT * FROM info WHERE email = '$my_email'";
																	$result = mysql_query($getimage,$link);
															?>

                                <div class="panel-thumbnail">
                                <?php
																	while($row=mysql_fetch_array($result))
																		{
																		echo'<img src="data:image;base64,'.$row['image'].'" class="img-responsive" >';
																		}
																	?>
                                </div>
                                <?php
                                $country = $_SESSION['country'];
																$you = $_SESSION['email'];
																$email = $_SESSION['email'];
																$qry = mysql_query("SELECT * FROM friends WHERE you = '$you' OR friend_email = '$you'ORDER BY id DESC");
																$number_of_friends = mysql_num_rows($qry);
																echo"
																<p class='lead'> &nbsp; You have <b>$number_of_friends</b> Friends  </p>
																&nbsp; 
																<a href='everyone.php'>
																<button class='btn btn-primary'><i class='fa fa-plus'></i> find friends</button><br>
																</a>
																";
																$qry = mysql_query("SELECT * FROM friends WHERE you = '$you' OR friend_email = '$you'ORDER BY id DESC");
																while($row = mysql_fetch_array($qry,MYSQL_ASSOC))
																{
																	if($row['you']==$you)
																  {
																     $friend_email = $row['friend_email'];
																     $get_friend = "SELECT * FROM  info WHERE email = '$friend_email'";
																     $report = mysql_query($get_friend,$link);
																     if(!$report)
																	 {
																	  die('cannot fetch data:'.mysql_error());
																	 }
																	 while($row=mysql_fetch_array($report,MYSQL_ASSOC))
																	 {
																	  
																	   echo"
																	   <div class='list-group'>
																	   			<a class='list-group-item'>
																	   				<img src='data:image;base64,".$row['image']."'' style='width:90px;height:90px; '>
																	   			</a>
																	   		  <a  class='list-group-item'><b> Name:  </b> {$row['fname']} {$row['lname']}</a>
																	   		  <a  class='list-group-item'><b> Gender: </b> {$row['gender']}</a>
																	   		  <form class='list-group-item' method='post' action='../controller/sessions/view_buddy_profile_session.php'>
																				   <input type='hidden'name='email' value='$friend_email'>
																				   <input class='btn btn-primary' type='submit'value='view profile'>
																			   </form>
																	   </div>
																	   

																	   ";
																	 }
																} 
																else if($row['friend_email']==$you)
															  {
															     $your_friend = $row['you'];
															     $get_pal = "SELECT * FROM  info WHERE email = '$your_friend'";
															     $reports = mysql_query($get_pal,$link);
															     if(!$reports)
																 {
																  die('cannot fetch data:'.mysql_error());
																 }
																 while($row=mysql_fetch_array($reports,MYSQL_ASSOC))
																 {
																  
																   echo"
																   <div class='list-group'>
																	   			<a class='list-group-item'>
																	   				<img src='data:image;base64,".$row['image']."'' style='width:90px;height:90px; '>
																	   			</a>
																	   		  <a  class='list-group-item'><b> Name:  </b> {$row['fname']} {$row['lname']}</a>
																	   		  <a  class='list-group-item'><b> Gender: </b> {$row['gender']}</a>
																	   		  <form class='list-group-item' method='post' action='../controller/sessions/view_pal_profile_session.php''>
																				   <input type='hidden'name='email' value='$your_friend'>
																				   <input class='btn btn-primary' type='submit'value='view profile'>
																			   </form>
																	   </div>
																	   
																   ";
																 }
															   }
																}
																?>

		                         <?php
		                         		$country = $_SESSION['country'];
																$query = "SELECT * FROM info WHERE country = '$country'";
																$retval = mysql_query($query,$link);
																if(!$retval)
																{
																 die('cannot fetch data:'.mysql_error());
																}
																$check_friend = "SELECT * FROM friends WHERE country = '$country'";
																$set = mysql_query($check_friend,$link);
																if(!$set)
																{
																die('Error:'.mysql_error());
																}
																while($row=mysql_fetch_array($set,MYSQL_ASSOC))
																{
																   $email_exist = $row['friend_email'];
																  
																  
																}

																$mine_email = $_SESSION['email'];
																while($row = mysql_fetch_array($retval))
																{
																   
																   if($row['email']!=$mine_email)
																    {
																		 
																	   echo"
																	   <h4>People you may know from {$row['country']}</h4>
																	   <div class='list-group'>
																	   			<a class='list-group-item'>
																	   				<img src='data:image;base64,".$row['image']."'' style='width:90px;height:90px; '>
																	   			</a>
																	   		  <a  class='list-group-item'><b> Name:  </b> {$row['fname']} {$row['lname']}</a>
																	   		  <a  class='list-group-item'><b> Gender: </b> {$row['gender']}</a>
																	   		  <form class='list-group-item' method='post'action='view_friend_profile.php'>
																				   <input type='hidden'name='id' value='{$row['user_id']}'>
																				   <input type='hidden'name='email' value='{$row['email']}'>
																				   <input class='btn btn-primary' type='submit'value='view profile'>
																			   </form>
																	   </div>
																		   ";
																    }

																}
																?>
																 
                                    
																		
                                </div>
                              </div>

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