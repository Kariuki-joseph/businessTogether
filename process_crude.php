<?php
//start session
session_start();
//include the connection
//include('dbConnect.php');
include('classes.php');
///////////////////////register/////////////////////////////////////
if(isset($_POST['register'])){
	#retrieve form data
	$fName=mysqli_real_escape_string($db->connect,$_POST['firstName']);
	$lName=mysqli_real_escape_string($db->connect,$_POST['lastName']);
	$contact=mysqli_real_escape_string($db->connect,$_POST['contact']);
	$email=mysqli_real_escape_string($db->connect,$_POST['email']);
	$password=mysqli_real_escape_string($db->connect,$_POST['password']);
	$cPassword=mysqli_real_escape_string($db->connect,$_POST['cPassword']);
	
	//check if both passwords match
	if ($password!=$cPassword) {
		$_SESSION['error']='Passwords do not match. Check and try again';
		header('Location:register.php');
	}else{
		//register the user
	$users->registerUser($fName,$lName,$contact,$email,$password);

	}

/////////////////////////////////login//////////////////////////////
}elseif (isset($_POST['login'])) {

	#retrieve form data
	$email=mysqli_real_escape_string($db->connect,$_POST['email']);
	$password=mysqli_real_escape_string($db->connect,$_POST['password']);

	//login
	$users->login($password,$email);

//////////////////////////feedbacks///////////////////////////////
}elseif(isset($_POST['send'])) {
	//retrieve user input
	$email=mysqli_real_escape_string($db->connect,$_POST['email']);
	$title=mysqli_real_escape_string($db->connect,$_POST['title']);
	$message=mysqli_real_escape_string($db->connect,$_POST['message']);
	//check if the fields are empty
	if (!empty($email)&&!empty($title)&&!empty($message)) {
		$feedbacks->insertFeedback($email,$title,$message);
	}else{
		$_SESSION['error']='All the above fields are required';
		header('Location:index.php#feedbackWrapper');	
	}


///////////////post Ads//////////////////////////////////////////
}elseif(isset($_POST['post'])){
//get the image
$folder="uploads/";
$fileName=$folder.basename($_FILES['p_photo']['name']);
//file ext
$fileExt=pathinfo($fileName,PATHINFO_EXTENSION);
if($fileExt!=png && $fileExt!=jpeg && $fileExt!=gif && $fileExt!=jpg){
	$_SESSION['error']='Invalid file format. Only .png or .jpeg or .gif or .jpg are allowed';
	header('Location:index.php#modalPostAd');
}else{
move_uploaded_file($_FILES['p_photo']['tmp_name'],$fileName);
//retrieve form data
$title=mysqli_real_escape_string($db->connect,$_POST['p_title']);
$category=mysqli_real_escape_string($db->connect,$_POST['categories']);
$description=mysqli_real_escape_string($db->connect,$_POST['p_description']);
$location=mysqli_real_escape_string($db->connect,$_POST['p_location']);
$price=mysqli_real_escape_string($db->connect,$_POST['p_price']);

//get the user id
$email=$_SESSION['loggedInUser'];
$id_query=mysqli_query($db->connect,"SELECT id FROM users WHERE email='$email'");
$row=mysqli_fetch_array($id_query);
$user_id=$row['id'];


$sql="INSERT INTO products(user_id,p_category,p_title,p_description,p_location,p_price,images) VALUES ('$user_id','$category','$title','$description','$location','$price','$fileName')";

//insert
$insert=mysqli_query($db->connect,$sql);
if($insert){
	$_SESSION['success']='Your Ad was successfully posted.';
	header('Location:index.php#modalPostAd');
}else{
	echo '<script> alert("Your form is either empty or you are not logged in."); history.back();</script>';
}
}

/////////////////////////////update users/////////////////////
}elseif(isset($_POST['update'])){
	//get the user id
$email=$_SESSION['loggedInUser'];
$users=mysqli_query($db->connect,"SELECT * FROM users WHERE email='$email'");
$user=mysqli_fetch_array($users);
$user_id=$user['id'];
	#retrieve form data
	$fName=mysqli_real_escape_string($db->connect,$_POST['firstName']);
	$lName=mysqli_real_escape_string($db->connect,$_POST['lastName']);
	$contact=mysqli_real_escape_string($db->connect,$_POST['contact']);
	$email_updated=mysqli_real_escape_string($db->connect,$_POST['email']);

//check if a simmialar email exists
	$email_check=mysqli_query($db->connect,"SELECT * FROM users WHERE email='$email_updated'");
$rows_check=mysqli_fetch_array($email_check);
	if (mysqli_num_rows($rows_check)>0) {
		#issue an error
		$_SESSION['error']='There is a simmilar user with this email. Please try another one.';
		
		header('Location:myAccount.php');
	}else{
		//perform the update
$sql="UPDATE users SET firstName='$fName',lastName='$lName',contact='$contact' ,email='$email_updated' WHERE id='$user_id'";
//update query
$update=mysqli_query($db->connect,$sql);
//check if records were inserted successfully
	if($update){
		#set session and redirect user
		$_SESSION['loggedInUser']=$email_updated;
		$_SESSION['success']='Your records were successfully updated';
		header('Location:myAccount.php');
	}else{
		#issue an error
		$_SESSION['error']='Unable to update the records. Please try again';
		
		header('Location:myAccount.php');
	}
}

///////////////update profile picture///////////////////
}elseif(isset($_POST['update_profile_pic'])){
	//get the user id
$email=$_SESSION['loggedInUser'];
$users=mysqli_query($db->connect,"SELECT * FROM users WHERE email='$email'");
$user=mysqli_fetch_array($users);
$user_id=$user['id'];

	//get the profile picture 
	$folder="profile_pictures/";
$fileName=$folder.basename($_FILES['profile_picture']['name']);
//file ext
$fileExt=pathinfo($fileName,PATHINFO_EXTENSION);
if($fileExt!=png && $fileExt!=jpeg && $fileExt!=gif && $fileExt!=jpg
&& $fileExt!=JPG){
	$_SESSION['error']='Invalid file format. Only .png or .jpeg or .gif or .jpg are allowed';
	header('Location:myAccount.php');
}else{
move_uploaded_file($_FILES['profile_picture']['tmp_name'],$fileName);

//update the picture
//perform the update
$sql="UPDATE users SET profile_picture='$fileName' WHERE id='$user_id'";
//update query
$update=mysqli_query($db->connect,$sql);
//check if records were inserted successfully
	if($update){
		#set session and redirect user
		$_SESSION['success']='Your profile picture was successfully updated';
		header('Location:myAccount.php');
	}else{
		#issue an error
		$_SESSION['error']='Unable to update your profile picture. Please try again';
		
		header('Location:myAccount.php');
	}
}

///////////////////delete an ad//////////////////////////
}elseif(isset($_POST['deleteAd'])){
	//get the id of the ad
$id=mysqli_real_escape_string($db->connect,$_POST['delete_id']);
$products->deleteAd($id);
	
}

?>