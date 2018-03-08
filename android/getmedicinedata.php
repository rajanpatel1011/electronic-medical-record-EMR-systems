<?php
error_reporting(0);

if(count($_GET)>0) {
$patientid=$_GET['patient_id'];

$conn = mysql_connect("localhost","root","");
mysql_select_db("acharyadb",$conn);
$result = mysql_query("SELECT * FROM medicine WHERE patient_id='" . $patientid ."order by med_id" ."'");
$i=0;

if(sizeof($result)>0){

	while($row=mysql_fetch_array($result)){ 

		$data['med_id']=$row['med_id'];
		$data['med_name']=$row['med_name'];
		$data['quantity']=$row['quantity'];
		$data['total']=$row['total'];
		$data['med_date']=$row['med_date'];
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