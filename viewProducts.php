<?php
include('components/header.php');
include('dbConnect.php');
include('files/modal_postAd.php');
include('files/overFlow.php');
$ad_id=htmlentities($_GET['id']);

//select each card
$sql_products="SELECT * FROM products WHERE id={$ad_id}";
$viewQuery=mysqli_query($connect,$sql_products);
$product=mysqli_fetch_array($viewQuery);

$user_id=$product['user_id'];
$sql_users="SELECT * FROM users WHERE id='$user_id'";
$usersQuery=mysqli_query($connect,$sql_users);
$user=mysqli_fetch_array($usersQuery);

?>
<div class="pt-5 pb-5">
<div class="container bg-white">

	<h3>Images</h3>
	<div class="imgContainer">
	<img src="<?php echo $product['images']; ?>" alt="HTML 5 icon">
	</div>
	<h3>Product Title</h3>
	<p><?php echo $product['p_title']; ?></p><br>
	<h3>Seller Location</h3>
	<p><?php echo $product['p_location']; ?></p><br>
	<h3>Price</h3>
	<p>Ksh <?php echo $product['p_price']; ?></p><br>
</div>
<br>
<div class="container bg-white">
	<h3>Product Description</h3>
	<p><?php echo $product['p_description']; ?><br><br><br>
	Posted on: <?php echo $product['time_posted'];?> </p><br>
	
</div>
</div>
<div class="container bg bg-white p-5">
	<div class="form-group profile_picture pt-2">
		<?php
		//check if profile photo exists
		if (isset($user['profile_picture'])) {
		?>
		<img src="<?php echo $user['profile_picture'];?>"alt="Image Currently Unavailable" >
		<?php
	}else{
		?>
		<img src="images/default.png">
		<?php
	}
		?>
</div>
	<h3>
		Ad by <?php echo $user['firstName']." ".$user['lastName'];?></h3>
	<p><b>Contact <?php echo $user['firstName'];?> on: </b><?php echo $user['contact'];?> </p>
</div>
<br>
<div class="container bg bg-white p-5 mb-1">
	<h3>Simmilar Ads</h3>
	<?php

	$product_category=$product['p_category'];

	$simmilarProducts=mysqli_query($connect,"SELECT * FROM products WHERE p_category='$product_category'");
	?>
</div>
<div class="row mt--5">
		<?php
			while ($simmilarProduct=mysqli_fetch_array($simmilarProducts)) {
$user_id_simmilar=$simmilarProduct['user_id'];
$users_simmilar=mysqli_query($connect,"SELECT * FROM users WHERE id='$user_id_simmilar'");
$user_simmilar=mysqli_fetch_array($users_simmilar);
			?>
		<div class="col-sm-4">
<!--first card-->
			<div class="card card1" id="<?php echo $simmilarProduct['p_category'] ?>">
				<div class="card-header"><b><?php echo $simmilarProduct['p_title']?> </b>
					<button value="<?php echo $simmilarProduct['id'];?>" onclick="addFavourite(this.value)"><span class="fa fa-star fa-lg"></span></button>
				</div>
<div class="cards-hyperlink">
<a href="viewProducts.php?id=<?php echo $simmilarProduct['id'];?>">
				<div class="card-body">
<!--image-->
<div class="imgContainer">
<img src="<?php echo $simmilarProduct['images']; ?>" alt="HTML 5 icon">
</div>
					<span class="fa fa-camera"><span class="fa fa-plus"><b> 7</b></span></span>
<!--image-->
<!--Image Description-->
				
<!--Image Description-->
<!--Location-->
				<p><b class="greenColor">Location: </b><?php echo $simmilarProduct['p_location']?></p><br>
<!--Location-->

<!--Price-->
 		<p><b class="greenColor">Price: Ksh </b><?php echo $simmilarProduct['p_price']?></p><br>
				</div>
				<div class="card-footer"><CENTER><span class="fa fa-phone">       <?php echo $user_simmilar['contact']?></span></CENTER></div>
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