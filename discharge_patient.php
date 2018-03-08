<?php
error_reporting(0);
include("config.php");
session_start();

//if((!isset($_SESSION["user_id"])) || $_SESSION["category"]!="r")
	if(!isset($_SESSION["user_id"])){
	header("Location:login.php");
	}
	if(isset($_POST['go'])){
	if(!isset($message)) {
	if(!isset($_POST["patient_id"])) {
	$message = " Patient ID field is required";
	}
	
	if(!isset($_POST["discharge_date"])) {
	$message = " Discharge Date field is required";
	}
	}
	}
	 $discharge_date=$_POST['discharge_date'];
	 //$patient_id=$_POST['patient_id'];
	 $patient_id=$_SESSION["patient_id"];
	 // $_POST['patient_id'] = $_SESSION["patient_id"];
$qu = mysql_query("SELECT * FROM patient WHERE patient_id=$patient_id and discharge_date IS NULL");
if (!(mysql_num_rows($qu) > 0))

//if($qu != "")
{
$message="Patient already Discharged";
}else{

	if(isset($_POST['go'])) {
	
		require_once("config.php");
		//$db_handle = new DBController();
		//$discharge_date = $_POST["discharge_date"];


		$query = "UPDATE patient SET discharge_date = '$discharge_date' WHERE patient_id = $patient_id ";
		//$result = $db_handle->insertQuery($query);
		$result = mysql_query($query);
		if(!empty($result)) {
			$msg = "Patient Discharge!";	
			unset($_POST);
		} else {
			$message = "Problem in registration. Try Again!";	
		}
	}}
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
<form name="p_id" method="post" action="">
<div class="message"><?php if(isset($message)) echo $message; ?></div>
    <div class="msg"><?php if(isset($msg)) echo $msg; ?></div>
<table border="0" width="100%" align="center" class="demo-table">
<tr><td>Patient ID</td>

<td><input type="text" name="patient_id" class="demoInputBox" value="<?php echo $patient_id; ?>" readonly="readonly" /></td></tr>
<tr><td>Discharge Date</td>
		<td><input type="date" class="demoInputBox" name="discharge_date" value="<?php if(isset($_POST['discharge_date'])) echo $_POST['discharge_date']; ?>"></td></tr>
		<tr><td>	
<input type="submit" name="go" value="Go" class="btnRegister"/></td></tr>
</table>
</form>
</div>
<div class="pageFooter" style="color:#FFFFFF"><br>
<center><p>Copyright © 2016</p></center>
</div>
</div>
</body>
</html>