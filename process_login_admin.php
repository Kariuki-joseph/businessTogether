<?php
//start session
session_start();
//include the connection
//include('dbConnect.php');
include('classes.php');

#retrieve form data
	$email=mysqli_real_escape_string($db->connect,$_POST['email']);
	$password=mysqli_real_escape_string($db->connect,$_POST['password']);
	//login
	$admin->login($email,$password);
?>