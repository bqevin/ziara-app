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
                              <div class="well"> 
                                   <form class="form-horizontal" method="post" role="form" action="../controller/action/photo_status_action.php"enctype="multipart/form-data">
                                    <h4>Upload a pic</h4>
                                    <input type="file"name="image">

                                     <div class="form-group" style="padding:14px;">
                                      <textarea class="form-control" name="status" placeholder="Photo Caption"></textarea>
                                    </div>
                                    
                                    <button class="btn btn-primary pull-right" id="button" name="sumit" type="submit">upload</button><ul class="list-inline"></li><li><a href=""><i class="fa fa-map-marker"></i></a></li></ul>
                                  </form>
                              </div>                           
                              <!-- <div class="panel panel-default">
                                <div class="panel-thumbnail"><img src="../img/html_bg3.jpg" class="img-responsive"></div>
                                <div class="panel-body">
                                  <p class="lead">Urbanization</p>
                                  <p>45 Followers, 13 Posts</p>
                                  
                                  <p>
                                    <img src="../img/html_bg4.jpg" width="28px" height="28px">
                                  </p>
                                </div>
                              </div> -->
<!-- 
                           
                              <div class="panel panel-default">
                                <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootstrap Examples</h4></div>
                                  <div class="panel-body">
                                    <div class="list-group">
                                      <a href="" class="list-group-item">Modal / Dialog</a>
                                      <a href="" class="list-group-item">Datetime Examples</a>
                                      <a href="" class="list-group-item">Data Grids</a>
                                    </div>
                                  </div>
                              </div>
 -->
                      <!--Right Columns for updates-->
                      <!--Start World Updates-->  
                         <div class="col-sm-7">
                               <div class="panel panel-default">
                               <div class="panel-heading" style="text-align:center;color: #0C9830;">
                             	  <h4>Other parts of the world</h4>	
                               </div>
                               </div>

                                <div class="well"> 
                                   <form class="form">
                                    <div class="input-group text-center">
                                    <input type="text" class="form-control input-lg" placeholder="pick country to filter feeds">
                                      <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="button">View</button></span>
                                    </div>
                                  </form>
                                </div>
