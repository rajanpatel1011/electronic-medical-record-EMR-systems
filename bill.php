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
<title>Bill</title>
<style>
th{font-weight:normal;}
th label{padding-top:14px;}
</style>
</head>

<body>
<?php 
	$sql = "SELECT patient_id, name, sex, admission_date, discharge_date, address, dob, email, phone_no, height, weight, emp_id FROM patient WHERE patient_id = '$pid'";
	$sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
		while ($row = mysql_fetch_assoc($sql_result)) {
        ?>
<form action="" method="post">
<?php $emp = $row["emp_id"]; 
?>
<table width="70%" height="100" border="0" align="center">
<tr>
	<td colspan="5"><img src="acharya Letter Head.png"></td></tr>
  <tr>
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
      <div align="left"><?php echo $row["admission_date"]; 
	  ?></div>
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
        
	   echo $row1["discharge_date"]; 
	   $discharge_date = $row1["discharge_date"]; 
	   $date1=date_create($row["admission_date"]);
$date2=date_create($row1["discharge_date"]);
$diff=date_diff($date1,$date2);
	   ?></div>
       <?php
		}
	   ?></div>
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
<br /><hr/><div style="background-color: #e8e8e8;font-family: 'Oswald', sans-serif;font-size:30px"><center>BILL</center></div> <hr /> <br />
<table width="70%" border="0" align="center">
  <tr>
    <th width="21%" align="left" scope="col"><strong>Diagnosis:</strong></th>
    <th width="79%" align="left" scope="col"><label></label>&nbsp;</th>
  </tr>
  </table><br />

<table width="70%" border="0" align="center">
<tr>
    <td width="23%" align="left"> Diagnosis Date: </td> 
  <td width="24%" align="left"> Diagnosis Name:</td>
      <td width="16%" align="left"> Price: </td>
      <td width="18%" align="left"> Quantity: </td>
      <td width="19%" align="left"> Amount: </td>
</tr>

   
 <?php 
	$sql = "SELECT d_id, date FROM diagnosis WHERE patient_id = '$pid'";
	$sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
		while ($row = mysql_fetch_assoc($sql_result)) {
	?>
 <tr> <td width="24%" align="left"> <?php
 $d_idbill = $row["d_id"];
  echo $row["date"]; ?> </td>   

   <?php 
	$sql1 = "SELECT d_id,d_name FROM avail_diagnosis WHERE d_id = '$d_idbill'";
	$sql_result1 = mysql_query ($sql1) or die ('request "Could not execute SQL query" '.$sql1);
		while ($row1 = mysql_fetch_assoc($sql_result1)) {
	?>   
    <td width="23%" align="left"> <?php echo $row1["d_name"]; ?> </td>
<?php
		}
?> 
 <?php 
	$sql2 = "SELECT d_id, price FROM avail_diagnosis WHERE d_id = '$d_idbill'";
	$sql_result2 = mysql_query ($sql2) or die ('request "Could not execute SQL query" '.$sql2);
		while ($row2 = mysql_fetch_assoc($sql_result2)) {
	?>
    <td width="16%" align="left"> <?php echo "Rs.".$row2["price"]; 
	$pricebill = $row2["price"]; 
	?> </td>
    <?php  $total1 = $total1 + $pricebill; ?>
<?php
		}
?>            

    <td width="18%" align="left"> <?php echo "-"; ?> </td>
         
    <td width="19%" align="left"> <?php echo "Rs.".$pricebill;  ?> </td></tr>
     
<?php
		}
?>  
      </table>


<br />

</form>

<table width="70%" border="0" align="center">
  <tr>
    <th width="21%" align="left" scope="col"><strong>Treatment:</strong></th>
    <th width="79%" align="left" scope="col"><label></label>&nbsp;</th>
  </tr>
  </table><br />

<table width="70%" border="0" align="center">
<tr>
    <td width="23%" align="left"> Treatment Date: </td> 
  <td width="24%" align="left"> Treatment Name:</td>
      <td width="16%" align="left"> Price: </td>
      <td width="18%" align="left"> Quantity: </td>
      <td width="19%" align="left"> Amount: </td>
