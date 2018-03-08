<?php
error_reporting(0);

if(count($_GET)>0) {
$un=$_GET['username'];
$pwd=$_GET['password'];

$conn = mysql_connect("localhost","root","");
mysql_select_db("acharyadb",$conn);
$result = mysql_query("SELECT * FROM employee WHERE email='" . $un . "' and password = '". $pwd ."'");
$row  = mysql_fetch_array($result);


if(is_array($row)) {
	echo $row['emp_id'];

} 
else {
	echo "0";
}
}


?>
