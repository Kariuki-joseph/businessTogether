<?php 
$q=$_GET['q'];

include ('dbConnect.php');
$sql="SELECT * FROM products WHERE p_category='$q'";
$sql_filter=mysqli_query($connect,$sql);
if (mysqli_num_rows($sql_filter)==0) {
	echo "<center><h1>OOPS! No records found.</h1></center>";
}
?>

<div class="row">
		<?php
			while ($product=mysqli_fetch_array($sql_filter)) {
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
