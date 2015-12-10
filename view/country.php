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
  <meta property="og:url" content="http://www.pinpointsafari.com/" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <meta name="description" content="We help you discover places you have never before through people who have visited those places or people who live there via photo-sharing and writing" />
  <meta name="keywords" content="Open Access, Investing, virtual travel, connecting the world,we are one" />
  <meta name="application-name" content="Ziara Web App" />
  <!--End-->
  <link rel="shortcut icon" href="../favicon.ico">
  <link href='https://fonts.googleapis.com/css?family=Lato|Roboto' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="../js/"></script>
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" type="text/css" href="../css/general.css">
<head>
<style>
#top-fixed{
    background: rgb(251, 181, 13) none repeat scroll 0% 0%;
    //position: fixed;
    width: 100%;
    height: 70px;
    overflow: hidden;
}
#top-fixed > ul{
  padding: 0px;
}
#top-fixed > ul > li{
  display: inline;
}
#navigation-menu{
    background: #3BC9D4;
    height: 100px;
}
#left-panel{
  padding-bottom: 10px;
  background:#fff;
  width: 20%;
}
#left-panel > #cover-photo{
  padding-top: 50px;
  height: 150px;
  background:url('../img/html_bg2.jpg');
  background-size: cover;
  overflow: hidden;
}
#center-data{
  background: #fff;
  width: 60%;
}
#right-panel{
  background: black none repeat scroll 0% 0%;
  width: 20%;
  float: right;
  height: 500px;
}
#footer{
  background: #18559B;
}
</style>
</head>
<body >
<!--Top Bar-->
<div id="top-fixed" >
  <ul>
    <li><a href="country.php">Home</a></li>
    <li><a href="campaigns.php">Campaigns</a></li>
    <li><a href="events.php">Events</a></li>
    <li><a href="land.php">Buy/Sell Land</a></li>
    <li><a href="service.php">Service Providers</a></li>
    <li><a href="education.php">Education Centers</a></li>
    <li><a href="friends_here.php">Members</a></li>
    <li><a href="jobs.php">Jobs</a></li>
    <li><a href="import_export.php">Import/Export</a></li>
  </ul>
</div> <!--End top Bar-->

<div class="clearfix"></div>
<?php
  include('../config/database/travel_db_connect.php');
  $email = $_SESSION['email'];
  $getimage = "SELECT * FROM info WHERE email = '$email'";
  $result = mysql_query($getimage,$link);
?>
<!--Navigation menu-->
<div id="navigation-menu">
  <a href="country.php">Home</a>
  <a href="Profile.php">Profile</a>
  <a href="Posts.php">Posts</a>
  <a href="Friends.php">Friends</a>
  <!--Displaying the number of messages-->
  <?php
    $my_messages = mysql_query("SELECT * FROM messages WHERE receiver_email='$email'");
    $number_of_messages = mysql_num_rows($my_messages);
    if(mysql_num_rows($my_messages)==0) {

      echo"<a href='Messages.php'>Messages</a>";

    } else if(mysql_num_rows($my_messages)!=0) {
      $txts = mysql_query("SELECT * FROM seen_messages WHERE receiver_email='$email'");
      $number_of_texts = mysql_num_rows($txts);
      $number_of_pings =   $number_of_messages - $number_of_texts;

        if($number_of_pings<=0) {
             echo"<a href='Messages.php'>Messages</a>";
        } else if($number_of_pings!=0) {
          echo"<a href='seen_messages.php?receiver_email=$email'>Messages($number_of_pings)</a>";
        }
    }     
  ?><!--End of display to messages-->
  
  <!--Notifications available display-->
  <?php
      $get_nots = mysql_query("SELECT * FROM comments WHERE status_owner='$email'AND commenter_email!='$email'");
      $get_nots_number = mysql_num_rows($get_nots);

      if(mysql_num_rows($get_nots)==0) {
        echo"<a href='Notifications.php'>Notifications</a>";
      } else if(mysql_num_rows($get_nots)!=0) {
          $index = mysql_query("SELECT * FROM seen_nots WHERE status_owner='$email'");
          $number_of_indices = mysql_num_rows($index);
          $actual_number = $get_nots_number - $number_of_indices;
        if($actual_number<=0) {
          echo"<a href='Notifications.php'>Notifications</a>";
        } else {
          echo"<a href='seen_nots.php?status_owner=$email'>Notifications($actual_number)</a>";
        }
      }
  ?><!--End of notifications available display-->

  <a href="your_campaigns.php">Campaigns</a>
  <a href="../controller/events/your_events.php">Events</a>

