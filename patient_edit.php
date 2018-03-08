<?php
error_reporting(0);
include("config.php");
session_start();

//if((!isset($_SESSION["user_id"])) || $_SESSION["category"]!="r")
	if(!isset($_SESSION["user_id"])){
	header("Location:login.php");
	}	
	//echo $_SESSION['patient_id'];
	//$id=$_SESSION['patient_id'];
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
<?php
include('config.php');
//$id=$_SESSION['patient_id'];

if(isset($_SESSION['patient_id']))
{
$pid=$_SESSION['patient_id'];
$uid = $_SESSION["user_id"];

if(isset($_POST['update']))
{
  $patient_id=$_POST['patient_id'];
  $name=$_POST['name'];
  $sex=$_POST['sex'];
  $category=$_POST['category'];
  $admission_date=$_POST['admission_date'];
  $discharge_date=$_POST['discharge_date'];
  $address=$_POST['address'];
  $dob=$_POST['dob'];
  $email=$_POST['email'];
    $phone_no=$_POST['phone_no'];
  $weight=$_POST['weight'];
    $height=$_POST['height'];
  $query3=mysql_query("UPDATE patient SET patient_id='$patient_id', name='$name', sex='$sex', category='$category', admission_date='$admission_date', discharge_date='$discharge_date', address='$address', dob='$dob', email='$email', phone_no='$phone_no', weight='$weight', height='$height' WHERE patient_id='$pid'")or die();
if($query3)
{
	$msg="Successfully Updated!!";
    header('location:dashboard.php');
}
}
if($_SESSION["category"] == "r")
{
$query1=mysql_query("select * from patient where patient_id='$pid'");
$query2=mysql_fetch_array($query1);
}
if($_SESSION["category"] == "d")
{
$query1=mysql_query("select * from patient where patient_id='$id' && emp_id='$uid'");
$query2=mysql_fetch_array($query1);
}

$checkPID = mysql_query("SELECT * from patient WHERE patient_id='$pid'");
	if (mysql_num_rows($checkPID) > 0) {
        //echo "patient Exists";
   
?>

<form name="registration" method="post" action="">

<table border="0" width="100%" align="center" class="demo-table">
    <div class="message"><?php if(isset($message)) echo $message; ?></div>
    <div class="msg"><?php if(isset($msg)) echo $msg; ?></div>
		<tr><td>Patient ID</td>
		<td><input type="text" class="demoInputBox" name="patient_id" value="<?php echo $query2['patient_id']; ?>" readonly="readonly"></td>
		</tr>
        <tr><td>Name</td>
		<td><input type="text" class="demoInputBox" name="name" value="<?php echo $query2['name']; ?>"></td>
		</tr>
       	<tr><td>Gender</td>
		<td><input type="radio" name="sex" value="m" <?php if ($query2['sex'] == 'm') echo 'checked="checked"'; ?> > Male
		<input type="radio" name="sex" value="f" <?php if ($query2['sex'] == 'f') echo 'checked="checked"'; ?> > Female
		</td>
		</tr>
        <tr><td>Category</td>
        <td> <input type="radio" name="category" value="in"<?php if ($query2['category'] == 'in') echo 'checked="checked"'; ?>> In
		<input type="radio" name="category" value="out"<?php if ($query2['category'] == 'out') echo 'checked="checked"'; ?>> Out
		</td>
		</tr>
        <tr><td>Admission Date</td>
		<td><input type="date" class="demoInputBox" name="admission_date" value="<?php echo $query2['admission_date']; ?>"></td>
		</tr>
		<tr><td>Discharge Date</td>
		<td><input type="date" class="demoInputBox" name="discharge_date" value="<?php echo $query2['discharge_date']; ?>"></td>
		</tr>
		<tr><td>Address</td>
		<td><input type="text" class="demoInputBox" name="address" value="<?php echo $query2['address']; ?>"></td>
		</tr>
		<tr><td>Date of Birth</td>
		<td><input type="date" class="demoInputBox" name="dob" value="<?php echo $query2['dob']; ?>"></td>
		</tr>
		<tr><td>Email</td>
        <td><input type="email" class="demoInputBox" name="email" value="<?php echo $query2['email']; ?>" /></td>
		</tr>
 		<tr><td>Phone No</td>
		<td><input type="number" class="demoInputBox" name="phone_no" value="<?php echo $query2['phone_no']; ?>"></td>
		</tr>
		<tr><td>Weight</td>
		<td><input type="number" class="demoInputBox" name="weight" value="<?php echo $query2['weight']; ?>"></td>
		</tr>
		<tr><td>Height</td>
        <td><input type="number" class="demoInputBox" name="height" value="<?php echo $query2['height']; ?>" /></td>
		</tr>       
        <tr>
          <td></td>
          <td><input type="submit" name="update" value="Update" class="btnRegister" /></td>
        </tr>
	</table>
	<p>&nbsp;</p>
</form>

<?php

	}else{
	echo "Patient id ". $pid. " not Found";
	}
?>
<?php
}
?>

</div>
</div>
</body>
</html>