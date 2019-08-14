
<?php

session_start();

include_once 'db.php';

if(isset($_POST['fullname']) && isset($_POST['make']) && isset($_POST['model']) && isset($_POST['license']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_FILES['file']['name']) && $_FILES['file']['tmp_name'] != ""){
	$fullname = $_POST['fullname'];
	$make = $_POST['make'];
	$model = $_POST['model'];
	$license = $_POST['license'];
	$repeat_pwd = $_POST['repeat_pwd'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	
	$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	$name = $_FILES["file"]["name"];
	$tmp_name = $_FILES["file"]["tmp_name"];
	$type = $_FILES["file"]["type"];
	$size = $_FILES["file"]["size"];
	$errorMsg = $_FILES["file"]["error"];
	$afterDot = explode(".", $name);
	$fileExt = end($afterDot);
	list($width, $height) = getimagesize($tmp_name);
	if($width < 10 || $height < 10){
		header("Location: ../message.php?msg=ERROR: That image has no dimensions");
		exit();
	}
	$fileName = rand(100000, 999999).".".$fileExt;
	if($size > 3625796){
		header("Location: ../message.php?msg=ERROR: Your image file was larger than 3.45mb");
		exit();
	} else if(!preg_match("/\.(gif|jpg|png)$/i", $name) ){
		header("Location: ../message.php?msg=ERROR: Your Image file was not jpg, gif or png type");
		exit();
	} else if($errorMsg == 1){
		header("Location: ../message.php?msg=ERROR: An unknown error occurred");
		exit();
	}
	
	$query = "SElECT `id` FROM `drivers` WHERE `email` = ? LIMIT 1";
	$stmt = $con->prepare($query);
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$numrows = $stmt->get_result()->num_rows;
if($fullname == "" || $make == "" || $model == "" || $license == "" || $password == "" || $email == "" || $phone == ""){
	header("Location: ../message.php?msg=ERROR: Please enter required information");
		exit();
	}  else if($password != $repeat_pwd){
		header("Location: ../message.php?msg=ERROR: Password does not match");
		exit();
	}else if($numrows > 0){
	header("Location: ../message.php?msg=ERROR: Email Has already been Taken");
		exit();
	} else {
		
	$input = mysqli_query($con, "INSERT INTO `drivers`(fullname,make,model,license,password,email,phone,ip_address,date_added) VALUES('$fullname','$make','$model','$license','$password','$email','$phone','$ip', now())");
	$id = mysqli_insert_id($con);
	if(!file_exists("../uploads/$id")){
	 mkdir("../uploads/$id", 0755);
}
	$query = "SELECT passport FROM `drivers` WHERE `id`='$id' LIMIT 1";
	$query_run = mysqli_query($con,$query);
	$row = mysqli_fetch_row($query_run);
	$passport = $row[0];
	if($passport != ""){
		$picture = "../uploads/$id/$passport";
		if(file_exists($picture)){ unlink($picture);}
	}
	$moveResult = move_uploaded_file($tmp_name, "../uploads/$id/$fileName");
	if($moveResult != true){
		header("Location: ../message.php?msg=ERROR: File upload Failed");
		exit();
	}
	
	include_once ("image_resize.php");
	$target_file = "../uploads/$id/$fileName";
	$resized_file = "../uploads/$id/$fileName";
	$wmax = 200;
	$hmax = 300;
	img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
	
	$query = "UPDATE `drivers` SET `passport` = '$fileName' WHERE `id` = '$id' LIMIT 1";
	$query_run = mysqli_query($con,$query);
	
	header("Location: ../login.php");
}
}

?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
