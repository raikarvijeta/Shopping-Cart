<?php
include 'db_connect.php';
include 'header.php';
include 'dbCreate.php';
include 'validation.php';

if (isset($_POST['submitButton']))
{
	$fName=($_POST["fName"]);
	$email=($_POST["email"]);
	if(($checkValid == "true"))
	{
		user::submitContactUs($connection);
	}
}
?>
<head>
	<script  src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="js/registerValidation.js"></script>
	
</head>
<div class="main-container"">
	<form action="" method="POST" id="contactUsFrm" name="contactUsFrm"  onsubmit="return validateContactUs()">
		<input type="hidden" name="submit" value="true">
		<h2>CONTACT US </h2>
		<div class="container">

				<div class="row">
					<div class="col-25">
						<label for="name">Name</label>
					</div>
					<div class="col-75">
						<input type="text" id="firstName" name="fName" value="<?php echo $fName;?>">
						<td><p><span class="error_form" id="firstNameErrorMsg"</span></p></td>
						<td><span class="error"> <?php echo $fnameError;?></span><br><br></td>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="email">Email Address</label>
					</div>
					<div class="col-75">
						<input type="text" id="email" name="email" value="<?php echo "$email"?>" >
						<td><span class="error_form" id="emailErrorMsg"></span></td>
						<td><span class="error"><?php echo $emailError;?></span></td>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="message">Message</label>
					</div>
					<div class="col-75">
						<textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>
					</div>
				</div>
				<div class= "map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3847.1915686362763!2d73.93478931479869!3d15.366107989318671!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbfb1341c935973%3A0x8ac1ddbc35c78f8b!2sSJ+Innovation!5e0!3m2!1sen!2sin!4v1546234629916" style="border:0" allowfullscreen>
						
					</iframe>
				</div>
				<div class="row">
					<input type="submit" name="submitButton" id="submitButton" class="button-purple"   value="SUBMIT">
				</div>
			</div>
		</form>
	</div>
<?php include 'adminFooter.php';?>
