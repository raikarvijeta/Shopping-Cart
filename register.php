<?php 
	include 'header.php';
	include 'db_connect.php';
	include 'classes/users.php';
	include 'validation.php';


if (isset($_POST['submitButton'])){

		$fName=($_POST["fName"]);
		$lName=($_POST["lName"]);
		$gender=($_POST["gender"]);
		$email=($_POST["email"]);
		$address=($_POST["address"]);
		$phoneNo=($_POST["phoneNo"]);
		$password=($_POST["password"]);
		$confPwd=($_POST["confPwd"]);
		$hashedMDPassword = MD5($password);


		if(($checkValid == "true"))
			
		{
		// 			var_dump($checkValid);
		// exit();
			user::insertUsersAndEmail($connection);
			
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
<body onload="generateCaptcha();">
	<div class="main-container"">
	<form action="" method="POST" id="registerForm" name="registerForm" >
		<input type="hidden" name="submit" value="true">
		<h2>REGISTER FORM </h2>
		<div class="form-container">
			<table>
			<tr>
				<td>First Name</td>
				<td><input type="text" id="firstName" name="fName" placeholder="Enter your First name" required value="<?php echo $fName;?>"></td>
				<td><p><span class="error_form" id="firstNameErrorMsg"</span></p></td>
				<td><span class="error"> <?php echo $fnameError;?></span><br><br></td>

			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" id="lastName" name="lName" placeholder="Enter your Surname" required value="<?php echo $lName;?>"></td>
				<td><p><span class="error_form" id="lastNameErrorMsg"</span></p></td>
				<td><span class="error"><?php echo $lnameError;?></span><br><br></td>
				
			</tr>
			<tr>
				<td>Gender </td>
				<td><select name="gender" id="gender" value="<?php echo $gender;?>">
					<span class="error_form" id="genderErrorMsg"></span>
					<span class="error" ><?php echo $genderError;?></span>
					<option value="male">Male</option>
					<option value="female">Female</option>
					<option value="others">Others</option>
					</select></td>
			</tr>
			<tr>
				<td>Email Address</td>
				<td><input type="text" id="email" name="email"  placeholder="Enter your Email Address" required value="<?php echo "$email"?>"></td>
				<td><span class="error_form" id="emailErrorMsg"></span></td>
				<td><span class="error"><?php echo $emailError;?></span></td>
			</tr>
			<tr>
				<td>Street Address</td>
				<td>
					<input type="text" id="street" name="address"   placeholder="Enter Permanent address" required value="<?php echo "$address"?>">
				</td>
				<td><span class="error_form" id="addressErrorMsg"></span></td>
				<td><span class="error"><?php echo $addressError;?></span></td>
			</tr>
			
			<tr>
				<td>APT/FL/Suite No</td>
				<td>
					<input type="text" id="flatNo" name="flatNo"  placeholder="BS-10" required >
				</td>
				<span class="error_form" id="flatNoErrorMsg"></span>
			</tr>
			<tr>
				<td>Zip Code</td>
				<td>
					<input type="text" id="zipCode" name="zipCode"      maxlength="7"  required>
				</td>
				<td><span class="error_form" id="zipErrorMsg"></span></td>
			</tr>
			<tr>
				<td>State/Province</td>
				<td>
					<input type="text" id="stateName" name="state"    required="required">
				</td>
				<span class="error_form" id="stateErrorMsg"></span>
			</tr>
			<tr>
				<td>Telephone No</td>
				<td>
					<input type="text" id="phone" name="phoneNo"   maxlength="10" required value="<?php echo "$phoneNo"?>">
				</td>
				<td><span class="error_form" id="phoneErrorMsg"></span></td>
				<td><span class="error"><?php echo $phoneError;?></span></td>
			</tr>
			

			<tr>
				<td>Fax Number</td>
				<td>
					<input type="text" id="faxNo" name="faxNo"   required maxlength="14">
				</td>
				<td><span class="error_form" id="faxErrorMsg"></span></td>
			</tr>

			<tr>
				<td>Password</td>
				<td>
					<input type="password" id="password" name="password"   placeholder="Enter your password" minlength="8"  mamaxlength="10"  required value="<?php echo "$password"?>">
				</td>
				<td><span class="error_form" id="passwordErrorMsg"></span></td>
				<td><span class="error"><?php echo $passwordError;?></span></td>
			</tr>
		
			<tr>
				<td>Password Confirmation </td>
				<td>
					<input type="password" id="confPassword" name="confPwd"  placeholder="Retype your password" minlength="8"  mamaxlength="10" required value="<?php echo "$confPwd"?>">
				</td>
				<td><span class="error_form" id="verifyPasswordErrorMsg"></span><td>
				<span class="error" ><?php echo $confpasswordError;?></span>
			</tr>
			
			<tr>
					<td>Captcha</td>
					<td><input type="text" name="captcha" id="captcha" placeholder="Enter captcha code" maxlength="4"></td>
					<td><input type="button" id="refresh" value="Refresh"  class="button-green" onclick="generateCaptcha();" /></td>
			</tr>
				<tr>
					<td>Input Captcha</td>
					<td><input type="text" name="captchaInput" id="captchaInput"></td>
					<td><span class="error_form" id="captchaErrorMsg"></span></td>
				</tr>
				<tr>
					<td></td>
					
					<td>
						<input type="submit" id="submitButton" name="submitButton"  class="button-purple"   value="Register">
					</td>
					
				</tr>
				
			
		</table>
		</div>
		
	</form>
</div>

</body>








