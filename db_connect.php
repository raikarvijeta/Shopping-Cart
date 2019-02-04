<?php 
	include 'config.php';

	Class db_connection
	{
		function connectToDatabase()
		{
			$connection = new mysqli(servername,db_username,db_password,db_name);
			if($connection->connect_error)
			{
				die("Not Connected" .mysqli_connect_error());
			}else{
					// echo "Connected to server";
				}
				return $connection;
		}
	}
?>

