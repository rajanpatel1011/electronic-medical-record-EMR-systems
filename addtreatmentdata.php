<?php

if(count($_POST)>0) {

$patientid=$_POST['patient_id'];


$conn = mysql_connect("localhost","root","");
mysql_select_db("acharya",$conn);

$record_id_result=mysql_query("select count(treat_id) as COUNT from treatment where patient_id=$patientid");
$row= mysql_fetch_array($record_id_result);
$record_id=$row['COUNT']+1;
//echo $record_id;



$query="INSERT INTO treatment 
values('" .$record_id. "', '" .$_POST['t_id']. "', '" . $_POST['emp_id']. "', '" . $patientid. "','" . $_POST['t_date']. "', '" . $_POST['remarks']. "')";

$result = mysql_query($query);
		if(!empty($result)) {
			echo "1";	
			header("Location:patient_details.php");
		} else {
			echo "0";	
		}

}
else{
	echo "0";
}




?>