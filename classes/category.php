<?php
include 'dbCreate.php';
class categories
{
	private $name;
	public static function addCategory($connection)
	{
		if (isset($_POST["addCategoryButton"]))
		{
			$categoryName = $_POST["categoryName"];
			$sql = "INSERT INTO categories (name) VALUES ('".$categoryName."')";
			if ($connection->query($sql) === TRUE)
			{
			//echo "Category added successfully";
	 		?>
	 		<script type="text/javascript">
	 			alert(" Category added successfully");
	 			window.location.href = "http://cart.dev/addCategory.php";
	 		</script>
	 		<?php 
	 		header('refresh:2; url=http://cart.dev/addCategory.php');
	 		}
	 		else
	 		{
	 			echo "Error: " . $sql . "<br>" . $connection->error;
	 		}
	 	}
	 }
	}
?>