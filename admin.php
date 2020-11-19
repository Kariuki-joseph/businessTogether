<?php
//start session
session_start();

//check if the user is logged in
if(!isset($_SESSION['admin'])){
	header('Location:login_admin.php');
}
if (isset($_GET['logout'])) {
	session_unset();
	session_destroy();
	header('Location:login_admin.php');
}
//include db connection
//include('dbConnect.php');
include('classes.php');
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
</head>

<?php

$feedbacks=$feedbacks->getAllFeedbacks();
?>
<body>
	<!--admin logout-->
	<a href="admin.php?logout=true"><div class="btn btn-warning mr-2 mt-2" style="float: right;">LOGOUT  <i class="fa fa-sign-out"></i></div></a>
	<!--admin logout-->

		<center><h3>Welcome to Business Together Admin page</h3></center>
<h5>Users fedbacks</h5>
<div class="row">
<?php
while ($feedback=mysqli_fetch_array($feedbacks)) {
?>
		<div class="col-sm-3">

<div class="container bg-white mt-5 pt-3 pb-3">
<form>
	<div class="form-group">
		<div class="form-control">By <small><?php echo $feedback['email']; ?></small></div>
	</div>
<div class="form-group">
	<h5><?php echo $feedback['title']; ?></h5>

<p style="font-size: 17px;"><?php echo $feedback['message']; ?></p>

</div>
</form>
</div>
		</div>

<?php
}
?>
		<div class="col-sm-3"></div>
		<div class="col-sm-3"></div>
		<div class="col-sm-3"></div>
</div>






</body>
</html>