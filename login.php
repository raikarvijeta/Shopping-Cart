<?php 
		include 'db_connect.php';
		include 'header.php';
		include 'classes/users.php';
		include 'validation.php';
		session_start();


	if(isset($_POST["login-button"]))
	{
		$email=($_POST["email"]);
		$password=($_POST["password"]);
		// var_dump($checkValid);
		// exit();
		if(($checkValid == "true"))			
		{
			user::loginUsers($connection);
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


<div class="main-container">
	<form action="" method="POST" id="loginForm" name="loginForm" onsubmit="return validatelogin()">
		<h2>LOGIN</h2>
		<div class="form-container">
			<table>
			<tr>
				<td>Email ID </td>
				<td><input type="text" id="email" name="email" value="<?php echo "$email"?>"></td>
				<td><span class="error_form" id="emailErrorMsg"></span></td>
				<td><span class="error"><?php echo $emailError;?></span></td> 
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="Password" id="password" name="password" ></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" id="login-button" name="login-button"  class="button-purple"  value="Login">
				</td>
			</tr>
		<tr>
			<td>
				<a href="forgotPassword.php">Forgot Password</a>
			</td>
			<td>
				<a href="register.php" >SignUp</a>
			</td>
		</tr>
	</table>
		</div>

		
</form>
</div>
