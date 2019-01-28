<?php
	Class db_connection 
	{
		var $server = "localhost";
		var $user = "root";
		var $password = "";
		var $db_name="cart";
		var $connection;

		function connectToDatabase()
		{
			$connection = new mysqli($this->server,$this->user,$this->password,$this->db_name);
			if($connection->connect_error) 
			{
				die("Not Connected" .$connection->connect_error);
			}
			else{
					echo "Connected to server";
				}
					return $connection;
		}
	}
?>