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
			 
			$my_email = $_SESSION['email'];
			$getimage = "SELECT * FROM info WHERE email = '$my_email'";
		    $result = mysql_query($getimage,$link);
		  ?>
            <!-- sidebar -->
            	<?php include("../modules/sidebar.php");?>
            <!-- /sidebar -->
          
            <!-- main right col -->
            <div class="column col-sm-10 col-xs-11" id="main">
	          <!--top Nav-->
	        <?php include("../modules/top_nav2.php");?>
	          <!--top Nav END-->
              
                <div class="padding">
                    <div class="full col-sm-9">
                      
                        <!-- content -->                      
                      	<div class="row">
                         <!-- Left Column for Updates --> 
                         <div class="col-sm-5" style="height: auto;">
                         <?php
							$empty = "SELECT * FROM info WHERE email='$my_email'";
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
									<p class="lead">
									<?php
									if(isset($_GET['msg']))
									{
									  $message = $_GET['msg'];
									  if($message==1)
									  {
									   echo"<span>Your profile has been updated successfully</span>";
									  }
									 }
									 ?>
									 </p>    

                              <div class="panel panel-default">
                              <?php
                             	$id = $_POST['id'];
								$email = $_POST['email'];
								$country = $_SESSION['country'];
								$query = "SELECT * FROM info WHERE  email='$email'";
								$retval = mysql_query($query,$link);
								if(!$retval)
								{
								die('could not fetch data:'.mysql_error());
								}						
								?>
								<?php
								while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
								{
								 $friend_email = $row['email'];
								 $country = $row['country'];
								echo'
								<div class="panel-thumbnail">
								<img src="data:image;base64,'.$row['image'].'" class="img-responsive"
								</div>';
								echo "<div class='panel-body'>
					              <p class='lead'>{$row['fname']} {$row['lname']}</p>
					              <span> from {$row['country']} </span>";
								echo" <div class='list-group'>
					                  <a  class='list-group-item'><b> Email: </b> {$row['email']}</a>
					                  <a  class='list-group-item'><b> Gender: </b> {$row['gender']}</a>
					                  <a  class='list-group-item'><b> Job: </b> {$row['job']}</a>
					                  <a  class='list-group-item'><b> Skills: </b> {$row['skills']}</a>
					                  <a  class='list-group-item'><b> Religion: </b> {$row['religion']}</a>
					                  <a  class='list-group-item'><b> Relationship: </b> {$row['relationship']}</a>
					                  <a  class='list-group-item'><b> Kids: </b> {$row['kids']}</a>
					                  <a  class='list-group-item'><b> Hobbies: </b> {$row['hobbies']}</a>
					                ";
								if($row['gender']=="Female")
								{
								 echo"<a  class='list-group-item'><b> Places She has visited: </b> {$row['places']}</a>";
								}
								else
								{
								 echo"<a  class='list-group-item'><b> Places He has visited: </b> {$row['places']}</a>";
								}
								if($row['gender']=="Female")
								{
								 echo"<a  class='list-group-item'><b> About Her: </b> {$row['about']}</a>";
								}
								else
								{
								 echo"<a  class='list-group-item'><b> About Him: </b> {$row['about']}</a>
								 </div>
								 ";
								}

								}
								?>

								<?php
								$pal = $pal = mysql_query("SELECT * FROM friends WHERE you = '$my_email'AND friend_email='$email'UNION SELECT * FROM friends WHERE you='$email'AND friend_email='$my_email'");
								$row = mysql_fetch_array($pal);
								if(mysql_num_rows($pal)==0)
								{
								echo"<form method='post'action='get_friend.php'>
								<input type='hidden'name='you'value='$my_email'>
								<input type='hidden'name='friend_email'value='$email'>
								<input type='hidden'name='country'value='$country'>
								<input type='submit' class='btn btn-primary' value='Add Friend'>";
								}
								else if(mysql_num_rows($pal)==1)
								{
								echo"<form method='post'action='block_friend.php'>
								<input type='hidden'name='you'value='$my_email'>
								<input type='hidden'name='friend_email'value='$email'>
								<input type='hidden'name='country'value='$country'>
								<input type='submit'value='Unfriend' class='btn btn-primary'>";
								echo"
								&nbsp;&nbsp;&nbsp; 
								<form method='post' action='message_buddy.php'>
								<input type='hidden' name='email' value='email' >
								<input type='submit'value='Message' class='btn btn-primary'>";
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