</div><!--End of navigation menu-->

<div class="clearfix"></div>

<!--Left-side Panel-->
<div id="left-panel">
  <div id="cover-photo">
    <?php
      while($row=mysql_fetch_array($result)) {
        echo'<img src="data:image;base64,'.$row['image'].'" style=" border: 7px solid #DDAD27; margin-left:25px; position: absolute; border-radius:50%50%50%50%; margin-top:30px; width:140px;" ><br>';
      }
    ?>
  </div>
  <h2>Connect</h2>
  <h2>Chat</h2>
</div><!--End of left-side Panel-->

<div class="clearfix"></div>

<!--Center Data/ Updates-->
<div id="center-data">
  <!--Callback responses-->
  <?php
    if(isset($_GET['msg'])) {
      $message = $_GET['msg'];
      if($message==1) {
        echo"<span id='callout_success'>Your photo status has updated.</span>";
      } 
      if($message==2) {
        echo"<span id='callout_success'>Your status has been updated.</span>";
      }
      if($message==3) {
       echo"<span id='callout_warning'>Status cannot be empty.</span>";
      }
    }
   ?><!--End of callback responses-->

  <form method="post"action="../controller/action/status_action.php">
  Say Something:<br>
  <textarea rows="5"cols="40"name="status"placeholder="Say Something..." maxlength="1000">
  </textarea>
  <br>
  <input type="submit"value="Post Status">
  <span id="button"><a href="photo_status.php">Add Photos</a> </span>
  </form>
  <br><br>

  <!--Start of Posts block-->
  <div id="posts_block">
        <?php
          $country = $_SESSION['country'];
          $email = $_SESSION['email'];
          $status = "SELECT * FROM status WHERE country='$country'ORDER BY status_id DESC";
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
                   <hr size='1'>
                   <div id='post_single'>
                     <span id='name'>{$row['fname']} {$row['lname']} </span><br>
                     <span id='occupation'>from <b>{$row['country']}</b> </span><br>
                     <span id='status'>{$row['status']}</span><br>
                  ";
                 $status_like = mysql_query("SELECT * FROM status_like WHERE status_id = '$status_id' AND status_liker_email = '$email'");
                 $row = mysql_fetch_array($status_like);
                    if(mysql_num_rows($status_like)==0) {
                      $like_count = mysql_query("SELECT * FROM status_like WHERE status_id='$status_id'");
                      $row = mysql_fetch_array($like_count);
                      $number_of_likes = mysql_num_rows($like_count);
                      echo"<a href='see_likes.php?status_id=$status_id'> $number_of_likes</a> <a href='like_status.php?status_id=$status_id'>like</a>";
                    } else if(mysql_num_rows($status_like)==1) {
                       $like_count = mysql_query("SELECT * FROM status_like WHERE status_id='$status_id'");
                       $row = mysql_fetch_array($like_count);
                       $number_of_likes = mysql_num_rows($like_count);
                        echo"<a href='see_likes.php?status_id=$status_id'> $number_of_likes</a> <a href='unlike_status.php?status_id=$status_id'>unlike</a>";
                    }
                 echo"&nbsp &nbsp<a href='../controller/sessions/comment_status_session.php?status_id=$status_id'>$get_counter comment</a>";
                 
                 if($email!=$status_email) {
                    echo"&nbsp &nbsp<a href='view_profile.php?email=$status_email'>view profile</a> </div> ";
                 }
              } else {
                  $photo_id = $row['status_id'];
                  $photo_email = $row['email'];
                  $comment_counter_photo = mysql_query("SELECT * FROM comments WHERE status_id='$photo_id'");
                  $get_counter_photo = mysql_num_rows($comment_counter_photo);
                  echo"
                     <hr size='1'>
                     <div class='clearfix'></div>
                     <div id='post_single'> 
                       <span id='name'>{$row['fname']} {$row['lname']} </span>

                       <br>

                       <span id='status'>{$row['status']}</span>

                       <img src='data:image;base64,".$row['image']."' style='width:75%;height:50%;' ><br>
                  ";
                 $photo_like = mysql_query("SELECT * FROM status_like WHERE status_id = '$photo_id' AND status_liker_email = '$email'");
                 $row = mysql_fetch_array($photo_like);
                    if(mysql_num_rows($photo_like)==0) {
                      $like_count = mysql_query("SELECT * FROM status_like WHERE status_id='$photo_id'");
                      $row = mysql_fetch_array($like_count);
                      $number_of_likes = mysql_num_rows($like_count);
                      echo"<a href='see_likes.php?status_id=$photo_id'>$number_of_likes</a> <a href='like_photo.php?status_id=$photo_id'>like</a>";
                    } else if(mysql_num_rows($photo_like)==1) {
                       $like_count = mysql_query("SELECT * FROM status_like WHERE status_id='$photo_id'");
                       $row = mysql_fetch_array($like_count);
                       $number_of_likes = mysql_num_rows($like_count);
                       echo"<a href='see_likes.php?status_id=$photo_id'> $number_of_likes</a> <a href='unlike_photo.php?status_id=$photo_id'>unlike</a>";
                    }
               echo"&nbsp &nbsp<a href='../controller/sessions/comment_photo_session.php?photo_status_id=$photo_id'>$get_counter_photo comment</a>";
                  if($email!=$photo_email) {
                      echo"&nbsp &nbsp<a href='view_profile.php?email=$photo_email'>view profile</a></div> ";
                  }
              }
           }
         ?>
