<?php 

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

	public static function insertUsers()
	{
		$database = new db_connection;//Accessing method.
		$connection=$database->connectToDatabase();

		if (isset($_POST['registerButton'])) 
		{
			$first_name = $_POST["txtfName"];
			$last_name = $_POST["txtlName"];
			$gender=$_POST["txtgender"];
			$email =$_POST["txteAddress"];
			$address = $_POST["txtstreetAdd"];
			$flat_no=$_POST["txtflatNo"];
			$zip_code = $_POST["zipCode"];
			$state=$_POST["txtstateName"];
			$contact =$_POST["txttelNo"];
			$fax_no=$_POST["txtfaxNo"];
			$password=$_POST["txtpass"];
			$hashedMDPassword = MD5($password);
			{
				
				$insert_query = "INSERT INTO `users`(`first_name`, `last_name`, `address`, `email`, `contact`, `gender` ,`flat_no` ,`zipcode`, `state`, `fax_no`,`password`) VALUES('$first_name','$last_name', '$address','$email','$contact','$gender','$flat_no','$zip_code','$state','$fax_no','$hashedMDPassword')";
				if ($connection->query($insert_query) === TRUE){
					//echo "New record created successfully";

					$to=$email; 	//senders name
					$subject="EMAIL VERIFICATION";
					$message="hi"; 
					$header="FROM:vijeta@gmail.com" . "\r\n"; //conacatinating 
					$header .='MIME-Version: 1.0' . "\r\n";
					$header .='Content-type:text/html; charset=UTF-8' . "\r\n";
					//echo"$email";
					mail($to, $subject, $message ,$header);
				}
				else{
						echo "Error: " . $insert_query . "<br>" . $connection->error;
					}
					$connection->close(); 
			}

		}
		
	}

	public static function loginUsers()
	{	
		
		$database=new db_connection();
		$connection=$database ->connectToDatabase();


		if (isset($_POST['loginButton'])) 
		{
			

			$emailId =$_POST['emailId'];
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
				//header('location:index.php');	
				echo "login_user";
				
			}
			else if(($row['role'] == 'admin') && $row['email'] == $emailId && $row ['password'] == $hashedPassword)
			{
				$_SESSION['login_user'] = $row['email'];
				$_SESSION['login_role'] = $row['role'];
				$_SESSION['user_logged_in'] = true;
				echo "login_admin";
				//header('location:product.php');		
			}else
			{
				$_SESSION['user_logged_in'] = false;
				echo "Failed to login";
			}
		}
	}	

}
?>


