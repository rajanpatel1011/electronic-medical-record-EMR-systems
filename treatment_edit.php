<?php
error_reporting(0);
include("config.php");
session_start();

//if((!isset($_SESSION["user_id"])) || $_SESSION["category"]!="r")
	if(!isset($_SESSION["user_id"])){
	header("Location:login.php");
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
<?php
include('config.php');
if(isset($_GET['t_id']))
{
  $t_id=$_GET['t_id'];
//$id=$_GET['emp_id'];
if(isset($_POST['update']))
{
//  $emp_id=$_GET['emp_id'];
  $t_id=$_POST['t_id'];
  $t_name=$_POST['t_name'];
  $price=$_POST['price'];
  $remarks=$_POST['remarks'];
  $query3=mysql_query("UPDATE avail_treatment SET t_id='$t_id', t_name='$t_name', price='$price', remarks='$remarks' WHERE t_id='$t_id'")or die();
if($query3)
{
	$msg="Successfully Updated!!";
    header('location:treatment_view.php');
}
}
$query1=mysql_query("select * from avail_treatment where t_id='$t_id'");
$query2=mysql_fetch_array($query1);
?>
<form name="registration" method="post" action="">
<table border="0" width="100%" align="center" class="demo-table">
    <div class="message"><?php if(isset($message)) echo $message; ?></div>
    <div class="msg"><?php if(isset($msg)) echo $msg; ?></div>
		<tr><td>Treatment ID</td>
		<td><input type="text" class="demoInputBox" readonly="readonly" name="t_id" value="<?php echo $query2['t_id']; ?>"></td>
		</tr>
        <tr><td>Treatment Name</td>
		<td><input type="text" class="demoInputBox" name="t_name" value="<?php echo $query2['t_name']; ?>"></td>
		</tr>
        <tr><td>Price</td>
		<td><input type="number" class="demoInputBox" name="price" value="<?php echo $query2['price']; ?>"></td>
		</tr>
        <tr><td>Remarks</td>
		<td><input type="text" class="demoInputBox" name="remarks" value="<?php echo $query2['remarks']; ?>"></td>
		</tr>
        <tr>
          <td></td>
          <td><input type="submit" name="update" value="Update" class="btnRegister" /></td>
        </tr>
	</table>
	<p>&nbsp;</p>
</form>
<?php
}
?>
</div>
<div class="pageFooter" style="color:#FFFFFF"><br>
<center><p>Copyright © 2016</p></center>
</div>
</div>
</body>
</html>