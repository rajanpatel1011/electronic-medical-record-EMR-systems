<?php
error_reporting(0);



$conn = mysql_connect("localhost","root","");
mysql_select_db("acharyadb",$conn);
$result = mysql_query("select count(patient_id) as COUNT from patient");
$row  = mysql_fetch_array($result);


if(is_array($row)) {
	
	$json['count']=$row['COUNT'];

	echo json_encode($json);

} 
else {
	echo "0";
}


?>