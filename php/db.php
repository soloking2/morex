<?php
$con = new mysqli('localhost', 'root', '', 'morex');

if($con->connect_error){
	$error = $con->connect_error;
}
?>