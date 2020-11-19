<?php
include('components/header.php');
include('files/modal_postAd.php');
include('files/overFlow.php');
//include('dbConnect.php');
include('classes.php');

//getting favourites for the user currently in session
$favourites=$favourites->getFavouriteForId($users->getLoggedInUserId());

$products=$products->getAllProducts();

?>
<div class="row">
	<?php
	while ($favourite=mysqli_fetch_array($favourites)) {
$ad_id=$favourite['ad_id'];

	//select each card
$sql_products="SELECT * FROM products WHERE id='$ad_id'";
$viewQuery=mysqli_query($db->connect,$sql_products);
$product=mysqli_fetch_array($viewQuery);
$id=$product['user_id'];
$user=mysqli_fetch_array(mysqli_query($db->connect,"SELECT * FROM users WHERE id='$id'"));
	?>
		<div class="col-sm-4">
<!--first card-->
			<div class="card card1" id="<?php echo $product['p_category'] ?>">
				<div class="card-header"><b><?php echo $product['p_title']?> </b>
					<button value="<?php echo $product['id'];?>" onclick="removeFavourite(this.value)"><span class="fa fa-star fa-lg"></span></button>
				</div>
<div class="cards-hyperlink">
<a href="viewProducts.php?id=<?php echo $product['id'];?>">
				<div class="card-body">
<!--image-->
					<div class="imgContainer">
						<img src="<?php echo $product['images']; ?>" alt="HTML 5 icon">
					</div>
					<span class="fa fa-camera"><span class="fa fa-plus"><b> 3</b></span></span>
<!--image-->
<!--Image Description-->
				<p> <b><?php echo $product['p_description']?></b></p><br>
				
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
</div>
	<!--main content-->









<?php
include('components/footer.php');
?>