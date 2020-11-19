<?php 
include('components/header_unrestricted.php');
include('files/modal_postAd.php');
include('components/categories.php');
include('files/overFlow.php');
include('files/feedback.php');
include('classes.php');

$products=$products->getAllProducts();
//$row=mysqli_fetch_array($retrieve);
 ?>
 <div id="output">
	<div class="row">
		<?php
			while ($product=mysqli_fetch_array($products)) {
$user_id=$product['user_id'];
$users=mysqli_query($connect,"SELECT * FROM users WHERE id='$user_id'");
$user=mysqli_fetch_array($users);
			?>
		<div class="col-sm-4">
<!--first card-->
			<div class="card card1" id="<?php echo $product['p_category'] ?>">
				<div class="card-header"><b><?php echo $product['p_title']?> </b>
					<button value="<?php echo $product['id'];?>" onclick="addFavourite(this.value)"><span class="fa fa-star fa-lg"></span></button>
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