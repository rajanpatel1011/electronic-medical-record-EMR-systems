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
if(count($_POST)>0) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
	$message = ($key) . " field is required";
	break;
	}
	}

	/* Email Validation */
	if(!isset($message)) {
	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
	$message = "Invalid UserEmail";
	}
	}

	if(!isset($message)) {
		require_once("config.php");
		//$db_handle = new DBController();
		$query = "INSERT INTO patient (patient_id, name, sex, category, admission_date, address, dob, email, emp_id, weight, height, phone_no) VALUES('', '" . $_POST["name"] . "', '" . $_POST["sex"] . "', '" . $_POST["category"] . "', '" . $_POST["admission_date"] . "', '" . $_POST["address"] . "', '" . $_POST["dob"] . "', '" . $_POST["email"] . "','" . $_POST["emp_id"] . "','" . $_POST["weight"] . "','" . $_POST["height"] . "','" . $_POST["phone_no"] . "')";
		//$result = $db_handle->insertQuery($query);
		$result = mysql_query($query);
		if(!empty($result)) {
			$msg = "You have registered successfully!";	
			unset($_POST);
		} else {
			$message = "Problem in registration. Try Again!";	
		}
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
<form name="registration" method="post" action="patient_reg.php">
<table border="0" width="100%" align="center" class="demo-table">
    <div class="message"><?php if(isset($message)) echo $message; ?></div>
    <div class="msg"><?php if(isset($msg)) echo $msg; ?></div>
        <tr><td>Name</td>
		<td><input type="text" class="demoInputBox" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"></td>
		</tr>
       	<tr><td>Gender</td>
		<td><input type="radio" name="sex" value="m" <?php if(isset($_POST['sex']) && $_POST['sex']=="m") { ?>checked<?php  } ?>> Male
		<input type="radio" name="sex" value="f" <?php if(isset($_POST['sex']) && $_POST['sex']=="f") { ?>checked<?php  } ?>> Female
		</td>
		</tr>
        <tr><td>Category</td>
        <td> <input type="radio" name="category" value="in" <?php if(isset($_POST['category']) && $_POST['category']=="in") { ?>checked<?php  } ?>> In
		<input type="radio" name="category" value="out" <?php if(isset($_POST['category']) && $_POST['category']=="out") { ?>checked<?php  } ?>> Out
		</td>
		</tr>
        <tr><td>Admission Date</td>
		<td><input type="date" class="demoInputBox" name="admission_date" value="<?php if(isset($_POST['admission_date'])) echo $_POST['admission_date']; ?>"></td>
		</tr>
		<?php /*?><tr><td>Discharge Date</td>
		<td><input type="date" class="demoInputBox" name="discharge_date" value="<?php if(isset($_POST['discharge_date'])) echo $_POST['discharge_date']; ?>"></td>
		</tr><?php */?>
		<tr><td>Address</td>
		<td><input type="text" class="demoInputBox" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>"></td>
		</tr>
		<tr><td>Date of Birth</td>
		<td><input type="date" class="demoInputBox" name="dob" value="<?php if(isset($_POST['dob'])) echo $_POST['dob']; ?>"></td>
		</tr>
		<tr><td>Email</td>
		<td><input type="email" class="demoInputBox" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"></td>
		</tr>
       <tr><td>Weight</td>
		<td><input type="number" class="demoInputBox" name="weight" value="<?php if(isset($_POST['weight'])) echo $_POST['weight']; ?>"></td>
		</tr>
       <tr><td>Height</td>
		<td><input type="number" class="demoInputBox" name="height" value="<?php if(isset($_POST['height'])) echo $_POST['height']; ?>"></td>
		</tr>
       <tr><td>Phone No</td>
		<td><input type="number" class="demoInputBox" name="phone_no" value="<?php if(isset($_POST['phone_no'])) echo $_POST['phone_no']; ?>"></td>
		</tr>                
        <tr><td>Doctor</td>
		<td>
        <?php
include('config.php');

$query = "SELECT emp_id, name, specialization FROM employee WHERE category='d'";
$result = mysql_query ($query);
echo "<select name='emp_id' value='emp_id'><option>Select Doctor</option>";
while($r = mysql_fetch_array($result)) {
  echo "<option value=".$r['emp_id'].">".$r['name']." >> ".$r['specialization']."</option>"; 
}
echo "</select>";
?></td>
		</tr>
        <tr>
          <td></td>
          <td><input type="submit" name="submit" value="Register" class="btnRegister" /></td>
        </tr>
	</table>
	<p>&nbsp;</p>
</form>
</div>
</div>
</body>
</html>