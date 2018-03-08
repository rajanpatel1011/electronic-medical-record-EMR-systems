<?php
error_reporting(0);

if(count($_GET)>0) {
$patientid=$_GET['patient_id'];

$conn = mysql_connect("localhost","root","");
mysql_select_db("acharyadb",$conn);
$result = mysql_query("SELECT * FROM bedside_record WHERE patient_id='" . $patientid ."order by record_id " ."'");


$i=0;

	while($row=mysql_fetch_array($result)){ 

		$data['record_id']=$row['record_id'];
		$data['patient_id']=$row['patient_id'];
		$data['emp_id']=$row['emp_id'];						//the nurse who has updated the record
		$data['medicine']=$row['medicine'];
		$data['temp']=$row['temp'];
		$data['bpm']=$row['bpm'];
		$data['bp_low']=$row['bp_high'];
		$data['water']=$row['water'];
		$data['rec_date']=$row['rec_date'];
		$data['rec_time']=$row['rec_time'];
		$data['stool']=$row['stool'];
		$data['remarks']=$row['remarks'];
		$json[$i]=$data;
		$i++;
	}
	echo json_encode($json);
}
else{
	echo "0";
}




?>