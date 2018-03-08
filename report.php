<?php
error_reporting(0);
include("config.php");
session_start();
if(!isset($_SESSION["user_id"])){
	header("Location:login.php");	
	}
	$pid = $_SESSION["patient_id"];	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report</title>
<style>
th{font-weight:normal;}
th label{padding-top:14px;}
</style>
</head>

<body>
<?php 
	$sql = "SELECT patient_id, name, sex, admission_date, address, dob, email, phone_no, height, weight, emp_id FROM patient WHERE patient_id = '$pid'";
	$sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
		while ($row = mysql_fetch_assoc($sql_result)) {
        ?>
<form action="" method="post">
<?php $emp = $row["emp_id"]; 
?>
<table width="90%" height="100" border="0" align="center">
	<tr>
	<td colspan="5"><img src="acharya Letter Head.png"></td></tr>
  <tr>
    <th width="146" height="43" scope="col"><div align="left">Patient Id :</div></th>
    <th width="288" scope="col"><div align="left"><?php echo $row["patient_id"]; ?></div></th>
    <th width="67" scope="col">&nbsp;</th>
    <th width="145" scope="col"><div align="left">Patient Name:</div></th>
    <th width="288" scope="col"><div align="left"><?php echo $row["name"]; ?></div></th>
    </tr>
  <tr>
    <th scope="row"><div align="left">Phone No:</div></th>
    <th width="288" scope="col"><label>
      <div align="left"><?php echo $row["phone_no"]; ?></div>
    </label></th>
    <td>&nbsp;</td>
    <td><div align="left"> Sex :</div></td>
    <th width="288" scope="col"><label>
      <div align="left"><?php echo $row["sex"]; ?></div>
    </label></th>
    </tr>
  <tr>
    <th scope="row"><div align="left"> Address :</div></th>
    <th width="288" scope="col"><label>
      <div align="left"><?php echo $row["address"]; ?></div>
    </label>
      </th>
    <td>&nbsp;</td>
    <td><div align="left"> Email Id: </div></td>
    <th width="288" scope="col"><label>
      <div align="left"><?php echo $row["email"]; ?></div>
    </label></th>
    </tr>
  <tr>
    <th scope="row"><div align="left"> Height :</div></th>
    <th width="288" scope="col"><label>
      <div align="left"><?php echo $row["height"]; ?></div>
    </label></th>
    <td>&nbsp;</td>
    <td><div align="left"> DOB: </div></td>
    <th width="288" scope="col"><label>
      <div align="left"><?php echo $row["dob"]; ?></div>
    </label>      </th>
    </tr>
  <tr>
    <th scope="row"><div align="left"> Weight :</div></th>
    <th width="288" scope="col"><label>
      <div align="left"><?php echo $row["weight"]; ?></div>
    </label></th>
    <td>&nbsp;</td>
    <td><div align="left"> Admission Date :</div></td>
    <th width="288" scope="col"><label>
      <div align="left"><?php echo $row["admission_date"]; ?></div>
    </label></th>
    </tr>
  <tr>
    <th scope="row"><div align="left">Doctor Name:</div></th>
    <?php 
	$sql = "SELECT name FROM employee WHERE emp_id = '$emp'";
	$sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
		while ($row = mysql_fetch_assoc($sql_result)) {
	?>
    <th width="288" scope="col"><label>
      <div align="left"><?php echo $row["name"]; ?></div>
    </label></th>
      <?php
		}
	  ?>
    <td>&nbsp;</td>
    <td><div align="left"> Discharge Date :</div></td>
    <th width="288" scope="col"><label>
      <div align="left"><?php
	   
	$sql1 = "SELECT discharge_date FROM patient WHERE patient_id = '$pid'";
	$sql_result1 = mysql_query ($sql1) or die ('request "Could not execute SQL query" '.$sql1);
		while ($row1 = mysql_fetch_assoc($sql_result1)) {
        
	   echo $row1["discharge_date"]; ?></div>
       <?php
		}
	   ?>
    </label>
      <div align="left">&nbsp;</div></th>
    </tr>
  <tr>
    <th height="23" scope="row">&nbsp;</th>
    <th width="288" scope="col"><label></label>
      &nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
<?php
		}
