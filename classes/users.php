<?php 
	include 'dbCreate.php';

class user
{
	private $first_name;
	private $last_name ;
	private $gender;
	private $email;
	private $address;
	private $flat_no;
	private $zip_code;
	private $state;
	private $contact;
	private $fax_no;
	private $password;

	public static function insertUsersAndEmail($connection){
		if (isset($_POST['submitButton']))
		{
			$first_name = $_POST["fName"];
			$last_name = $_POST["lName"];
			$gender=$_POST["gender"];
			$email =$_POST["email"];
			$address = $_POST["address"];
			$flat_no=$_POST["flatNo"];
			$zip_code = $_POST["zipCode"];
			$state=$_POST["state"];
			$contact =$_POST["phoneNo"];
			$fax_no=$_POST["faxNo"];
			$password=$_POST["password"];
			$hashedMDPassword = MD5($password);

			$sql = $connection->query("SELECT email FROM users WHERE email='$email'");
    		if($sql->num_rows > 0){
    			?>
      			<script type="text/javascript">
      				alert("email alredy exist");
      			</script>
      			<?php
      			 }else{
				
				$insert_query = "INSERT INTO `users`(`first_name`, `last_name`, `address`, `email`, `contact`, `gender` ,`flat_no` ,`zipcode`, `state`, `fax_no`,`password`) VALUES('$first_name','$last_name', '$address','$email','$contact','$gender','$flat_no','$zip_code','$state','$fax_no','$hashedMDPassword')";
				if ($connection->query($insert_query) === TRUE){
				$to=$email; 	//senders name
				$subject="EMAIL VERIFICATION";
				$message="hi"; 
				$header="FROM:vijeta@gmail.com" . "\r\n"; //conacatinating 
				$header .='MIME-Version: 1.0' . "\r\n";
				$header .='Content-type:text/html; charset=UTF-8' . "\r\n";
				mail($to, $subject, $message ,$header);
				?>
				<script type="text/javascript">
					alert("Successfully Register");
					window.location.href = "http://cart.dev/login.php";
				</script>
				<?php
			}else{
				echo "Error: " . $insert_query . "<br>" . $connection->error;
			}
			$connection->close(); 
		}


	}
		
}

	public static function loginUsers($connection)
	{	
		if (isset($_POST['login-button']))
		{
			$emailId =$_POST['email'];
			$password =$_POST['password'];
			$hashedPassword = MD5($password);
			$login_query = "SELECT * FROM users WHERE email = '$emailId' AND password = '$hashedPassword'";
			$result=$connection->query($login_query);
			$row = mysqli_fetch_array($result);
			if(($row['role'] == 'user' )&& $row['email'] == $emailId && $row ['password'] == $hashedPassword)
			{
				$_SESSION['login_user'] = $row['email'];
				$_SESSION['login_role'] = $row['role'];
				$_SESSION['user_logged_in'] = true; 
				 header('location:index.php');	
				//echo "login_user";
			}elseif(($row['role'] == 'admin') && $row['email'] == $emailId && $row ['password'] == $hashedPassword)
			{
				$_SESSION['login_user'] = $row['email'];
				$_SESSION['login_role'] = $row['role'];
				$_SESSION['user_logged_in'] = true;
				//echo "login_admin";
				 header('location:product.php');
			}else{
				$_SESSION['user_logged_in'] = false;
				?>
				<script type="text/javascript">
					alert("Failed to login");
					window.location.href = "http://cart.dev/login.php";
				</script>
				<?php
			}
		}
	}

	public static function forgotPassword($connection)
	{
		if (isset($_POST['frgtPwdButton']))
		{
			$to= $_POST['email'];
			$frgtPwdSql = "SELECT email FROM users WHERE email ='$to'";
			$result=$connection->query($frgtPwdSql);
			$counter = mysqli_num_rows($result);
			if($counter==1)
			{
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
	}


	public static function submitContactUs($connection)
	{
		if (isset($_POST['submitButton']))
		{
			$fName=$_POST["fName"];
			$email=$_POST["email"];
			$Message=$_POST["message"];
			$sql = "INSERT INTO contactus (name,email,message) VALUES ('".$fName."','".$email."','".$Message."')";

			if ($connection->query($sql)==TRUE)
			{
				echo " Feedback Submited Successfully";
				$toEmail = "vijeta.raikar@sjinnovation.com";
				$tittle="FEEDBACK";
				$mailHeaders = "From: " . $_POST["fName"] . "<". $_POST["email"] .">\r\n";
				if(mail($toEmail,$tittle, $Message, $mailHeaders))
				{
					echo"<p class='success'>Contact Mail Sent.</p>";
				}else{
					echo "Error: " . $sql . "<br>" . $connection->error;
				}
			}

		}
	
	}
}
?>


