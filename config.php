<?php
$SETTINGS["hostname"]='localhost';
$SETTINGS["mysql_user"]='root';
$SETTINGS["mysql_pass"]='';
$SETTINGS["mysql_database"]='acharya';
$SETTINGS["data_table"]='patient';
$SETTINGS["emp_table"]='employee';
$SETTINGS["t_table"]='avail_treatment';
$SETTINGS["d_table"]='avail_diagnosis';

/* Connect to MySQL */

if (!isset($install) or $install != '1') {
	$connection = mysql_connect($SETTINGS["hostname"], $SETTINGS["mysql_user"], $SETTINGS["mysql_pass"]) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your MySQL login details are correct.');
	$db = mysql_select_db($SETTINGS["mysql_database"], $connection) or die ('request "Unable to select database."');
};
?>