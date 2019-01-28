<?php
include 'adminHeader.php';
include 'db_connect.php';

if(isset($_POST['contactUsBtn'])){
	submitContactUs();
}
function submitContactUs()
{
	$database=new db_connection;
	$connection=$database->connectToDatabase();
	$userName=$_POST["name"];
	$userEmail=$_POST["email"];
	$Message=$_POST["message"];
	$sql = "INSERT INTO contactus (name,email,message) VALUES ('".$userName."','".$userEmail."','".$Message."')";
	if ($connection->query($sql)==TRUE){
		echo " Feedback Submited Successfully";
		$toEmail = "vijeta.raikar@sjinnovation.com";
		$tittle="FEEDBACK";
		$mailHeaders = "From: " . $_POST["name"] . "<". $_POST["email"] .">\r\n";
		if(mail($toEmail,$tittle, $Message, $mailHeaders)) {
			echo"<p class='success'>Contact Mail Sent.</p>";
		}else{
		echo "Error: " . $sql . "<br>" . $connection->error;
	}
}
}

?>
<div class="main-container"">
	<form action="contactUs.php" method="POST" id="contactUsFrm" name="contactUsFrm"  onsubmit="return validateContactUs()">
		<h2>CONTACT US </h2>
		<div class="container">

				<div class="row">
					<div class="col-25">
						<label for="name">Name</label>
					</div>
					<div class="col-75">
						<input type="text" id="name" name="name" >
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="email">Email Address</label>
					</div>
					<div class="col-75">
						<input type="text" id="email" name="email" >
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
					<input type="submit" name="contactUsBtn" id="contactUsBtn" class="button-purple"   value="SUBMIT">
				</div>
			</div>
		</form>
	</div>
<?php include 'adminFooter.php';?>
