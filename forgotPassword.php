<?php 

include 'adminHeader.php';
include 'db_connect.php';
include 'requiredFunctions.php';

if(isset($_POST["frgtPwdButton"]))
{
	forgotPassword();
}

function forgotPassword(){

	$to= $_POST['emailId'];
	$database = new db_connection;
	$connection=$database->connectToDatabase();

	$frgtPwdSql = "SELECT email FROM users WHERE email ='$to'";
	$result=$connection->query($frgtPwdSql);
	$counter = mysqli_num_rows($result);
		if($counter==1){
			$security_password = generatePassword(20);//for a 20-char password, upper/lower/numbers.
			$subject = 'RESET PASSWORD';
			$message = $security_password;
			$headers = "From : vijeta.raikar@sjinnovation.com";
			$altBody = 'Contact us at 123';
			mail($to,$subject,$message,$altBody,$headers);
			$update_toAuto_password = "UPDATE users SET password= md5('$security_password') where email='$to'";
			mysqli_query($connection,$update_toAuto_password);
		}
	}
?>

<div class="main-container"">
	<form action="forgotPassword.php" method="POST" id="frgtPwdForm" name="frgtPwdForm" onsubmit="return validateFrgtPwd()">
		<h2>FORGOT PASSWORD ?</h2>
		<table>
			<tr>
				<td>Email ID</td>
				<td><input type="email" id="emailId" name="emailId"></td>
			</tr>
			<tr>
				<td>
					<td><input type="submit" id="frgtPwdButton" name="frgtPwdButton"  class="button-purple"  value="Reset"></td>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php include 'adminFooter.php';?>