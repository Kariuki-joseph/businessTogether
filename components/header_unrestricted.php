<?php
//start session
session_start();

//check if logout button is clicked
if (isset($_GET['logout'])) {
	//destroy the current session and redirect
	session_unset();
	session_destroy();
	header('Location:login.php');
		
}

//include db connection
include('dbConnect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Business Together</title>

<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">

	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<style type="text/css">
	</style>
</head>
<body>
		<!--navigtion Bar-->
<div class="row">
	<ul class="navigationBar">

		<a href="#overflow" class="pr-5 pl-5" class="item1"><li>
		&#9776 	MORE
		</li></a>

		<a href="index.php" class="item2"><li>
		<span class="fa fa-home"><br>HOME</span>
		</li></a>

		<a href="#modalPostAd" class="item3"><li>
		<span class="fa fa-plus"><br>SELL</span>
		</li></a>

		<a href="favourites.php" class="item4"><li>
		<span class="fa fa-star"><br>FAVOURITES</span>
		</li></a>
	<!--<ul class="navigationBar">
	<a href="index.php"><li class="active" id="overflow">&#9776</li></a>
		<a href="index.php"><li class="active" id="overflow"><span class="fa fa-home"><br>HOME</span></li></a>
		<a href="#modalPostAd"><li><span class="fa fa-plus"><br>SELL</span></li></a>
		<a href="favourites.php"><li><span class="fa fa-star"><br>FAVOURITES</span></li></a>-->

	</ul>
</div>
</div>

<!--navigtion Bar-->

