<?php
error_reporting(0);
include("config.php");
session_start();
if(count($_POST)>0) {

$patientid=$_POST['patient_id'];


$conn = mysql_connect("localhost","root","");
mysql_select_db("acharya",$conn);

$record_id_result=mysql_query("select count(diag_id) as COUNT from diagnosis where patient_id=$patientid");
$row= mysql_fetch_array($record_id_result);
$record_id=$row['COUNT']+1;
//echo $record_id;
//echo $patientid. " / "; 
//echo $record_id. " / ";
//echo $_POST['d_id']. " / ";
//echo $_POST['date']. " / ";
//echo $_POST['remarks']. " / ";
//echo $_POST['emp_id']. " / ";

$query="INSERT INTO diagnosis 
values( '" . $_POST['d_id']. "', '" .$record_id. "','" .$patientid. "', '" . $_POST['date']. "', '" . $_POST['remarks']. "','" . $_POST['emp_id']. "')";

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