<!--Start of Posts block-->

																	<?php
														         $country = $_SESSION['country'];
														          $email = $_SESSION['email'];
														          $status = "SELECT * FROM status WHERE country!='$country'ORDER BY status_id DESC limit 5";
														          $retval = mysql_query($status,$link);
														          if(!$retval) {
														           die('could not fetch data:'.mysql_error());
														          } while($row=mysql_fetch_array($retval,MYSQL_ASSOC)) {  
														              if(empty($row['name'])) {
														                 $status_id = $row['status_id'];
														                 $status_email = $row['email'];
														                 $comment_counter = mysql_query("SELECT * FROM comments WHERE status_id='$status_id'");
														                 $get_counter = mysql_num_rows($comment_counter);
														                 echo"
														             <div class='panel panel-default'>
														                <div class='panel-heading'>
						                                  <a href='#'' class='pull-right'>Posted from {$row['country']}</a>
						                                  <h4 class=''>
						                                   {$row['fname']} {$row['lname']}
						                                  </h4>
					                                  </div>
														      				<!--Status starts Here-->
														                <div class='panel-body'>
				                                    <!--Status Goes Here-->
				                                    {$row['status']}
				                                   <hr>
				                                   													         														                     
														                  ";
														                 $status_like = mysql_query("SELECT * FROM status_like WHERE status_id = '$status_id' AND status_liker_email = '$email'");
														                 $row = mysql_fetch_array($status_like);
														                    if(mysql_num_rows($status_like)==0) {
														                      $like_count = mysql_query("SELECT * FROM status_like WHERE status_id='$status_id'");
														                      $row = mysql_fetch_array($like_count);
														                      $number_of_likes = mysql_num_rows($like_count);
														                      echo"
														                      <div class='input-group-btn'>
														                      <!--Number of Likes-->
						                                      <a href='see_likes.php?status_id=$status_id'>
																                  	<button class='btn btn-default'>$number_of_likes</button>
																                  </a>
																                  <a href='like_status.php?status_id=$status_id'>   
						                                      	<button class='btn btn-default'><i class='fa fa-heart'></i></button>
						                                      </a>
   														                    ";
														                    } else if(mysql_num_rows($status_like)==1) {
														                       $like_count = mysql_query("SELECT * FROM status_like WHERE status_id='$status_id'");
														                       $row = mysql_fetch_array($like_count);
														                       $number_of_likes = mysql_num_rows($like_count);
														                        echo"
														                        <a href='see_likes.php?status_id=$status_id'> 
														                       	 <button class='btn btn-default'>$number_of_likes</button>
														                        </a>
														                        <a href='unlike_status.php?status_id=$status_id'>
														                        <button class='btn btn-default'>Unlike</button>
														                        </a>
														                        <a href='../controller/sessions/comment_status_session.php?status_id=$status_id'>
														                        <button class='btn btn-default'>$get_counter comment</button>
														                        </a>
				                                    			</div>
							                                   
														                    ";
														                    }
														                 echo"
														                 		<hr>
														                 		<form>
							                                    <div class='input-group'>
							                                      <div class='input-group-btn'>
							                                      </div>
							                                      <input type='text' class='form-control' placeholder='Add a comment..''>
							                                      <div class='input-group-btn'>
							                                     	 <button class='btn btn-default'><i class='fa fa-comment'></i></button>
							                                      </div>
							                                    </div>
							                                  </form>
							                                </div> 
							                           </div>
							                           </div>
							                           <!--End of single Post w/pic -->
														                 ";
														                 
														                
														              } 

														              else {
														                  $photo_id = $row['status_id'];
														                  $photo_email = $row['email'];
														                  $comment_counter_photo = mysql_query("SELECT * FROM comments WHERE status_id='$photo_id'");
														                  $get_counter_photo = mysql_num_rows($comment_counter_photo);
														                  echo"
														              <div class='panel panel-default'>
														                <div class='panel-heading'>
						                                  <a href='#'' class='pull-right'>Posted from {$row['country']}</a>
						                                  <h4 class=''>
						                                   {$row['fname']} {$row['lname']}
						                                  </h4>
					                                  </div>

														      					<!--Status starts Here-->
														                <div class='panel-body'>
				                                    <div class='panel-thumbnail'>
				                                    	<img src='data:image;base64,".$row['image']."' class='img-responsive' >
				                                    </div>
				                                    <!--Status Goes Here-->
				                                    {$row['status']}
				                                   <hr>
														               ";
														               $photo_like = mysql_query("SELECT * FROM status_like WHERE status_id = '$photo_id' AND status_liker_email = '$email'");
														                 $row = mysql_fetch_array($photo_like);
														                    if(mysql_num_rows($photo_like)==0) {
														                      $like_count = mysql_query("SELECT * FROM status_like WHERE status_id='$photo_id'");
														                      $row = mysql_fetch_array($like_count);
														                      $number_of_likes = mysql_num_rows($like_count);
														                      echo"
														                      <div class='input-group-btn'>
														                      <!--Number of Likes-->
						                                      <a href='see_likes.php?status_id=$photo_id'>
																                  	<button class='btn btn-default'>$number_of_likes</button>
																                  </a>
																                  <a href='like_photo.php?status_id=$photo_id'>   
						                                      	<button class='btn btn-default'><i class='fa fa-heart'></i></button>
						                                      </a>
														                      ";
														                    } else if(mysql_num_rows($photo_like)==1) {
														                       $like_count = mysql_query("SELECT * FROM status_like WHERE status_id='$photo_id'");
														                       $row = mysql_fetch_array($like_count);
														                       $number_of_likes = mysql_num_rows($like_count);
														                       echo"
														                       <a href='see_likes.php?status_id=$photo_id'> 
														                       	 <button class='btn btn-default'>$number_of_likes</button>
														                        </a>
														                        <a href='unlike_photo.php?status_id=$photo_id'>
														                        <button class='btn btn-default'>Unlike</button>
														                        </a>								                     
														                      ";
														                    }
														               echo"
														               <a href='../controller/sessions/comment_photo_session.php?photo_status_id=$photo_id'>
														                  <button class='btn btn-default'>$get_counter_photo comment</button>
														                </a>
				                                   </div>
							                             <hr>
													                 <form>
				                                    <div class='input-group'>
				                                      <div class='input-group-btn'></div>
				                                      <input type='text' class='form-control' placeholder='Add a comment..''>
				                                      <div class='input-group-btn'>
				                                      	<button class='btn btn-default'><i class='fa fa-comment'></i></button>
				                                      </div>
				                                    </div>
				                                   </form>
				                                </div> 
						                           </div>
														               ";
														                  
														              }
														           }
														         ?>


                            
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