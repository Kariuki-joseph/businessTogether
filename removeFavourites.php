<?php 
session_start();
//include ('dbConnect.php');
include ('classes.php');

//getting the id of the user currently in session
$user_id=$users->getLoggedInUserId();
//getting the id of the clicked product
$ad_id=htmlentities($_GET['id']);

$sql_favourites=$favourites->removeFavourite($ad_id,$user_id);

?>
