<?php

$getimage = "SELECT * FROM profile_pic WHERE email = '$email'";
$results = mysql_query($getimage,$link);

<table>
<tr>
<td bgcolor="yellow">

while($row=mysql_fetch_array($result))
{
echo'<img src="data:image;base64,'.$row['image'].'" style="border-radius:50%50%50%50%;width:90px;height:90px;" ><br>';
}
?>

<a href="country.php">Home</a>
<a href="Profile.php">Profile</a>
<a href="Posts.php">Posts</a>
<a href="Messages.php">Messages</a>
<a href="Friends.php">Friends</a>
<a href="Notifications.php">Notifications</a>
<a href="Campaigns.php">Campaigns</a></td></tr></table>