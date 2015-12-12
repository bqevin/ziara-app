<?php
session_start();
include('travel_db_connect.php')
?>
<!DOCTYPE html>
<html>
<head>
<title> Ziara</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<style>
p:hover{background-color:#00FF00;}
#submit{background-color:#33FF99;color:white;border-radius:5px;width:200px;height:40px;}
#submit:hover{background-color:white;}
#span{font-size:20px;color:#00FF66;}
#input{width:400px;height:40px;border-color:black;border-radius:5px;}
</style>
<body style="background-image:url(safari.jpg);background-repeat:no-repeat;background-size: cover;">
<table width="100%"style="height:40px;background-color:#99CC00;">
<tr>
<td width="10%">
<span style="color:white;text-shadow:4px 4px 8px green;font-size:25px;font-weight:bold;"><i>Ziara.</i></span></td>
<td width="35%">
<form method="post"action="search_action.php">
<input type="text"name="email"placeholder="search by email"style="width:250px;height:40px;border-radius:5px;border-color:black;">
<input type="submit"value="search" style="width:100px;height:40px;background-color:#33FF99;color:white;border-radius:5px;"></form></td>
<td width="10%">
<span><a href="country.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="home.png" style="width:20px;height:20px;">Home</a></span>
</td>
<td width="5%"></td>
<td width="10%">
<span><a href="scroll_friends.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="friends.png" style="width:20px;height:20px;">Friends</a></span>
</td>
<td width="5%"></td>
<td width="10%">
<span><a href="my_campaigns.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="microphone.png" style="width:20px;height:20px;">Campaigns</a></span>
</td>
<td width="5%"></td>
<td width="10%">
<span><a href="my_events.php"style='color:white;font-size:20px;text-decoration:none;font-weight:bold;'><img src="calendar.png" style="width:20px;height:20px;">Events</a></span>
</td></tr></table>
<table width="100%">
<tr>
<td width="25%"></td>
<td width="50%"style="background-color:#FFFFCC;border-radius:5px;">
<?php
if(isset($_GET['msg']))
{
  $message = $_GET['msg'];
  if($message==1)
  {
    echo"<p style='color:red;'>Fields cannot be empty</p>";
  }
  if($message==2)
  {
    echo"<p style='color:red;'>That Phone Number is already in use!</p>";
  }
}

$email = $_SESSION['email'];
$qry_profile = "SELECT * FROM info WHERE email='$email'";
$retval = mysql_query($qry_profile,$link);
if(!$retval)
{
  die('Error on 47:'.mysql_error());
}
while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
{
 $fname = $row['fname'];
 $lname = $row['lname'];
 $pnumber = $row['pnumber'];
 
  echo"
  <form method='post'action='edit_profile_action.php'>
  <span id='span'>First Name:</span><br><input type='text'value='$fname' id='input' name='fname'><br>
  <span id='span'>Last Name:</span><br><input type='text'value='$lname' id='input'name='lname'><br>
  <span id='span'>Phone Number:</span><br><input type='text'value='$pnumber' id='input'name='pnumber'><br>
  <span id='span'>Country:</span><br>
  <select name='country' id='input'>
  <option value='Afghanistan'name='Afghanistan'>Afghanistan</option>
<option value='Albania'name='Albania'>Albania</option>
<option value='Algeria'name='Algeria'>Algeria</option>
<option value='Andorra'name='Andorra'>Andorra</option>
<option value='Angola'name='Angola'>Angola</option>
<option value='Antigua and Bermuda'name='Antigua and Bermuda'>Antigua and Bermuda</option>
<option value='Argentina'name='Argentina'>Argentina</option>
<option value='Armenia'name='Armenia'>Armenia</option>
<option value='Australia'name='Australia'>Australia</option>
<option value='Austria'name='Austria'>Austria</option>
<option value='Azerbaijan'name='Azerbaijan'>Azerbaijan</option>
<option value='Bahamas'name='Bahamas'>Bahamas</option>
<option value='Bahrain'name='Bahrain'>Bahrain</option>
<option value='Bangladesh'name='Bangladesh'>Bangladesh</option>
<option value='Barbados'name='Barbados'>Barbados</option>
<option value='Belarus'name='Belarus'>Belarus</option>
<option value='Belgium'name='belgium'>Belgium</option>
<option value='Belize'name='Belize'>Belize</option>
<option value='Benin'name='Benin'>Benin</option>
<option value='Bhutan'name='Bhutan'>Bhutan</option>
<option value='Bolivia'name='Bolivia'>Bolivia</option>
<option value='Bosnia'name='Bosnia'>Bosnia</option>
<option value='Botswana'name='Botswana'>Botswana</option>
<option value='Brazil'name='Brazil'>Brazil</option>
<option value='Brunei'name='Brunei'>Brunei</option>
<option value='Bulgaria'name='Bulgaria'>Bulgaria</option>
<option value='Burkina Faso'name='Burkina Faso'>Burkina Faso</option>
<option value='Burma'name='Burma'>Burma</option>
<option value='Burundi'name='Burundi'>Burundi</option>
<option value='Cambodia'name='Cambodia'>Cambodia</option>
<option value='Cameroon'name='Cameroon'>Cameroon</option>
<option value='Canada'name='Canada'>Canada</option>
<option value='Cape Verde'name='Cape Verde'>Cape Verde</option>
<option value='Central African Republic'name='Central African Republic'>Central African Republic</option>
<option value='Chad'name='Chad'>Chad</option>
<option value='Chile'name='Chile'>Chile</option>
<option value='China'name='China'>China</option>
<option value='Colombia'name='Colombia'>Colombia</option>
<option value='Comoros'name='Comoros'>Comoros</option>
<option value='Congo(DRC)'name='Congo(DRC)'>Congo(DRC)</option>
<option value='Congo(republic)'name='Congo(republic)'>Congo(republic)</option>
<option value='Costa Rica'name='Costa Rica'>Costa Rica</option>
<option value='Croatia'name='Croatia'>Croatia</option>
<option value='Cuba'name='Cuba'>Cuba</option>
<option value='Cyprus'name='Cyprus'>Cyprus</option>
<option value='Czech'name='Czech'>Czech</option>
<option value='Denmark'name='Denmark'>Denmark</option>
<option value='Djibouti'name='Djibouti'>Djibouti</option>
<option value='Dominica'name='Dominica'>Dominica</option>
<option value='Dominician'name='Dominician'>Dominician</option>
<option value='East Timor'name='East Timor'>East Timor</option>
<option value='Ecuador'name='Ecuador'>Ecuador</option>
<option value='Egypt'name='Egypt'>Egypt</option>
<option value='El Savador'name='El Savador'>El Savador</option>
<option value='Equatorial Guinea'name='Equatorial Guinea'>Equatorial Guinea</option>
<option value='Estonia'name='Estonia'>Estonia</option>
<option value='Ethiopia'name='Ethiopia'>Ethiopia</option>
<option value='Fiji'name='Fiji'>Fiji</option>
<option value='Finland'name='Finland'>Finland</option>
<option value='France'name='France'>France</option>
<option value='Gabon'name='Gabon'>Gabon</option>
<option value='Gambia'name='Gambia'>Gambia</option>
<option value='Georgia'name='Georgia'>Georgia</option>
<option value='Germany'name='Germany'>Germany</option>
<option value='Ghana'name='Ghana'>Ghana</option>
<option value='Greece'name='Greece'>Greece</option>
<option value='Grenada'name='Grenada'>Grenada</option>
<option value='Guatemala'name='Guatemala'>Guatemala</option>
<option value='Guinea'name='Guinea'>Guinea</option>
<option value='Guinea Bissau'name='Guinea Bissau'>Guinea Bissau</option>
<option value='Guyana'name='Guyana'>Guyana</option>
<option value='Haiti'name='Haiti'>Haiti</option>
<option value='Holy See(Vatican)'name='Holy See(Vatican)'>Holy See(Vatican)</option>
<option value='Hondura'name='Hondura'>Hondura</option>
<option value='Hungary'name='Hungary'>Hungary</option>
<option value='Iceland'name='Iceland'>Iceland</option>
<option value='India'name='India'>India</option>
<option value='Indonesia'name='Indonesia'>Indonesia</option>
<option value='Iran'name='Iran'>Iran</option>
<option value='Iraq'name='Iraq'>Iraq</option>
<option value='Ireland'name='Ireland'>Ireland</option>
<option value='Israel'name='Israel'>Israel</option>
<option value='Italy'name='Italy'>Italy</option>
<option value='Ivory Coast'name='Ivory Coast'>Ivory Coast</option>
<option value='Jamaica'name='Jamaica'>Jamaica</option>
<option value='Japan'name='Japan'>Japan</option>
<option value='Jordan'name='Jordan'>Jordan</option>
<option value='Kazakhstan'name='Kazakhstan'>Kazakhstan</option>
<option value='Kenya'name='Kenya'>Kenya</option>
<option value='Kiribati'name='Kiribati'>Kiribati</option>
<option value='Korea(North)'name='Korea(North)'>Korea(North)</option>
<option value='Korea(South)'name='Korea(South)'>Korea(South)</option>
<option value='Kosov'name='Kosovo'>Kosovo</option>
<option value='Kyrgyzstan'name='Kyrgyzstan'>Kyrgyzstan</option>
<option value='Laos'name='Laos'>Laos</option>
<option value='Lativia'name='Lativia'>Lativia</option>
<option value='Lebanon'name='Lebanon'>Lebanon</option>
<option value='Lesotho'name='Lesotho'>Lesotho</option>
<option value='Liberia'name='Liberia'>Liberia</option>
<option value='Libya'name='Libya'>Libya</option>
<option value='Liechtenstein'name='Liechtenstein'>Liechtenstein</option>
<option value='Lithuania'name='Lithuania'>Lithuania</option>
<option value='Luxembourg'name='Luxembourg'>Luxembourg</option>
<option value='Macedonia'name='Macedonia'>Macedonia</option>
<option value='Madagascar'name='Madagascar'>Madagascar</option>
<option value='Malawi'name='Malawi'>Malawi</option>
<option value='Malaysia'name='Malaysia'>Malaysia</option>
<option value='Maldives'name='Maldives'>Maldives</option>
<option value='Mali'name='Mali'>Mali</option>
<option value='Malta'name='Malta'>Malta</option>
<option value='Marshall'name='Marshall'>Marshall</option>
<option value='Mauritania'name='Mauritania'>Mauritania</option>
<option value='Mauritius'name='Mauritius'>Mauritius</option>
<option value='Mexico'name='Mexico'>Mexico</option>
<option value='Micronesia'name='Micronesia'>Micronesia</option>
<option value='Moldova'name='Moldova'>Moldova</option>
<option value='Mongolia'name='Mongolia'>Mongolia</option>
<option value='Montenegro'name='Montenegro'>Montenegro</option>
<option value='Morocco'name='Morocco'>Morocco</option>
<option value='Mozambique'name='Mozambique'>Mozambique</option>
<option value='Namibia'name='Namibia'>Namibia</option>
<option value='Nauru'name='Nauru'>Nauru</option>
<option value='Netherlands'name='Netherlands'>Netherlands</option>
<option value='New Zealand'name='New Zealand'>New Zealand</option>
<option value='Nicaragua'name='Nicaragua'>Nicaragua</option>
<option value='Niger'name='Niger'>Niger</option>
<option value='Nigeria'name='Nigeria'>Nigeria</option>
<option value='Norway'name='Norway'>Norway</option>
<option value='Oman'name='Oman'>Oman</option>
<option value='Pakistan'name='Pakistan'>Pakistan</option>
<option value='Palau'name='Palau'>Palau</option>
<option value='Palestine'name='Palestine'>Palestine</option>
<option value='Panama'name='Panama'>Panama</option>
<option value='Papua'name='Papua'>Papua</option>
<option value='Paraguay'name='Paraguay'>Paraguay</option>
<option value='Peru'name='Peru'>Peru</option>
<option value='Philippines'name='Philippines'>Philippines</option>
<option value='Poland'name='Poland'>Poland</option>
<option value='Portugal'name='Portugal'>Portugal</option>
<option value='Romania'name='Romania>Romania</option>
<option value='Russia'name='Russia'>Russia</option>
<option value='Rwanda'name='Rwanda'>Rwanda</option>
<option value='Saint Kitts'name='Saint Kitts'>Saint Kitts</option>
<option value='Saint Lucia'name='Saint Lucia'>Saint Lucia</option>
<option value='Saint Vincent'name='Saint Vincent'>Saint Vincent</option>
<option value='Samoa'name='Samoa'>Samoa</option>
<option value='San Marino'name='San Marino'>San Marino</option>
<option value='Sao Tome and Principe'name='Sao Tome and Principe'>Sao Tome and Principe</option>
<option value='Saudi Arabia'name='Saudi Arabia'>Saudi Arabia</option>
<option value='Senegal'name='Senegal'>Senegal</option>
<option value='Serbia'name='Serbia'>Serbia</option>
<option value='Seychelles'name='Seychelles'>Seychelles</option>
<option value='Sierra Leone'name='Sierra Leone'>Sierra Leone</option>
<option value='Singapore'name='Singapore'>Singapore</option>
<option value='Slovakia'name='Slovakia'>Slovakia</option>
<option value='Slovenia'name='Slovenia'>Slovenia</option>
<option value='Solomon Island'name='Solomon Island'>Solomon Island</option>
<option value='Somalia'name='Somalia'>Somalia</option>
<option value='South Africa'name='South Africa'>South Africa</option>
<option value='South Sudan'name='South Sudan'>South Sudan</option>
<option value='Spain'name='Spain'>Spain</option>
<option value='Sri Lanka'name='Sri Lanka'>Sri Lanka</option>
<option value='Sudan'name='Sudan'>Sudan</option>
<option value='Swaziland'name='Swaziland'>Swaziland</option>
<option value='Sweden'name='Sweden'>Sweden</option>
<option value='Switzeland'name='Switzeland'>Switzeland</option>
<option value='Syria'name='Syria'>Syria</option>
<option value='Tajikistan'name='Tajikistan'>Tajikistan</option>
<option value='Thailand'name='Thailand'>Thailand</option>
<option value='Togo'name='Togo'>Togo</option>
<option value='Tonga'name='Tonga'>Tonga</option>
<option value='Trinidad'name='Trinidad'>Trinidad</option>
<option value='Tunisia'name='Tunisia'>Tunisia</option>
<option value='Turkey'name='Turkey'>Turkey</option>
<option value='Turkmenistan'name='Turkmenistan'>Turkmenistan</option>
<option value='Tuvalu'name='Tuvalu'>Tuvalu</option>
<option value='Uganda'name='Uganda'>Uganda</option>
<option value='Ukraine'name='Ukraine'>Ukraine</option>
<option value='United Arab Emirates'name='United Arab Emirates'>United Arab Emirates</option>
<option value='United Kingdom'name='United Arab Emirates'>United Arab Emirates</option>
<option value='United States Of America'name='United States Of America'>United States Of America</option>
<option value='Uruguay'name='Uruguay'>Uruguay</option>
<option value='Vanuatu'name='Vanuatu'>Vanuatu</option>
<option value='Venezuela'name='Venezuela'>Venezuela</option>
<option value='Vietnam'name='Vietnam'>Vietnam</option>
<option value='Yemen'name='Yemen'>Yemen</option>
<option value='Zambia'name='Zambia'>Zambia</option>
<option value='Zimbabwe'name='Zimbabwe'>Zimbabwe</option>
</select><br>
 
  <input type='submit' id='submit' value='save'>";
}
?></td><td width="25%"></td></tr></table></body></html>