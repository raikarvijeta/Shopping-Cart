<?php 
	include 'adminHeader.php';
	include 'db_connect.php';
	include 'classes/users.php';


	if(isset($_POST["registerButton"])){
		user::insertUsers();
	}
?>
<head>
	<script  src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="js/registerValidation.js"></script>
</head>
<body onload="generateCaptcha();">
	<div class="main-container"">
	<form action="register.php" method="POST" id="registerForm" name="registerForm" >
		<h2>REGISTER FORM </h2>
		<table>
			<tr>
				<td>First Name</td>
				<td><input type="text" id="firstName" name="txtfName" placeholder="Enter your name" required></td>
				<td><p><span class="error_form" id="firstNameErrorMsg"</span></p></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" id="lastName" name="txtlName" placeholder="Enter your Surname" required></td>
				<td><p><span class="error_form" id="lastNameErrorMsg"</span></p></td>
				
			</tr>
			<tr>
				<td>Gender </td>
				<td><select name="txtgender" id="gender"">
					<span class="error_form" id="genderErrorMsg"></span>
					<option value="male">Male</option>
					<option value="female">Female</option>
					<option value="others">Others</option>
					</select></td>
			</tr>
			<tr>
				<td>Email Address</td>
				<td><input type="text" id="email" name="txteAddress"  placeholder="abc@sji.com" required="required"></td>
				<td><span class="error_form" id="emailErrorMsg"></span></td>
			</tr>
			<tr>
				<td>Street Address</td>
				<td><input type="text" id="street" name="txtstreetAdd"   placeholder="Enter address" required="required"></td>
				<span class="error_form" id="addressErrorMsg"></span>
			</tr>
			<tr>
				<td>APT/FL/Suite No</td>
				<td><input type="text" id="flatNo" name="txtflatNo"  placeholder="BS-10" required="required"></td>
				<span class="error_form" id="flatNoErrorMsg"></span>
			</tr>
			<tr>
				<td>Zip Code</td>
				<td><input type="text" id="zipCode" name="zipCode"   placeholder="403601"   maxlength="7"  required></td>
				<td><span class="error_form" id="zipErrorMsg"></span></td>
			</tr>
			<tr>
				<td>State/Province</td>
				<td><input type="text" id="stateName" name="txtstateName"   placeholder="Goa" required="required"></td>
				<span class="error_form" id="stateErrorMsg"></span>
			</tr>
			<tr>
				<td>Telephone No</td>
				<td><input type="text" id="phone" name="txttelNo"  placeholder="0832-2724410" maxlength="10" required ></td>
				<td><span class="error_form" id="phoneErrorMsg"></span></td>
			</tr>

			<tr>
				<td>Fax Number</td>
				<td><input type="text" id="faxNo" name="txtfaxNo"  placeholder="+1-323-5551234" required maxlength="14"></td>
				<td><span class="error_form" id="faxErrorMsg"></span></td>
			</tr>

			<tr>
				<td>Password</td>
				<td><input type="password" id="password" name="txtpass"   minlength="8"  mamaxlength="10"  required"></td>
				<td><span class="error_form" id="passwordErrorMsg"></span></td>
			</tr>
			<tr>
				<td>Password Confirmation </td>
				<td><input type="password" id="confPassword" name="txtcPass" minlength="8"  mamaxlength="10" "required"></td>
				<td><span class="error_form" id="verifyPasswordErrorMsg"></span><td>
			</tr>
			<tr>
					<td>Captcha</td>
					<td><input type="text" name="captcha" id="captcha" placeholder="Enter captcha code" maxlength="4"></td>
					<td><input type="button" id="refresh" value="Refresh" onclick="generateCaptcha();" /></td>
			</tr>
				<tr>
					<td>Input Captcha</td>
					<td><input type="text" name="captchaInput" id="captchaInput"></td>
					<td><span class="error_form" id="captchaErrorMsg"></span></td>
				</tr>
				<tr>
					<td>
						<input type="submit" id="registerButton" name="registerButton"  class="button-purple"   value="Register">
					</td>
					
				</tr>
				
			</tr>
		</table>
	</form>
</div>
</body>








