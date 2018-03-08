<?php
error_reporting(0);

if(count($_GET)>0) {
$empid=$_GET['emp_id'];

$conn = mysql_connect("localhost","root","");
mysql_select_db("acharyadb",$conn);
$result = mysql_query("SELECT * FROM employee WHERE emp_id='" . $empid  ."'");
$row  = mysql_fetch_array($result);


if(is_array($row)) {
	
	$json['emp_id']=$row['emp_id'];
	$json['name']=$row['name'];
	$json['salary']=$row['salary'];
	$json['category']=$row['category'];
	$json['email']=$row['email'];
	$json['password']=$row['password'];
	$json['phone_no']=$row['phone_no'];
	$json['qualification']=$row['qualification'];
	$json['specialization']=$row['specialization'];

	echo json_encode($json);

} 
else {
	echo "0";
}
}
	


?>