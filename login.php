<!DOCTYPE html>
<?php
error_reporting(0);
session_start();
$message="";
if(count($_POST)>0) {
$conn = mysql_connect("localhost","root","");
mysql_select_db("acharya",$conn);
$result = mysql_query("SELECT * FROM employee WHERE email='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
$row  = mysql_fetch_array($result);
if(is_array($row)) {
$_SESSION["user_id"] = $row[emp_id];
$_SESSION["user_name"] = $row[name];
$_SESSION["category"] = $row[category];
$_POST["category"] = $row[category];
} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["user_id"])) {
		
		if($_POST["category"] == "d")
		{
			header("Location:dashboard.php");
		}
		else{
			$message = "Invalid Username or Password!";	
		}
		if($_POST["category"] == "n")
		{
			header("Location:dashboard.php");
		}
		else{
			$message = "Invalid Username or Password!";	
		}
		if($_POST["category"] == "p")
		{
			header("Location:dashboard.php");
		}
		else{
			$message = "Invalid Username or Password!";	
		}
		if($_POST["category"] == "r")
		{
			header("Location:dashboard.php");
		}
		else{
			$message = "Invalid Username or Password!";	
		}
		if($_POST["category"] == "a")
		{
			header("Location:dashboard.php");
		}
		else{
			$message = "Invalid Username or Password!";	
		}
}
?>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    
    
    
        <link rel="stylesheet" href="login_styles.css">

    
    
    
  </head>

  <body>

    <body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>
<form method="post" action="login.php">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
			<div class="login-form">
				<div class="control-group">
				<input type="text" class="login-field" name="user_name" value="" placeholder="username" id="login-name">
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" value="" name="password" placeholder="password" id="login-pass">
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>
<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-large btn-block">
			</div></form>
		</div>
	</div>
</body>
    
    
    
    
    
  </body>
</html>
