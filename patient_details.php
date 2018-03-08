<?php
error_reporting(0);
include("config.php");
session_start();
//if(!isset($_SESSION["patient_idd"])){
//$uname = $_SESSION["user_name"];
//	$pid = $_SESSION["patient_idd"];
//	$pidrec = $_SESSION["patient_id"];
//}
//if((!isset($_SESSION["user_id"])) || $_SESSION["category"]!="r")
	if(!isset($_SESSION["user_id"])){
	header("Location:login.php");
		
	}
	
	if($_SESSION["category"] == "d")
		{
			$uname = $_SESSION["user_name"];
			$pid = $_SESSION["patient_idd"];
		}	
	if($_SESSION["category"] == "r")
		{
			$uname = $_SESSION["user_name"];
			$pid = $_SESSION["patient_id"];
		}		

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="layout.css">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>Acharya Neurology Clinic</title><meta charset='utf-8'>
   <style>
.msg {color: #008000;font-weight: bold;text-align: center;width: 100%;padding: 10;}
.message {color: #FF0000;font-weight: bold;text-align: center;width: 100%;padding: 10;}
.demo-table {background-color:rgba(0,161,203,0.99);width: 100%;border-spacing: initial;margin: 10px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color: #FDFDFD !important;}
.demo-table td {padding: 2px 2px 2px 2px; font-weight:bold;}
.demoInputBox {padding: 7px;border: #F0F0F0 1px solid;border-radius: 4px;}
.btnRegister {padding: 15px;background-color: #000000;border: 0;font-weight:bold;color: #FFF;cursor: pointer;
}
</style>
</head>
<body>
<div class="blended_grid">
<div class="pageHeader" style="color:#FFFFFF">
<br>
<center><h1>Acharya Neurology Clinic</h1></center>
</div>
<div class="pageLeftMenu">
<?php 
	if($_SESSION["category"] == "d")
		{
			include("sidebar_patient.php");
		}	
	if($_SESSION["category"] == "r")
		{
			include("sidebar_receptionist.php");
		}						
?>
</div>
<div class="pageContent">
<div align="center">Patient Id: <?php echo $pid;?> </div>
<br /><center>
<div>
<?php
$sql = "SELECT * FROM patient WHERE patient_id = '$pid'";
	$sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
		//if (mysql_num_rows($sql_result)>0) {
		while ($row = mysql_fetch_assoc($sql_result)) {

?>
<form name="registration" method="post" action="">
<table border="1" cellspacing="2" cellpadding="8" class="demo-table">
<!--  <table border="1" cellspacing="2" cellpadding="8" >-->
  <tr>
        <td width="90" height="37" bgcolor="#CCCCCC"><strong><center>Patient id</center></strong></td>
    <td width="120" bgcolor="#CCCCCC"><strong><center>Name</center></strong></td>
    <td width="30" bgcolor="#CCCCCC"><strong><center>Sex</center></strong></td>
    <td width="80" bgcolor="#CCCCCC"><strong><center>category</center></strong></td>
    <td width="95" bgcolor="#CCCCCC"><strong><center>Admission Date</center></strong></td>
    <td width="95" bgcolor="#CCCCCC"><strong><center>Discharge date</center></strong></td>
    <td width="159" bgcolor="#CCCCCC"><strong><center>Address</center></strong></td>
    <td width="25" bgcolor="#CCCCCC"><strong><center>Age</center></strong></td>
    <td width="130" bgcolor="#CCCCCC"><strong><center>Email</center></strong></td>
  </tr>
<tr>
    <td width="90" align="center" height="30px"><?php echo $row["patient_id"]; ?></td>
    <td width="120"><?php echo $row["name"]; ?></td>
    <td width="30" align="center"><?php echo $row["sex"]; ?></td>
    <td width="80" align="center"><?php echo $row["category"]; ?></td>
    <td width="95" align="center"><?php echo $row["admission_date"]; ?></td>
    <td width="95" align="center"><?php echo $row["discharge_date"]; ?></td>
    <td width="159"><?php echo $row["address"]; ?></td>
	<td width="25" align="center"><?php echo $row["age"]; ?></td>
    <td width="130" ><?php echo $row["email"]; ?></td>
  </tr>

  </table>

<?php
		}
		?>        
	<p>&nbsp;</p>
</form>
</div>
<div>
<h2><center>Diagnosis Details</center></h2>
	<p>&nbsp;</p>
<table border="1" cellspacing="2" cellpadding="8"  width="100%" >
<tr>
    <td width="90" bgcolor="#CCCCCC"><strong><center>Diagnosis ID</center></strong></td>
    <td width="90" bgcolor="#CCCCCC"><strong><center>Diagnosis Name</center></strong></td>    
    <td width="90" bgcolor="#CCCCCC"><strong><center>Doctor ID</center></strong></td>
    <td width="80" bgcolor="#CCCCCC"><strong><center>Price</center></strong></td>
    <td width="95" bgcolor="#CCCCCC"><strong><center>Date</center></strong></td>
    <td width="159" bgcolor="#CCCCCC"><strong><center>Remarks</center></strong></td>
  </tr>
  </table>
<?php
$sql = "SELECT * FROM diagnosis WHERE patient_id = '$pid'";
	$sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
		//if (mysql_num_rows($sql_result)>0) {
		while ($row = mysql_fetch_assoc($sql_result)) {

?>
<form name="registration1" method="post" action="">
<table border="1" cellspacing="2" cellpadding="8"  width="100%" >
<!--  <table border="1" cellspacing="2" cellpadding="8" >-->
  
<tr>
    <td width="90"  align="center"><?php echo $row["diag_id"]; 
	$diagnosis_id=$row["diag_id"];
	?></td>
    <td width="90" align="center"><?php
	$sql2 = "SELECT d_name FROM avail_diagnosis WHERE d_id = '$diagnosis_id'";
	$sql_result2 = mysql_query ($sql2) or die ('request "Could not execute SQL query" '.$sql2);
		//if (mysql_num_rows($sql_result)>0) {
		while ($row2 = mysql_fetch_assoc($sql_result2)) {
	
	 echo $row2["d_name"]; ?></td>
     <?php
		}
		?> 
            <td width="90"><?php echo $row["emp_id"]; ?></td>
    <td width="80" align="center"><?php 
	$sql1 = "SELECT price FROM avail_diagnosis WHERE d_id = '$diagnosis_id'";
	$sql_result1 = mysql_query ($sql1) or die ('request "Could not execute SQL query" '.$sql1);
		//if (mysql_num_rows($sql_result)>0) {
		while ($row1 = mysql_fetch_assoc($sql_result1)) {			
	echo $row1["price"]; ?></td>
         <?php
		}
		?> 
    <td width="95" align="center"><?php echo $row["date"]; ?></td>
    <td width="159"><?php echo $row["remarks"]; ?></td>
  </tr>

  </table>
<?php
		}
		?>        
</form>
</div>
<p>&nbsp;</p>
<div>
<h2><center>Treatment Details</center></h2>
	<p>&nbsp;</p>
<table border="1" cellspacing="2" cellpadding="8"   width="100%">
<tr>
    <td width="90" bgcolor="#CCCCCC"><strong><center>Treatment ID</center></strong></td>
    <td width="90" bgcolor="#CCCCCC"><strong><center>Treatment Name</center></strong></td>
    <td width="90" bgcolor="#CCCCCC"><strong><center>Doctor ID</center></strong></td>
    <td width="90" bgcolor="#CCCCCC"><strong><center>price</center></strong></td>
    <td width="80" bgcolor="#CCCCCC"><strong><center>Treatment date</center></strong></td>
    <td width="159" bgcolor="#CCCCCC"><strong><center>Remarks</center></strong></td>
  </tr>
  </table>
<?php
$sql = "SELECT * FROM treatment WHERE patient_id = '$pid'";
	$sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
		//if (mysql_num_rows($sql_result)>0) {
		while ($row = mysql_fetch_assoc($sql_result)) {

?>
<form name="registration2" method="post" action="">
<table border="1" cellspacing="2" cellpadding="8"   width="100%">
<!--  <table border="1" cellspacing="2" cellpadding="8" >-->
  
<tr>
    <td width="90" align="center"><?php echo $row["t_id"]; 
$treatment_id=$row["t_id"];	
	?></td>
    <td width="90"><?php 
		$sql2 = "SELECT t_name FROM avail_treatment WHERE t_id = '$treatment_id'";
	$sql_result2 = mysql_query ($sql2) or die ('request "Could not execute SQL query" '.$sql2);
		//if (mysql_num_rows($sql_result)>0) {
		while ($row2 = mysql_fetch_assoc($sql_result2)) {
	
	echo $row2["t_name"]; ?></td>
         <?php
		}
		?> 
        <td width="90"><?php echo $row["emp_id"]; ?></td>
    <td width="80" align="center"><?php
	$sql1 = "SELECT price FROM avail_treatment WHERE t_id = '$treatment_id'";
	$sql_result1 = mysql_query ($sql1) or die ('request "Could not execute SQL query" '.$sql1);
		//if (mysql_num_rows($sql_result)>0) {
		while ($row1 = mysql_fetch_assoc($sql_result1)) {
	
	 echo $row1["price"]; ?></td>
     <?php
		}
		?> 
    <td width="95" align="center"><?php echo $row["t_date"]; ?></td>
    <td width="159"><?php echo $row["remarks"]; ?></td>
  </tr>

  </table>
<?php
		}
		?>        
</form>
</div>
<p>&nbsp;</p>
<div>
<h2><center>Medicine Details</center></h2>
	<p>&nbsp;</p>
<table border="1" cellspacing="2" cellpadding="8" width="100%" >
<tr>
    <td width="90" bgcolor="#CCCCCC"><strong><center>Medicine ID</center></strong></td>
    <td width="90" bgcolor="#CCCCCC"><strong><center>Medicine Name</center></strong></td>
    <td width="90" bgcolor="#CCCCCC"><strong><center>Doctor ID</center></strong></td>
    <td width="90" bgcolor="#CCCCCC"><strong><center>Medicine Date</center></strong></td>
    <td width="90" bgcolor="#CCCCCC"><strong><center>Price</center></strong></td>
    <td width="80" bgcolor="#CCCCCC"><strong><center>Quantity</center></strong></td>
    <td width="159" bgcolor="#CCCCCC"><strong><center>Remarks</center></strong></td>
  </tr>
  </table>
<?php
$sql = "SELECT * FROM medicine WHERE patient_id = '$pid'";
	$sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
		//if (mysql_num_rows($sql_result)>0) {
		while ($row = mysql_fetch_assoc($sql_result)) {

?>
<form name="registration2" method="post" action="">
<table border="1" cellspacing="2" cellpadding="8"  width="100%">
<!--  <table border="1" cellspacing="2" cellpadding="8" >-->
  
<tr>
    <td width="90" align="center"><?php echo $row["med_id"]; ?></td>
    <td width="90"><?php echo $row["med_name"]; ?></td>
        <td width="90"><?php echo $row["emp_id"]; ?></td>
    <td width="80" align="center"><?php echo $row["med_date"]; ?></td>
    <td width="95" align="center"><?php echo $row["price"]; ?></td>
    <td width="95" align="center"><?php echo $row["quantity"]; ?></td>
    <td width="159"><?php echo $row["remarks"]; ?></td>
  </tr>

  </table>
<?php
		}
		?>        
</form>
</div>

</div>
</div>
</body>
</html>