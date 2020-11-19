<?php 
session_start();
//include ('dbConnect.php');
include ('classes.php');

//getting the id of the user currently in session
$user_id=$users->getLoggedInUserId();

//getting the id of the clicked product
$ad_id=htmlentities($_GET['id']);

//check if a simmilar product already exists
$ad_check=mysqli_query($db->connect,"SELECT * FROM favourites WHERE ad_id='$ad_id' AND currentUser='$user_id'");

//Restrict insert if simmilar ad by the same person exists
if (mysqli_num_rows($ad_check)==0) {
 	//insert query
$favourites->insertIntoFavourites($user_id,$ad_id);
 }else{
// No excecution.This ad alresdy exists in the favourites
}

?>
