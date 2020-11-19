
<!--feedback Wrapper class-->
<div class="feedback-wrapper" id="feedbackWrapper">
	<div class="close"><a href="#" class="mr-10">CLOSE &times</a></div>
<!--feedback section-->
<div class="container bg bg-white pt-5 pb-5 mb-5 mt-5	">
	<center><h3>Help us make Business Together better!</h3></center>
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
	<form method="POST" action="process_crude.php">

		<div class="form-group">
			<input type="text" name="email" placeholder="Enter your email" class="form-control">
		</div>

		<div class="form-group">
			<input type="text" name="title" placeholder="Message title" class="form-control">
		</div>

		<div class="form-group">
			<label>Type your message below</label>
			<textarea name="message" class="form-control"></textarea>
			
		</div>
		<input type="submit" name="send" value="Send" class="btn btn-success">
	</form>
</div>
<!--end of feedback Wrapper class-->
</div>