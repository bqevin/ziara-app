<?php
session_start();
include('../../config/database/travel_db_connect.php');
$my_email = $_SESSION['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = mysql_real_escape_string($_POST['email']);
$country = $_POST['country'];
$gender = $_POST['gender'];
$job = $_POST['job'];
$skills = $_POST['skills'];
$religion = $_POST['religion'];
$relationship = $_POST['relationship'];
$kids = $_POST['kids'];
$hobbies = $_POST['hobbies'];
$places = $_POST['places'];
$about = $_POST['about'];
$update_comments1 ="UPDATE comments SET fname='$fname',lname='$lname',commenter_email='$email'WHERE commenter_email='$my_email'";
if(!mysql_query($update_comments1))
{
  die('cannot update comments:'.mysql_error());
}
$update_comments2 ="UPDATE comments SET status_owner='$email'WHERE status_owner='$my_email'";
if(!mysql_query($update_comments2))
{
  die('cannot update comments:'.mysql_error());
}
$update_comment_event_status ="UPDATE comment_event_status SET fname='$fname',lname='$lname',commenter_email='$email'WHERE commenter_email='$my_email'";
if(!mysql_query($update_comment_event_status))
{
  die('cannot update comment event status:'.mysql_error());
}
$update_status = "UPDATE status SET fname='$fname',lname='$lname',email='$email'WHERE email = '$my_email'";
if(!mysql_query($update_status))
{
   die('cannot update status:'.mysql_error());
}
$update_comment_campaign_status = "UPDATE comment_campaign_status SET fname='$fname',lname='$lname',commenter_email='$email'WHERE commenter_email='$my_email'";
if(!mysql_query($update_comment_campaign_status))
{
  die('cannot update comment campaign status:'.mysql_error());
}
$update_campaign = "UPDATE campaign SET admin_email='$email'WHERE admin_email='$my_email'";
if(!mysql_query($update_campaign))
{
  die('cannot update campaign:'.mysql_error());
}
$update_events = "UPDATE events SET admin_email='$email'WHERE admin_email='$my_email'";
if(!mysql_query($update_events))
{
  die('cannot update events:'.mysql_error());
}
$update_land = "UPDATE land SET admin_email='$email'WHERE admin_email='$my_email'";
if(!mysql_query($update_land))
{
  die('cannot update land:'.mysql_error());
}
$update_service = "UPDATE service SET admin_email='$email'WHERE admin_email='$my_email'";
if(!mysql_query($update_service))
{
  die('cannot update service:'.mysql_error());
}
$update_education = "UPDATE education SET admin_email='$email'WHERE admin_email='$my_email'";
if(!mysql_query($update_education))
{
  die('cannot update education:'.mysql_error());
}
$update_jobs = "UPDATE jobs SET admin_email='$email'WHERE admin_email='$my_email'";
if(!mysql_query($update_jobs))
{
  die('cannot update jobs:'.mysql_error());
}
$update_status_like = "UPDATE status_like SET status_liker_email='$email'WHERE status_liker_email='$my_email'";
if(!mysql_query($update_status_like))
{
  die('cannot update status like:'.mysql_error());
}
$update_campaign_supporters = "UPDATE campaign_supporters SET supporter_email='$email'WHERE supporter_email='$my_email'";
if(!mysql_query($update_campaign_supporters))
{
  die('cannot update campaign supporters:'.mysql_error());
}
$update_event_attend = "UPDATE event_attend SET attendee_email='$email'WHERE attendee_email='$my_email'";
if(!mysql_query($update_event_attend))
{
  die('cannot update event attend:'.mysql_error());
}
$update_friends_you = "UPDATE friends SET you='$email'WHERE you='$my_email'";
if(!mysql_query($update_friends_you))
{
  die('cannot update friends you:'.mysql_error());
}
$update_friends = "UPDATE friends SET friend_email='$email'WHERE friend_email='$my_email'";
if(!mysql_query($update_friends))
{
 die('cannot update friends:'.mysql_error());
}
$update_seen_messages1 = "UPDATE seen_messages SET sender_email='$email',fname='$fname',lname='$lname'WHERE sender_email='$my_email'";
if(!mysql_query($update_seen_messages1))
{
  die('cannot update messages1:'.mysql_error());
}
$update_seen_messages2 = "UPDATE seen_messages SET receiver_email='$email'WHERE receiver_email='$my_email'";
if(!mysql_query($update_seen_messages2))
{
  die('cannot update seen messages2:'.mysql_error());
}
$update_messages1 = "UPDATE messages SET sender_email='$email',fname='$fname',lname='$lname'WHERE sender_email='$my_email'";
if(!mysql_query($update_messages1))
{
  die('cannot update messages1:'.mysql_error());
}
$update_messages2 = "UPDATE messages SET receiver_email='$email'WHERE receiver_email='$my_email'";
if(!mysql_query($update_messages2))
{
  die('cannot update messages2:'.mysql_error());
}
$update_inbox1 = "UPDATE inbox SET sender_email='$email',fname='$fname',lname='$lname'WHERE sender_email='$my_email'";
if(!mysql_query($update_inbox1))
{
  die('cannot update inbox1:'.mysql_error());
}
$update_inbox2 = "UPDATE inbox SET receiver_email='$email'WHERE receiver_email='$my_email'";
if(!mysql_query($update_inbox2))
{
  die('cannot update inbox2:'.mysql_error());
}
$update_seen_nots1 = "UPDATE seen_nots SET status_owner='$email'WHERE status_owner='$my_email'";
if(!mysql_query($update_seen_nots1))
{
   die('cannot update seen nots1:'.mysql_error());
}
$update_seen_nots2 = "UPDATE seen_nots SET commenter_email='$email',fname='$fname',lname='$name'WHERE commenter_email='$commenter_email'";
if(!mysql_query($update_seen_nots2))
{
  die('cannot update seen nots2:'.mysql_error());
}
$update_import_export = "UPDATE import_export SET admin_email='$email'WHERE admin_email='$my_email'";
if(!mysql_query($update_import_export))
{
  die('cannot update import export:'.mysql_error());
}
$update = "UPDATE info SET fname='$fname',lname='$lname',email='$email',country='$country',gender='$gender',job='$job',skills='$skills',religion='$religion',relationship='$relationship',kids='$kids',hobbies='$hobbies',places='$places',about='$about'WHERE email = '$my_email'";
if(!mysql_query($update))
{
 die('Error:'.mysql_error());
}
else
{
 header("Location:../../view/direct_login.php?msg=2");
}
?>