</div></div><!--End of Updates-->

<div class="clearfix"></div>

<!--Right-side Panel-->
<div id="right-panel">
  
</div><!--End of right-side Panel-->

<div class="clearfix"></div>

<!--Footer Panel-->
<div id="footer">
  
   <h1>Your Admin Panel</h1>
    <?php
      $my_email = $_SESSION['email'];
      $my_image = "SELECT * FROM info WHERE email = '$email'";
      $results = mysql_query($my_image,$link);
      while($row=mysql_fetch_array($results)) {
        echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
      }
    ?>

  <a href="admin_campaign.php">Campaigns</a><br>
  <a href="../controller/events/admin_events.php">Events</a><br>
  <a href="admin_lands.php">Buy/Sell Land</a><br>
  <a href="admin_service.php">Service Providers</a><br>
  <a href="admin_education.php">Education Centres</a><br>
  <a href="admin_job.php">Jobs</a><br>
  <a href="admin_import_export.php">Import/Export</a>

<h2>Ziara</h2>

<p>
 <a href="about.php">About Us</a><br>
 <a href="contact.php">Contact Us</a><br>
 <a href="#">Terms And Conditions</a><br>
<a href="faqs.php">FAQs</a><br>
<a href="ziara_jobs.php">Jobs</a><br>
<a href="#">Help</a><br>
<a href="settings.php">Settings</a><br>
<a href="log_out.php">Logout(<?php echo $_SESSION['fname'];?> <?php echo $_SESSION['lname'];?>)</a><br>

</div><!--End of footer Panel-->
</body></html>

