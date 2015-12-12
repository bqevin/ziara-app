<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
p{background-color:white;opacity:0.8;color:lime;}
p1{background-color:black;opacity:0.8;}
</style>
</head>
<body style="background-image:url(shading.png);background-repeat:repeat;"link="red"alink="lightgreen"vlink="darkgreen"/>
<div id="para"align="center">
<table bgcolor="white"cellspacing="5"cellpadding="5"width="50%"style="border-radius:8px;">
<tr>
<td align="center">
<?php
if(isset($_GET['msg']))
{
$message = $_GET['msg'];
if($message==1)
echo"<span style='background-color:white;color:red;opacity:0.8;'>Welcome please fill the form below</span>";
}
?>
<p><?php echo $_SESSION['fname'];?>
 Please fill in the information required in the form below.
 It will help service providers in country's you visit know how to handle 
 you and services and attention you require to fulfil your satisfaction.
 </p></td></tr></table>
<div id="para1"align="center">
<table bgcolor="white"cellspacing="5"cellpadding="5" style="border-radius:8px;"width="50%">
<tr>
<td align="center">
<p1>
<?php
if(isset($_GET['msg']))
{
$message = $_GET['msg'];
if($message==2)
{
echo"<span style='background-color:green;color:red;'>Please fill in all the fields!</span>";
}
}
?>

<form method="post"action="../controller/action/add_info_action.php">
<font color="red">Job/Profession:</font><br><input type="text"name="job"placeholder="Job/Profession"style="border-radius:8px;width:200px;"/><br>
<font color="red">Skills:</font><br><input type="text"name="skills"placeholder="Skills"style="border-radius:8px;width:200px;"/><br>
<font color="red">Religion:</font><br><input type="text"name="religion"placeholder="Religion"style="border-radius:8px;width:200px;"><br>
<font color="red">Relationship:</font><br><select name="relationship"style="border-radius:8px;width:200px;"><br>
<option value="Single">Single</option>
<option value="Engaged">Engaged</option>
<option value="In A Relationship">In A Relationship</option>
<option value="Divorced">Divorced</option></select><br>
<font color="red">No of.Kids:</font><br><input type="text"name="kids"placeholder="No Of Kids"style="border-radius:8px;width:200px;"><br>
<font color="red">Hobbies:</font><br><textarea rows="5"cols="40"placeholder="Hobbies"name="hobbies"style="border-radius:8px;"maxlength="400"/></textarea><br>
<font color="red">Places You Have Been:</font><br><textarea rows="5"cols="40"placeholder="Places You Have Been..."name="places"style="border-radius:8px;"maxlength="300"/>
</textarea><br>
<font color="red">About You:</font><br><textarea rows="5"cols="40"placeholder="About You.."name="about"style="border-radius:8px;"maxlength="1000"/>
</textarea><br>
<input type="submit"value="Submit"style="background-color:cyan;width:200px;height:25px;border-radius:8px;color:red;">
</form></p1></td></tr></div></body></html>


