<?php

////////////classs for database connection/////////////
class DB
{
	public $connect;
	function __construct()
	{
		
$this->connect=mysqli_connect('localhost','root','','business together');

//check if connection was established
if (!$this->connect) {
	echo "Unable to establish connection ".mysqli_error();
}

	}
}
/////////////////////////////////////////////////////////////////////////
class Users extends DB {
	//registration
 public function registerUser($fName,$lName,$contact,$email,$password){

	//encrypt password
	$hashedPassword=hash(MD5, $password);

	//check if a simmilar user is registered
	$check=mysqli_query($this->connect,"SELECT * FROM users WHERE email='$email'");
	$count=mysqli_num_rows($check);
	if ($count>0) {
		//issue an eror and redirect the user
		$_SESSION['error']='A user with simmilar details already exists. Plese try again';
		header('Location:register.php');
	}else{
		$sql="INSERT INTO users(firstName,lastName,contact,email,pass) VALUES('$fName','$lName','$contact','$email','$hashedPassword')";

	#insert records to the database
	$insert=mysqli_query($this->connect,$sql);
	//check if records were inserted successfully
	if($insert){
		#set session and redirect user
		$_SESSION['loggedInUser']=$email;
		
		header('Location:index.php');
	
	}else{
		#issue an error
		$_SESSION['error']='Registration failed. Please try again';
		
		header('Location:register.php');
	}

	}
 }

//login
 function login($password,$email){
 	#encrpyt password
	$hashedPassword=hash("MD5", $password);

	#check if records match
	$select=mysqli_query($this->connect,"SELECT * FROM users WHERE email='$email' AND pass='$hashedPassword'");

	$count=mysqli_num_rows($select);

	if($count>0){
		#set session for the loggged in user
		$_SESSION['loggedInUser']=$email;
		header('Location:index.php');
	}else{
		#issue an error
		$_SESSION['error']='No user with such details. If not yet a member, click the registration link at the bottom to register with us';
		header('Location:login.php');
	}
 }

 //get the user currently in session
 function getLoggedInUserId(){
 $email=$_SESSION['loggedInUser'];
$query_user=mysqli_query($this->connect,"SELECT * FROM users WHERE email='$email'");
$user=mysqli_fetch_array($query_user);
$user_id=$user['id'];

return $user_id;
 }

//get the current user details
function getLoggedInUser(){
$email=$_SESSION['loggedInUser'];
$query_user=mysqli_query($this->connect,"SELECT * FROM users WHERE email='$email'");
return $query_user;
}

//Filter users by id
function getUserById($id){
	$query=mysqli_query($this->connect,"SELECT * FROM users WHERE id='$id'");
	return $query;
}


}


//////////////////////////////////////////////////////////////////////////
class Products extends DB
{

//get the ads of the current user
 function getAdsFromUserId($id){
$query=mysqli_query($this->connect,"SELECT * FROM products WHERE user_id='$id'");
return $query;

 }

//get all the products
 function getAllProducts(){

$query=mysqli_query($this->connect,"SELECT * FROM products ORDER BY time_posted DESC");
return $query;

 }

//To delete an ad
 function deleteAd($id){
$query1=mysqli_query($this->connect,"DELETE FROM favourites WHERE ad_id='$id'");
$query2=mysqli_query($this->connect,"DELETE FROM products WHERE id='$id'");
//check if records were inserted successfully
	if($query2){
		#set session and redirect user
		$_SESSION['success']='Your Ad was successfully deleted.';
		header('Location:myAccount.php');
	}else{
		#issue an error
		$_SESSION['error']='Unable to delete the Ad. Please try again';
		
		header('Location:myAccount.php');
	}
 }


}
/////////////////////////////////////////////////////////////////////////
class Favourites extends DB
{
//get favourites for a paticular id
function getFavouriteForId($id){
	$sql="SELECT * FROM favourites WHERE currentUser='$id'";
	$query=mysqli_query($this->connect, $sql);
return $query;
} 
//add a favourite item
function insertIntoFavourites($user_id,$ad_id){
	$sql="INSERT INTO favourites(currentUser,ad_id) VALUES ('$user_id','$ad_id')";
$query=mysqli_query($this->connect,$sql);
return $query;

}

//deleting the ads 
function removeFavourite($ad_id,$user_id){
$sql="DELETE FROM favourites WHERE ad_id='$ad_id' AND currentUser='$user_id'";
$query=mysqli_query($this->connect,$sql);

if ($query) {

header('Location:favourites.php');

}else{

header('Location:error.php');

}

}


}

////////////////////////////////////////////////////////////////////////////////////
class Feedbacks extends DB
{
	//Insert the feedbacks to the database
	function insertFeedback($email,$title,$message){
	$insertFeedback=mysqli_query($this->connect,"INSERT INTO feedbacks(email,title,message) VALUES('$email','$title','$message')");
	//check if inserted
	if ($insertFeedback) {
	$_SESSION['success']='Your feedback was successfully submitted';
	header('Location:index.php');
		
	}else{
		$_SESSION['error']='Unable to upload your feedback. Plese try again';
		header('Location:index.php#feedbackWrapper');
	}

	}


	function getAllFeedbacks(){
		$sql="SELECT * FROM feedbacks";
		$query=mysqli_query($this->connect, $sql);
 	return $query;
	}

}


/////////////////////////////////////////////////////////////

class Admin extends DB
{
	function login($email,$password){
		$sql="SELECT * FROM admin WHERE email='$email' AND password='$password'";
		$query=mysqli_query($this->connect,$sql);
		if (mysqli_num_rows($query)>0) {
			$_SESSION['admin']='$email';
			header('Location:admin.php');
		}else{
			$_SESSION['error']='User with these details is not allowed to access the requested page';
			header('Location:login_admin.php');
		}
	}

}
///////////////////////////////////////////////////////////////////

//Create an instance of db connection class
$db = new DB();
//Create an instance of users
$users = new Users();

//create instances of products
$products = new Products();

//create an instance of favourites
$favourites = new Favourites();

//create an instance of feedbacks
$feedbacks = new Feedbacks();

//create an instance of admin
$admin = new Admin();

///////////////////////////////////////////////////////////////////////////
?>