</tr>

   
 <?php 
	$sql = "SELECT t_id, t_date FROM treatment WHERE patient_id = '$pid'";
	$sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
		while ($row = mysql_fetch_assoc($sql_result)) {
	?>
 <tr> <td width="24%" align="left"> <?php
 $t_idbill = $row["t_id"];
  echo $row["t_date"]; ?> </td>   

   <?php 
	$sql1 = "SELECT t_id,t_name FROM avail_treatment WHERE t_id = '$t_idbill'";
	$sql_result1 = mysql_query ($sql1) or die ('request "Could not execute SQL query" '.$sql1);
		while ($row1 = mysql_fetch_assoc($sql_result1)) {
	?>   
    <td width="23%" align="left"> <?php echo $row1["t_name"]; ?> </td>
<?php
		}
?> 
 <?php 
	$sql2 = "SELECT t_id, price FROM avail_treatment WHERE t_id = '$t_idbill'";
	$sql_result2 = mysql_query ($sql2) or die ('request "Could not execute SQL query" '.$sql2);
		while ($row2 = mysql_fetch_assoc($sql_result2)) {
	?>
    <td width="16%" align="left"> <?php echo "Rs.".$row2["price"]; 
	$pbill = $row2["price"]; 
	?> </td>
<?php
		}
?>            

    <td width="18%" align="left"> <?php echo "-"; ?> </td>
         
    <td width="19%" align="left"> <?php echo "Rs.".$pbill;  ?> </td></tr>
     <?php  $total2 = $total2 + $pbill; ?>
<?php
		}
?>  
      </table>


<br />

</form>

<form action="" method="post">
<table width="70%" border="0" align="center">
  <tr>
    <th width="21%" align="left" scope="col"><strong>Medicine:</strong></th>
    <th width="79%" align="left" scope="col"><label></label>&nbsp;</th>
  </tr>
  </table><br />

<table width="70%" border="0" align="center">
<tr>

    <td width="23%" align="left"> Medicine Date: </td> 
  <td width="24%" align="left"> Medicine Name:</td>    
      <td width="16%" align="left"> Price: </td>
      <td width="18%" align="left"> Quantity: </td>
      <td width="19%" align="left"> Amount: </td>
</tr>

 <?php 
	$sql = "SELECT med_name,med_date,price,quantity FROM medicine WHERE patient_id = '$pid'";
	$sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
		while ($row = mysql_fetch_assoc($sql_result)) {
	?>

   <tr>   <td width="24%" align="left"> <?php echo $row["med_date"]; ?> </td>
<td width="23%" align="left"> <?php echo $row["med_name"]; ?> </td>    

    <td width="16%" align="left"> <?php echo "Rs.".$row["price"]; ?> </td>
        

    <td width="18%" align="left"> <?php echo $row["quantity"]; ?> </td>
         
    <td width="19%" align="left"> <?php $price=$row["price"];
	$quantity=$row["quantity"];
	 $amount=$price * $quantity;
	 $total = $total + $amount; 	   
//	 $totalamount= $amount + $total1 + $total2;
	 echo "Rs.".$amount;
	 ?> </td></tr>
<?php
		}
?>
    <tr>
      <td><hr /></td>
      <td><hr /></td>
      <td><hr /></td>
      <td> <hr />       </td>
      <td><hr /></td>
    </tr>
<?php if($discharge_date != ""){
	?>
    <tr>
      <td></td>
      <td></td>
      <td colspan="2">Room Charges</td>
      <td align="left">
<?php
 $days= $diff->format("%R%a days");
//echo $days;	  //}
$daycharge = 2000 * $days;
echo "Rs.".$daycharge;
}
?>
</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td colspan="2">Consultation Price:</td>
      <td align="left"><?php $consultation=1000; echo "Rs.".$consultation; ?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>
     &nbsp; <hr /></td>
      <td align="left">&nbsp;<hr /></td></tr>
    <tr>
      <td></td>
      <td></td>
      <td>&nbsp;</td>
      <td>Total Amount:</td>
      <td align="left"><?php
	$finaltotal = $total + $total1 + $total2 + $consultation + $daycharge;
	 echo "Rs.".$finaltotal; ?></td>
</tr>
<tr>
<td height="36"> </td>
<td width="23%" align="right"><button onclick="window.print()" style="position:relative;"> Print </button></td>
<td></td>
<td></td>
</tr>
      </table>


<br />

</form>
</body>
</html>