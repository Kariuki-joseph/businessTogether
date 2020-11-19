<!--Post Ad form modal-->
<div class="modalBackground" id="modalPostAd">
	<div class="close"><a href="#">Close &times</a></div>
<div class="container bg-white modalContent pb-5">
<div class="postProductForm">
	<?php
                    if(isset($_SESSION['error'])){
               ?>
                    <div class="alert alert-danger">
                         <a href="#" class="close" data-dismiss="alert">&times</a>
                         <?php echo $_SESSION['error'];
                         unset($_SESSION['error']);?>
                    </div>
               <?php
                    }elseif (isset($_SESSION['success'])) {
               ?>
                <div class="alert alert-success">
                         <a href="#" class="close" data-dismiss="alert">&times</a>
                         <?php echo $_SESSION['success'];
                         unset($_SESSION['success']);?>
                    </div>
               <?php
				}
               ?>
<form method="POST" action="process_crude.php" enctype="multipart/form-data">
	<fieldset>
		<legend>Fill the details to post your product</legend>
	<input type="file" name="p_photo" class="form-control"><br>
	<select name="categories" class="form-control">
		<option>--Select category from the options below--</option>
		<option value="services"><b>Services<b></option>
		<option value="electronics">Ealectronics</option>
		<option value="phones">Phones and Accessories</option>
		<option value="commercial">Commercial Equipments</option>
		<option value="agriculture">Agriculture</option>
		<option value="fashion">Fashion and Clothing</option>
		<option value="animals">Animals and Pets</option>
		<option value="vehicles">Vehicles</option>
	</select><br>
	<div class="form-group">
	<label>Product Title</label>
	<input type="text" name="p_title" placeholder="Product Title" class="form-control">
	</div>
	<div class="form-group">				
	<label>Product Description</label>
	<input type="text" name="p_description" placeholder="Product Description" class="form-control">
	</div>
	<div class="form-group">				
	<label>Location</label>
	<input type="text" name="p_location" placeholder="Your Location" class="form-control">
	</div>
	<div class="form-group">				
	<label>Price</label>
	<input type="text" name="p_price" placeholder="Product Price" class="form-control">
	</div>

	<i><input type="submit" name="post" value="POST" class="btn btn-success"> <i class="fa fa-paper-plane"></i></i> &nbsp<i><input type="reset" name="reset" class="btn btn-warning"> <i class="fa fa-undo"></i></i>

	
	</fieldset>
</form>
</div>
</div>
</div>
<!--Post Ad form modal-->