<?php  
include('components/header.php');
//include('dbConnect.php');
include('files/overFlow.php');
include ('classes.php');
$user=mysqli_fetch_array($users->getLoggedInUser());
//get the produducts
$products=$products->getAdsFromUserId($users->getLoggedInUserId());

?>

<h2>Welcome <?php echo $user['firstName'];?>.This page will help you manage your data in Business Together</h2>

<div class="container bg-white pb-5">
	<?php
                    if(isset($_SESSION['error'])){
               ?>
                    <div class="alert alert-danger">
                         <a href="#" class="close" data-dismiss="alert">  &times</a>
                         <?php echo $_SESSION['error'];
                         unset($_SESSION['error']);?>
                    </div>
               <?php
                    }elseif (isset($_SESSION['success'])) {
               ?>
               <div class="alert alert-success">
                         <a href="#" class="close" data-dismiss="alert">  &times</a>
                         <?php echo $_SESSION['success'];
                         unset($_SESSION['success']);?>
                    </div>
               <?php
				}
               ?>
<h3><CENTER>Registration Details</CENTER></h3>


<form method="POST" action="process_crude.php">
	<div class="form-group">
		<label>First Name</label>
		<input type="text" name="firstName" value="<?php echo $user['firstName'];?>" class="form-control">
	</div>

	<div class="form-group">
		<label>Last Name</label>
		<input type="text" name="lastName" value="<?php echo $user['lastName'];?>" class="form-control">
	</div>

	<div class="form-group">
		<label>Phone Number</label>
		<input type="text" name="contact" value="<?php echo $user['contact'];?>" class="form-control">
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" value="<?php echo $user['email'];?>" class="form-control">
	</div>
<input type="submit" name="update" value="Update Registration Details" class="btn btn-warning">

</form>

<form method="POST" action="process_crude.php" enctype="multipart/form-data">

<div class="form-group profile_picture pt-2">
		<label>Profile Picture</label><br>
		<input type="file" name="profile_picture">&nbsp
		<?php
		 if(isset($user['profile_picture'])){
		?>
		<img src="<?php echo $user['profile_picture'];?>">
		<?php
	}else{
		?>
	<img src="images/default.png">
	<?php
	}
	?>
</div>
<input type="submit" name="update_profile_pic" value="Update Profile Picture" class="btn btn-warning">
</form>
</div>

<h2>Manage your Ads</h2>

	<div class="row">
		<?php
			while ($product=mysqli_fetch_array($products)) {
			?>
		<div class="col-sm-4">
<!--first card-->
			<div class="card card1" id="<?php echo $product['p_category'] ?>">
				<div class="card-header"><b><?php echo $product['p_title']?> </b></div>

				<div class="card-body">
<!--image-->
					<div class="imgContainer">
						<img src="<?php echo $product['images']; ?>" alt="HTML 5 icon">
					</div>
					<span class="fa fa-camera"><span class="fa fa-plus"><b> 7</b></span></span>
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
				<div class="card-footer"><CENTER><span class="fa fa-phone">       <?php echo $user['contact']?></span></CENTER>
				</div>


				<form method="POST" action="process_crude.php">
					<input type="hidden" name="delete_id" value="<?php echo $product['id']?>">
			<input type="submit" name="deleteAd" value="Delete this Ad" class="btn btn-danger">
		</form>


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
	<!--main content-->


<?php
include('components/footer.php');
?>