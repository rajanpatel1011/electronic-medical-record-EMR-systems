<?php
error_reporting(0);
include("config.php");
?>
<form id="form1" name="form1" method="post" action="">
 &nbsp; <br /><label>Search by Name or Email:</label>
<input type="text" name="string" id="string" value="<?php echo stripcslashes($_REQUEST["string"]); ?>" />
</select>
<input type="submit" name="button" id="button" value="Filter" />
  </label>
  <a href="dashboard.php"> 
  reset</a>
</form>
<br /><br />
<table border="1" cellspacing="2" cellpadding="8" width="100%">
  <tr>
        <td width="65" height="37" bgcolor="#CCCCCC"><strong><center>Patient id</center></strong></td>
    <td width="100" bgcolor="#CCCCCC"><strong><center>Name</center></strong></td>
    <td width="25" bgcolor="#CCCCCC"><strong><center>Sex</center></strong></td>        
    <td width="60" bgcolor="#CCCCCC"><strong><center>Category</center></strong></td>
    <td width="160" bgcolor="#CCCCCC"><strong><center>Address</center></strong></td>
    <td width="80" bgcolor="#CCCCCC"><strong><center>Email</center></strong></td>
    <td width="95" bgcolor="#CCCCCC"><strong><center>Phone No</center></strong></td>
    <td width="95" bgcolor="#CCCCCC"><strong><center>Medicine Name</center></strong></td>
    <td width="60" bgcolor="#CCCCCC"><strong><center>Price</center></strong></td>    
    <td width="55" bgcolor="#CCCCCC"><strong><center>Quantity</center></strong></td>
    <td width="60" bgcolor="#CCCCCC"><strong><center>Medicine Date</center></strong></td>
    <td width="113" bgcolor="#CCCCCC"><strong><center>Remarks</center></strong></td>
    <td width="65" bgcolor="#CCCCCC"><strong><center>Add Price</center></strong></td>
  </tr>
<?php
if ($_REQUEST["string"]<>'') {
	$search_string = " AND (name LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%' OR email LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%')";	
}
if ($_REQUEST["patient_id"]<>'' and $_REQUEST["category"]<>'') {
	$sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE patient_id >= '".mysql_real_escape_string($_REQUEST["patient_id"])."' AND category <= '".mysql_real_escape_string($_REQUEST["category"])."'".$search_string;
}
else {
	$sql = "select patient.patient_id,patient.name,patient.sex,patient.category,patient.address,patient.email,patient.phone_no,medicine.med_name,medicine.price,medicine.quantity,medicine.med_date,medicine.remarks from patient,medicine where patient.patient_id=medicine.patient_id and medicine.price is NULL".$search_string;
}
$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
if (mysql_num_rows($sql_result)>0) {
	while ($row = mysql_fetch_assoc($sql_result)) {
?>
  <tr>
    <td align="center" height="30px" bgcolor="#CCCCCC"><?php echo $row["patient_id"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td align="center"><?php echo $row["sex"]; ?></td>
    <td align="center"><?php echo $row["category"]; ?></td>
    <td align="center"><?php echo $row["address"]; ?></td>
    <td align="center"><?php echo $row["email"]; ?></td>
	<td align="center"><?php echo $row["phone_no"]; ?></td>
    <td align="center"><?php echo $row["med_name"]; ?></td>
    <td align="center"><?php echo $row["price"]; ?></td>
    <td align="center"><?php echo $row["quantity"]; ?></td>
	<td align="center"><?php echo $row["med_date"]; ?></td>
    <td align="center"><?php echo $row["remarks"]; ?></td>    
   <?php echo "<td><a href='pharmacist_edit.php?patient_id=".$row['patient_id']."'>Add Price</a></td>"; $_SESSION["patient_id"]=$row['patient_id'];?>
  </tr>
<?php
	}
} else {
?>
<tr><td colspan="2">No results found.</td>
<?php	
}
?>
</table>