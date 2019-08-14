<?php
session_start();
include_once 'php/db.php';
$error_msg = "";
if(isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$pass = $_POST['password'];
	//just give the admin username and password
	if(!empty($username) && !empty($pass)){
		$query = "SELECT username, password FROM admin WHERE `username`='$username' AND `password`='$pass'";
		$query_run = mysqli_query($con,$query);
		$num = mysqli_num_rows($query_run);
		if(empty($username) || empty($pass)){
			$error_msg = "<h4 style='color:#fff; font-weight:600;'>Please fill in your details</h4>";
		}	
		if($num < 1){
			$error_msg = "<h4 style='color:#fff; font-weight:600;'>Your login detail is incorrect</h4>";
		}else{
		$fetch = mysqli_fetch_assoc($query_run);
		$_SESSION['admin'] = $fetch['username'];
		header('location: admin.php');
		exit();
		}
			
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="css/admin_msg.css">
<link rel="stylesheet" href="css/animate.css">
<script src="js/ajax.js"></script>
<script src="js/main.js"></script>
<title>Admin Login Page</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-8 col-sm-offset-2">
	<?php 
	if(isset($_SESSION['admin']) != "administrator"){
	echo '<h3>Only the administrator can view this directory</h3><br />
	<div class="for">
		<h3 style="text-align:center;">Please Log In</h3> '.$error_msg.'
		<form method="post" action="">
		<div class="form-group">
		<label for="usrname">Your Username</label>
		<input type="text" name="username" id="username" class="form-control" placeholder="Your username please" required>
		</div>
		<div class="form-group">
		<label for="pwd">Your Password</label>
		<input type="password" name="password" id="pass" class="form-control" placeholder="Your username please" required>
		</div>
		<div class="form-group">
		<button type="submit" name="submit" id="sub" style="width:100%;" class="btn btn-primary btn-warning">LOGIN</button>
		</div>
		</form>
		<a href="index.php">Go back to the homepage</a>
	
	</div>';
	exit();
	}?>
</div>
</div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>