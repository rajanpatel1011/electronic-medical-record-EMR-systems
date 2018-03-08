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

	/* Validation to check if gender is selected */
	if(!isset($message)) {
	if(!isset($_POST["category"])) {
	$message = " Category field is required";
	}
	}

	if(!isset($message)) {
		require_once("config.php");
		//$db_handle = new DBController();
		$query = "INSERT INTO employee (emp_id, name, salary, category, email, password, phone_no, qualification, specialization) VALUES('" . $_POST["emp_id"] . "', '" . $_POST["name"] . "', '" . $_POST["salary"] . "', '" . $_POST["category"] . "', '" . $_POST["email"] . "', '" . $_POST["password"] . "', '" . $_POST["phone_no"] . "', '" . $_POST["qualification"] . "', '" . $_POST["specialization"] . "')";
		//$result = $db_handle->insertQuery($query);
		$result = mysql_query($query);
		if(!empty($result)) {
			$msg = "You have registered successfully!";	
			unset($_POST);
			header("Location:dashboard.php");
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
	if($_SESSION["category"] == "a")
		{
			include("sidebar_admin.php");
		}		
?>
</div>
<div class="pageContent">
<br />
<form name="registration" method="post" action="">
<table border="0" width="100%" align="center" class="demo-table">
    <div class="message"><?php if(isset($message)) echo $message; ?></div>
    <div class="msg"><?php if(isset($msg)) echo $msg; ?></div>
		<tr><td>Employee ID</td>
		<td><input type="text" class="demoInputBox" name="emp_id" value="<?php if(isset($_POST['emp_id'])) echo $_POST['emp_id']; ?>"></td>
		</tr>
        <tr><td>Name</td>
		<td><input type="text" class="demoInputBox" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"></td>
		</tr>
       	<tr><td>Salary</td>
		<td><input type="text" class="demoInputBox" name="salary" value="<?php if(isset($_POST['salary'])) echo $_POST['salary']; ?>"></td>	</tr>
        <tr><td>Category</td>
        <td> <input type="radio" name="category" value="in" <?php if(isset($_POST['category']) && $_POST['category']=="d") { ?>checked<?php  } ?>> Doctor <br />
		<input type="radio" name="category" value="out" <?php if(isset($_POST['category']) && $_POST['category']=="r") { ?>checked<?php  } ?>> Recepnist <br />
         <input type="radio" name="category" value="in" <?php if(isset($_POST['category']) && $_POST['category']=="n") { ?>checked<?php  } ?>> Nurse <br />
		<input type="radio" name="category" value="out" <?php if(isset($_POST['category']) && $_POST['category']=="p") { ?>checked<?php  } ?>> Pharmacist <br />
		</td>
		</tr>
		<tr><td>Email</td>
		<td><input type="email" class="demoInputBox" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"></td>
		</tr>
        <tr><td>Password</td>
		<td><input type="password" class="demoInputBox" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>"></td>
		</tr>
		<tr><td>Phone No</td>
		<td><input type="text" class="demoInputBox" name="phone_no" value="<?php if(isset($_POST['phone_no'])) echo $_POST['phone_no']; ?>"></td>
		</tr>
		<tr><td>Qualification</td>
		<td><input type="text" class="demoInputBox" name="qualification" value="<?php if(isset($_POST['qualification'])) echo $_POST['qualification']; ?>"></td>
		</tr>
		<tr><td>Specialization</td>
		<td><input type="text" class="demoInputBox" name="specialization" value="<?php if(isset($_POST['specialization'])) echo $_POST['specialization']; ?>"></td>
		</tr>
        <tr>
          <td></td>
          <td><input type="submit" name="submit" value="ADD" class="btnRegister" /></td>
        </tr>
	</table>
	<p>&nbsp;</p>
</form>
</div>
</div>
</body>
</html>