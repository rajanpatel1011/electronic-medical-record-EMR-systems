<?php
error_reporting(0);
include("config.php");
session_start();

//if((!isset($_SESSION["user_id"])) || $_SESSION["category"]!="r")
	if(!isset($_SESSION["user_id"])){
	header("Location:login.php");
	}
	
?>
<?php
	if(!isset($msg)) {
		require_once("config.php");
		//$db_handle = new DBController();
		$query = "INSERT INTO treatment (t_id, t_name, emp_id, patient_id, price, t_date, remarks) VALUES('" . $_POST["t_id"] . "', '" . $_POST["t_name"] . "', '" . $_POST["emp_id"] . "', '" . $_POST["patient_id"] . "', '" . $_POST["price"] . "', '" . $_POST["t_date"] . "', '" . $_POST["remarks"] . "')";
		//$result = $db_handle->insertQuery($query);
		$result = mysql_query($query);
		if(!empty($result)) {
			$msg = "You have registered successfully!";	
			unset($_POST);
		} else {
			$message = "Problem in registration. Try Again!";	
		}
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
?>
</div>
<div class="pageContent">
<br />
<form name="registration" method="post" action="treatment_bill.php">
<table border="0" width="100%" align="center" class="demo-table">
    <div class="message"><?php if(isset($message)) echo $message; ?></div>
    <div class="msg"><?php if(isset($msg)) echo $msg; ?></div>
		<tr><td>Treatment ID</td>
		<td><input type="text" class="demoInputBox" name="t_id" value="<?php if(isset($_POST['t_id'])) echo $_POST['t_id']; ?>"></td>
		</tr>
        <tr><td>Treatment name</td>
		<td><input type="text" class="demoInputBox" name="t_name" value="<?php if(isset($_POST['t_name'])) echo $_POST['t_name']; ?>"></td>
		</tr>
        <tr><td>Employee id</td>
		<td><select name="emp_id">
  <option value="">Select...</option>
  <option value="1"<?php if(isset($_POST['emp_id']) && $_POST['emp_id']=="1") { ?>><?php  } ?></option>1
  <option value="2"<?php if(isset($_POST['emp_id']) && $_POST['emp_id']=="2") { ?>><?php  } ?></option>2
  <option value="3"<?php if(isset($_POST['emp_id']) && $_POST['emp_id']=="3") { ?>><?php  } ?></option>3
  <option value="4"<?php if(isset($_POST['emp_id']) && $_POST['emp_id']=="4") { ?>><?php  } ?></option>4

</select></td>
		</tr> 
        <tr><td>Patient id</td>
		<td><input type="text" class="demoInputBox" name="patient_id" value="<?php if(isset($_POST['patient_id'])) echo $_POST['patient_id']; ?>"></td>
		</tr>
		<tr><td>Price</td>
		<td><input type="number" class="demoInputBox" name="price" value="<?php if(isset($_POST['price'])) echo $_POST['price']; ?>"></td>
		</tr>
		<tr><td>Treatment date</td>
		<td><input type="date" class="demoInputBox" name="t_date" value="<?php if(isset($_POST['t_date'])) echo $_POST['t_date']; ?>"></td>
		</tr>
		<tr><td>Remarks</td>
		<td><input type="text" class="demoInputBox" name="remarks" value="<?php if(isset($_POST['remarks'])) echo $_POST['remarks']; ?>"></td>
		</tr>
        <tr>
          <td></td>
          <td><input type="submit" name="submit" value="Register" class="btnRegister" /></td>
        </tr>
	</table>
	<p>&nbsp;</p>
</form>
</div>
<div class="pageFooter" style="color:#FFFFFF"><br>
<center><p>Copyright © 2016</p></center>
</div>
</div>
</body>
</html>