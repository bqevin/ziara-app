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
                        <a href="indexxx.php"><i class="fa fa-home"></i> Home</a>
                      </li>
                       <li>
                        <a href="profile.php"><i class="fa fa-cog"></i> Profile</a>
                      </li>
                       <li>
                        <a href="indexxx.php"><i class="fa fa-home"></i> Home</a>
                      </li>
                      <li>
                        <a href="friends.php" role="button" data-toggle="modal"><i class="fa fa-plus"></i> Friends</a>
                      </li>
                       <li>
                       <?php
												$my_messages = mysql_query("SELECT * FROM messages WHERE receiver_email='$my_email'");
												$number_of_messages = mysql_num_rows($my_messages);
												if(mysql_num_rows($my_messages)==0)
												{
												  echo"<a href='Messages.php'>Messages</a>";
												}
												else if(mysql_num_rows($my_messages)!=0)
												{
												  $txts = mysql_query("SELECT * FROM seen_messages WHERE receiver_email='$my_email'");
												  $number_of_texts = mysql_num_rows($txts);
												  $number_of_pings =   $number_of_messages - $number_of_texts;
												  if($number_of_pings<=0)
												  {
												     echo"<a href='Messages.php'><i class='fa fa-comment'></i> Messages</a>";
												  }
												  else if($number_of_pings!=0)
												  {
												  echo"
												  <a href='seen_messages.php?receiver_email=$my_email' role='button' data-toggle='modal'>
												  <i class='fa fa-comment'></i> Messages($number_of_pings)</a>
												  ";
												}
												}     
												?> 
                        
                      </li>
                      <li>
                      <?php
											$get_nots = mysql_query("SELECT * FROM comments WHERE status_owner='$my_email'AND commenter_email!='$my_email'");
											$get_nots_number = mysql_num_rows($get_nots);
											if(mysql_num_rows($get_nots)==0)
											{
											  echo"<a href='Notifications.php'>Notifications</a>";
											}
											else if(mysql_num_rows($get_nots)!=0)
											{
											  $index = mysql_query("SELECT * FROM seen_nots WHERE status_owner='$my_email'");
											  $number_of_indices = mysql_num_rows($index);
											  $actual_number = $get_nots_number - $number_of_indices;
											  if($actual_number<=0)
											  {
											    echo"<a href='Notifications.php'><span class='badge'>Notifications</span></a>";
											   }
											   else
											   {

											  echo"<a href='seen_nots.php?status_owner=$my_email'><span class='badge' style='color:#C07474;'>Notifications ($actual_number)</span></a>";
											  }
											}
											?>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                       <?php
												$my_email = $_SESSION['email'];
												$my_image = "SELECT * FROM info WHERE email = '$my_email'";
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