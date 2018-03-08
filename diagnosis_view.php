<?php
error_reporting(0);
include("config.php");
session_start();
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
.demo-table td {padding: 10px 15px 10px 15px; font-weight:bold;}
.demoInputBox {padding: 7px;border: #F0F0F0 1px solid;border-radius: 4px;}
.btnRegister {padding: 15px;background-color: #000000;border: 0;font-weight:bold;color: #FFF;cursor: pointer;}
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
			include("sidebar_doctor.php");
		}
		
	if($_SESSION["category"] == "n")
		{
			include("sidebar_nurse.php");
		}
	if($_SESSION["category"] == "p")
		{
			include("sidebar_pharmacist.php");
		}
	if($_SESSION["category"] == "r")
		{
			include("sidebar_receptionist.php");
		}				
	if($_SESSION["category"] == "a")
		{
			include("sidebar_admin.php");
		}		
?>
</div>
<div class="pageContent">
<br />
<form id="form1" name="form1" method="post" action="">
 &nbsp; <br /><label>Search by id or name:</label>
<input type="text" name="string" id="string" value="<?php echo stripcslashes($_REQUEST["string"]); ?>" />
</select>
<input type="submit" name="button" id="button" value="Filter" />
  </label>
  <a href="diagnosis_view.php"> 
  reset</a>
  &nbsp;&nbsp;&nbsp;<a href="avail_diagnosis.php">Add New Diagnosis</a>
</form>
<br /><br />
<table border="1" cellspacing="2" width="80%" cellpadding="8">
  <tr>
    <td width="120" bgcolor="#CCCCCC"><strong><center>Diagnosis Name</center></strong></td>
    <td width="30" bgcolor="#CCCCCC"><strong><center>Price</center></strong></td>
    <td width="30" bgcolor="#CCCCCC"><strong><center>Edit</center></strong></td>
  </tr>
<?php
if ($_REQUEST["string"]<>'') {
	$search_string = " AND (d_name LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%' OR d_id LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%')";	
}
if ($_REQUEST["d_id"]<>'' and $_REQUEST["d_name"]<>'') {
	$sql = "SELECT * FROM ".$SETTINGS["d_table"]." WHERE d_id >= '".mysql_real_escape_string($_REQUEST["d_id"])."' AND d_name <= '".mysql_real_escape_string($_REQUEST["d_name"])."'".$search_string;
}
else {
	$sql = "SELECT * FROM ".$SETTINGS["d_table"]." WHERE d_id > 0".$search_string;
}
$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
if (mysql_num_rows($sql_result)>0) {
	while ($row = mysql_fetch_assoc($sql_result)) {
?>
  <tr>
    <td align="center"><?php echo $row["d_name"]; ?></td>
    <td align="center"><?php echo $row["price"]; ?></td>
   <?php echo "<td><a href='diagnosis_edit.php?d_id=".$row['d_id']."'>Edit</a></td>"; ?>
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
</div>
</div>
</body>
</html>