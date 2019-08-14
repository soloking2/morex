<?php
session_start();

if(isset($_SESSION['email']) && isset($_SESSION['pass'])){
	include_once 'db.php';
	
	$driver_id = $_SESSION['id'];
	$driver_email = $_SESSION['email'];
	$driver_password = $_SESSION['pass'];
	
	$log = "SELECT * FROM `drivers` WHERE `email` = ? AND `password`=? LIMIT 1";
	$stmt = $con->prepare($log);
	$stmt->bind_param('ss', $driver_email, $driver_password);
	$stmt->execute();
	$get = $stmt->get_result();
	$row = $get->fetch_assoc();
	$id = $row['id'];
}else{
	header("Location: ./login.php");
}

?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
