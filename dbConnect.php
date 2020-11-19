<?php

$connect=mysqli_connect('localhost','root','','business together');

//check if connection was established
if (!$connect) {
	echo "Unable to establish connection ".mysqli_error();
}
?>