?>
</form>
<br /><hr/><div style="background-color: #e8e8e8;font-family: 'Oswald', sans-serif;font-size:30px"><center>REPORT</center></div><hr /> <br />
<form action="" method="post">
<table width="90%" border="0" align="center">
  <tr>
    <th width="21%" align="left" scope="col">Diagnosis Information</th>
    <th width="79%" align="left" scope="col"><label></label>&nbsp;</th>
  </tr>
  </table><br />
	
		

  <?php
  	$sql = "select diagnosis.d_id, diagnosis.date, diagnosis.remarks, avail_diagnosis.d_name from diagnosis INNER JOIN avail_diagnosis ON diagnosis.d_id=avail_diagnosis.d_id where patient_id = '$pid'";
	$sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
		while ($row = mysql_fetch_assoc($sql_result)) {		
	?> 
<table width="80%" border="0" align="center">
 
<tr>
  <td width="17%" align="left"> Diagnosis Name: :</td>
  <td width="83%" align="left">
  <?php
		echo $row["d_name"];	
		?>
    </td>    
    </tr>         
    <tr>
      <td align="left"> Diagnosis Date: </td>
    <td align="left"> <?php echo $row["date"]; ?> </td></tr>
    <tr>
      <td align="left"> Remarks: </td>
    <td align="left"> <?php echo $row["remarks"]; ?> </td></tr>

</table>
<br />
<?php
		}
?>


</form>
<br /> <hr /> <br />
<form action="" method="post">


<table width="90%" border="0" align="center">
  <tr>
    <th width="21%" align="left" scope="col">Treatment Information</th>
    <th width="79%" align="left" scope="col"><label></label>&nbsp;</th>
  </tr></table>
    <?php
  	$sql = "select treatment.t_id, treatment.t_date, treatment.remarks, avail_treatment.t_name from treatment INNER JOIN avail_treatment ON treatment.t_id=avail_treatment.t_id where patient_id = '$pid'";
	$sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
		while ($row = mysql_fetch_assoc($sql_result)) {		
	?> 
    <table width="80%" border="0" align="center">
<tr>
  <td width="17%" align="left"> Treatment Name: :</td>
  <td width="83%" align="left"> <?php echo $row["t_name"]; ?> </td></tr>    
    <tr>
      <td align="left"> Treatment Date: </td>
    <td align="left"> <?php echo $row["t_date"]; ?> </td></tr>
    <tr>
      <td align="left"> Remarks: </td>
    <td align="left"> <?php echo $row["remarks"]; ?> </td></tr>
    <br />
</table>
<?php
		}
?>

</form>
<br /> <hr /> <br />
<form action="" method="post">


<table width="90%" border="0" align="center">
  <tr>
    <th width="21%" align="left" scope="col">Medicine Information</th>
    <th width="79%" align="left" scope="col"><label></label>&nbsp;</th>
  </tr></table>
 <?php 
	$sql = "SELECT med_name,med_date,remarks FROM medicine WHERE patient_id = '$pid'";
	$sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
		while ($row = mysql_fetch_assoc($sql_result)) {
	?>
    <table width="80%" border="0" align="center">
<tr>
  <td width="17%" align="left"> Medicine Name: :</td>
  <td width="83%" align="left"> <?php echo $row["med_name"]; ?> </td></tr>    
    <tr>
      <td align="left"> Medicine Date: </td>
    <td align="left"> <?php echo $row["med_date"]; ?> </td></tr>
    <tr>
      <td align="left"> Remarks: </td>
    <td align="left"> <?php echo $row["remarks"]; ?> </td></tr>
    <br />
</table>
<?php
		}
?>
<button onclick="window.print()" style="position:relative;left:1000px;">Print</button>
</form>
</body>
</html>