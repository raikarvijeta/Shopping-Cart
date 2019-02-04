<?php 

include 'header.php';
include 'db_connect.php';
include 'functions/requiredFunctions.php';
include 'classes/users.php';

if(isset($_POST["frgtPwdButton"]))
{
	user::forgotPassword($connection);
}

?>

<div class="main-container"">
	<form action="forgotPassword.php" method="POST" id="frgtPwdForm" name="frgtPwdForm" onsubmit="return validateFrgtPwd()">
		<h2>FORGOT PASSWORD ?</h2>
		<div class="form-container">
			<table>
			<tr>
				<td>Email ID</td>
				<td><input type="email" id="emailId" name="email"></td>
			</tr>
			<tr>
				<td>
					<td><input type="submit" id="frgtPwdButton" name="frgtPwdButton"  class="button-purple"  value="Reset"></td>
				</td>
			</tr>
		</table>
		</div>
		
	</form>
</div>
<?php include 'adminFooter.php';?>