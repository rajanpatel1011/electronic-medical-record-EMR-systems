<?php

if(count($_POST)>0) {

$patientid=$_POST['patient_id'];


$conn = mysql_connect("localhost","root","");
mysql_select_db("acharya",$conn);

$record_id_result=mysql_query("select count(med_id) as COUNT from medicine where patient_id=$patientid");
$row= mysql_fetch_array($record_id_result);
$record_id=$row['COUNT']+1;
echo $record_id;



$query="INSERT INTO medicine (`med_id`, `med_name`, `patient_id`, `emp_id`, `med_date`,`quantity`, `remarks`) 
values('" .$record_id. "', '" .$_POST['med_name']. "', '" . $_POST['patient_id']. "', '" .$_POST['emp_id']. "','" . $_POST['med_date']. "', '" . $_POST['quantity']. "', '" .$_POST['remarks']. "')";

$result = mysql_query($query);
		if(!empty($result)) {
			echo "1";	
		} else {
			echo "0";	
		}

}
else{
	echo "0";
}


	header("Location:patient_details.php");

?>