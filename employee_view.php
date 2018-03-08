<?php
error_reporting(0);
include("config.php");
session_start();
?>
<form id="form1" name="form1" method="post" action="">
 &nbsp; <br /><label>Search by Name or Email:</label>
<input type="text" name="string" id="string" value="<?php echo stripcslashes($_REQUEST["string"]); ?>" />
</select>
<input type="submit" name="button" id="button" value="Filter" />
  </label>
  <a href="dashboard.php"> 
  reset</a>
  &nbsp;&nbsp;&nbsp;<a href="employee_add.php">Add New Employee</a>
</form>
<br /><br />
<table border="1" cellspacing="2" cellpadding="8">
  <tr>
        <td width="90" height="37" bgcolor="#CCCCCC"><strong><center>Employee id</center></strong></td>
    <td width="120" bgcolor="#CCCCCC"><strong><center>Name</center></strong></td>
    <td width="30" bgcolor="#CCCCCC"><strong><center>Salary</center></strong></td>
    <td width="80" bgcolor="#CCCCCC"><strong><center>Category</center></strong></td>
    <td width="95" bgcolor="#CCCCCC"><strong><center>Email</center></strong></td>
    <td width="95" bgcolor="#CCCCCC"><strong><center>Password</center></strong></td>
    <td width="159" bgcolor="#CCCCCC"><strong><center>Phone No</center></strong></td>
    <td width="30" bgcolor="#CCCCCC"><strong><center>Qualification</center></strong></td>
    <td width="113" bgcolor="#CCCCCC"><strong><center>Specialization</center></strong></td>
    <td width="30" bgcolor="#CCCCCC"><strong><center>Edit</center></strong></td>
  </tr>
<?php
if ($_REQUEST["string"]<>'') {
	$search_string = " AND (name LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%' OR email LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%')";	
}
if ($_REQUEST["emp_id"]<>'' and $_REQUEST["category"]<>'') {
	$sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE emp_id >= '".mysql_real_escape_string($_REQUEST["emp_id"])."' AND category <= '".mysql_real_escape_string($_REQUEST["category"])."'".$search_string;
}
else {
	$sql = "SELECT * FROM ".$SETTINGS["emp_table"]." WHERE emp_id > 0".$search_string;
}
$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
if (mysql_num_rows($sql_result)>0) {
	while ($row = mysql_fetch_assoc($sql_result)) {
?>
  <tr>
    <td align="center" height="30px" bgcolor="#CCCCCC"><?php echo $row["emp_id"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td align="center"><?php echo $row["salary"]; ?></td>
    <td align="center"><?php echo $row["category"]; ?></td>
    <td align="center"><?php echo $row["email"]; ?></td>
    <td align="center"><?php echo $row["password"]; ?></td>
    <td align="center"><?php echo $row["phone_no"]; ?></td>
	<td align="center"><?php echo $row["qualification"]; ?></td>
    <td align="center"><?php echo $row["specialization"]; ?></td>
   <?php echo "<td><a href='employee_edit.php?emp_id=".$row['emp_id']."'>Edit</a></td>"; ?>
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