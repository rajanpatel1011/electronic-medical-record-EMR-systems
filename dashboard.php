<?php
error_reporting(0);
include("config.php");
session_start();

//if((!isset($_SESSION["user_id"])) || $_SESSION["category"]!="r")
	if(!isset($_SESSION["user_id"])){
	header("Location:login.php");
	}
	$uname = $_SESSION["user_name"];
	if(isset($_POST["dpa_id"]))
	{
	$_SESSION["patient_idd"] = $_POST["dpa_id"];
//	echo $_SESSION["patient_idd"];	
	header("Location:patient_details.php");
	}
		if(isset($_POST["pa_id"]))
	{
	$_SESSION["patient_id"] = $_POST["pa_id"];
	//echo $_SESSION["patient_id"];	
	header("Location:dashboard.php");
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
BODY, TD {
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
</style>
</head>
<body>
<div class="blended_grid">
<div class="pageHeader" style="color:#FFFFFF">
<br>
<center><h1>Acharya Neurology Clinic </h1></center>
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
<div align="right">Welcome <?php echo "$uname";?></div>
<div class="pageContent">
<?php
if($_SESSION["category"] == "n" || $_SESSION["category"] == "r"){
?>

<br /><center>
<form name="p_id" method="post" action="">
Enter Patient ID: <input type="text" name="pa_id" value=""/>
<input type="submit" name="go" value="Go" />
</form></center>
<?php
	include("patient_view.php");
}
?>
<?php
if($_SESSION["category"] == "p"){
?>
<br />
<?php
	include("pharmacist_pview.php");
}
?>

<?php
if($_SESSION["category"] == "d"){
?>

<br /><center>
<form name="p_id" method="post" action="">
Enter Patient ID: <input type="text" name="dpa_id"/>
<input type="submit" name="go" value="Go" />
</form></center>
<?php
	include("patient_view.php");
}
?>
<?php
if($_SESSION["category"] == "a"){
?>

<br /><center>
<?php
	include("employee_view.php");	
}
?>
</div>


</div>
</body>
</html>