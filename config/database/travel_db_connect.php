<?php
define('DB_USER','amn_ziara');
define('DB_HOST','localhost');
define('DB_PASS','Ziara2015');
define('DB_NAME','amn_travel');
$link = mysql_connect(DB_HOST,DB_USER,DB_PASS);
if(!$link)
{
die('cannot connect:'.mysql_error());
}
$db_selected = mysql_select_db(DB_NAME,$link);
if(!$db_selected)
{
die('cannot use:'.DB_NAME.':'.mysql_error());
}
?>