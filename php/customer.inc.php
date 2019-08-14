<?php

	require_once 'db.php';
	if(isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["getResult"]) && isset($_POST["getDest"])){
	$name = $_POST["name"];
	$phone = $_POST["phone"];
	$current = $_POST["getResult"];
	$location = $_POST["getDest"];
	
	
	if(!empty($name) && !empty($phone) && !empty($current) && !empty($location)){
		$query = mysqli_query($con, "INSERT INTO `customers`(`fullname`, `phone`, `current_location`, `destination`, `date`) VALUES ('$name','$phone','$current','$location',now())");
		exit();
		mysqli_close($con);
		
		
	} else{
		echo "Fill all fields";
	}
}

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>