<?php
error_reporting(0);	

if(count($_GET)>0) {
$patientid=$_GET['patient_id'];

$conn = mysql_connect("localhost","root","");
mysql_select_db("acharyadb",$conn);
$result = mysql_query("SELECT * FROM diagnosis WHERE patient_id='" . $patientid ."order by diag_id " ."'");
$i=0;

if(sizeof($result)>0){

	while($row=mysql_fetch_array($result)){ 

		$data['diag_id']=$row['diag_id'];
		$data['name']=$row['name'];
		$data['price']=$row['price'];
		$data['date']=$row['date'];
		$data['remarks']=$row['remarks'];
		$json[$i]=$data;
		$i++;
	}
	echo json_encode($json);
}
else{
	echo "0";
}

}



?>