<?php 

$q=$_GET['q'];

include ('dbConnect.php');
$sql="SELECT * FROM products WHERE p_title LIKE '%$q%' OR p_description LIKE '%$q%' OR p_location LIKE '%$q%'";
$sql_search=mysqli_query($connect,$sql);
if (mysqli_num_rows($sql_search)==0) {
 echo "<br><center><h2>OOPS! No matches for ".$q." were found.</h2></center>";
}
?>

<div class="row">
		<?php
			while ($product=mysqli_fetch_array($sql_search)) {
$user_id=$product['user_id'];
$users=mysqli_query($connect,"SELECT * FROM users WHERE id='$user_id'");
$user=mysqli_fetch_array($users);
			?>
		<div class="col-sm-4">
<!--first card-->
			<div class="card card1" id="<?php echo $product['p_category'] ?>">
				<div class="card-header"><b><?php echo $product['p_title']?> </b><span class="fa fa-star"></span></div>
<div class="cards-hyperlink">
<a href="viewProducts.php?id=<?php echo $product['id'];?>">
				<div class="card-body">
<!--image-->
					<div class="imgContainer">
						<img src="<?php echo $product['images']; ?>" alt="HTML 5 icon">
					</div>
					<span class="fa fa-camera"><span class="fa fa-plus"><b> 7</b></span></span>
<!--image-->
<!--Image Description-->
				
				
<!--Image Description-->
<!--Location-->
				<p><b class="greenColor">Location: </b><?php echo $product['p_location']?></p><br>
<!--Location-->

<!--Price-->
 		<p><b class="greenColor">Price: Ksh </b><?php echo $product['p_price']?></p><br>
				</div>
				<div class="card-footer"><CENTER><span class="fa fa-phone">       <?php echo $user['contact']?></span></CENTER></div>
			</div>
			</a>
			</div>
<!--Price-->
<!--first card-->
		
		</div>
		<?php
	}
		?>
		<div class="col-sm-4"></div>

		<div class="col-sm-4"></div>

	</div>
