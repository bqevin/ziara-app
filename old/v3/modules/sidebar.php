            <!-- sidebar -->
            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
               <?php
                while($row=mysql_fetch_array($result)) {
                  echo'<img src="data:image;base64,'.$row['image'].'" width="100%" style="overflow:hidden;"><br>';
                }
              ?>
              <ul class="nav">
          			<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="fa fa-chevron-right"></i></a></li>
            	</ul>
               
                <ul class="nav hidden-xs" id="lg-menu">
                    <li class="active"><a href="../view/indexxx.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="../view/campaigns.php"><i class="fa fa-cog"></i> Campaigns</a></li>
                    <li><a href="../view/events.php"><i class="fa fa-ticket"></i></i> Events</a></li>
                    <li><a href="../view/land.php"><i class="fa fa-globe"></i> Buy/Sell Land</a></li>
                    <li><a href="../view/service.php"><i class="fa fa-info"></i> Service Providers</a></li>
                    <li><a href="../view/education.php"><i class="fa fa-rocket"></i> Education Centers</a></li>
                    <li><a href="../view/friends_here.php"><i class="fa fa-users"></i> Members</a></li>
                    <li><a href="../view/jobs.php"><i class="fa fa-plus"></i> Jobs</a></li>
                    <li><a href="../view/import_export.php"><i class="fa fa-exchange"></i> Import/Export</a></li>
                </ul>
               <!--  <ul class="list-unstyled hidden-xs" id="sidebar-footer">
                    <li>
                      <a href="#"><h3>Ziara</h3> <i class="fa fa-heart"></i> Ziara</a>
                    </li>
                </ul> -->
              
              	<!-- tiny only nav-->
              <ul class="nav visible-xs" id="xs-menu">
                  	<li><a href="#" class="text-center"><i class="fa fa-home"></i></a></li>
                    <li><a href="#" class="text-center"><i class="fa fa-users"></i></a></li>
                  	<li><a href="#" class="text-center"><i class="fa fa-plus"></i></a></li>
                    <li><a href="#" class="text-center"><i class="fa fa-info"></i></a></li>
                </ul>
              
            </div>
            <!-- /sidebar -->