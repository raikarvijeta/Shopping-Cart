<?php 
		include 'db_connect.php';
		include 'adminHeader.php';
		include 'classes/users.php';


	if(isset($_POST["loginButton"])){
		user::loginUsers();
	}

?>
<div class="main-container">
	<form action="" method="POST" id="loginForm" name="loginForm" >
		<h2>LOGIN</h2>
		<table>
			<tr>
				<td>Email ID </td>
				<td><input type="text" id="emailId" name="emailId" ></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="Password" id="password" name="password" ></td>
			</tr>
			<tr>
				<td>
					<input type="submit" id="loginButton" name="loginButton"  class="button-purple"  value="Login">
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
</form>
</div>
<?php include 'adminFooter.php';?>