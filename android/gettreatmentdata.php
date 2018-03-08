<?php


error_reporting(0);

if(count($_GET)>0) {
$patientid=$_GET['patient_id'];

$conn = mysql_connect("localhost","root","");
mysql_select_db("acharyadb",$conn);
$result = mysql_query("SELECT * FROM treatment WHERE patient_id='" . $patientid ."order by t_id " ."'");


$i=0;

	while($row=mysql_fetch_array($result)){ 

		$data['t_id']=$row['t_id'];
		$data['t_name']=$row['t_name'];
		$data['emp_id']=$row['emp_id'];						//the doctor who has done the treatment appears here
		$data['price']=$row['price'];
		$data['t_date']=$row['t_date'];
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