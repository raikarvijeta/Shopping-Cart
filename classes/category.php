<?php

include 'dbCreate.php';

class categories{

	private $name;
	

	public static function addCategory($connection)
	 {
	 	if (isset($_POST["addCategoryButton"])){

	 		$categoryName = $_POST["categoryName"];

	 		$sql = "INSERT INTO categories (name) VALUES ('".$categoryName."')";
	 		if ($connection->query($sql) === TRUE)
	 		{
	 			echo "Category added successfully";
	 			//header('refresh:2; url=categories.php');
	 		}else{
	 			echo "Error: " . $sql . "<br>" . $connection->error;
	 		}
	 	}
	 }


	 
}
?>