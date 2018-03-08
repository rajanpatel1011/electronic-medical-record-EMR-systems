<?php
error_reporting(0);

if(count($_GET)>0) {
$patientid=$_GET['patient_id'];

$conn = mysql_connect("localhost","root","");
mysql_select_db("acharyadb",$conn);
$result = mysql_query("SELECT * FROM patient WHERE patient_id='" . $patientid  ."'");
$row  = mysql_fetch_array($result);


if(is_array($row)) {
	
	$json['patient_id']=$row['patient_id'];
	$json['name']=$row['name'];
	$json['sex']=$row['sex'];
	$json['category']=$row['category'];
	$json['admission_date']=$row['admission_date'];
	$json['discharge_date']=$row['discharge_date'];
	$json['address']=$row['address'];
	$json['age']=$row['age'];
	$json['email']=$row['email'];

	echo json_encode($json);

} 
else {
	echo "0";
}
}
	


?>