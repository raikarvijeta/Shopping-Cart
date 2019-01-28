<?php
include 'adminHeader.php';
include 'db_connect.php';

if (isset($_POST['addCategoryButton'])) {
    addCategory();
}

function addCategory() {
	$database = new db_connection;
	$connection=$database->connectToDatabase();
	$categoryName = $_POST["categoryName"];
	$sql = "INSERT INTO categories (name) VALUES ('".$categoryName."')";
	if ($connection->query($sql) === TRUE){
		echo "Category added successfully";
	    //header('refresh:2; url=categories.php');
	}else{
		echo "Error: " . $sql . "<br>" . $connection->error;
	}
}

?>

<div class="main-container"">
	<form action="addCategory.php" method="POST" id="addCategoryForm" name="addCategoryForm"  onsubmit="return validateCategory()">
		<h2>ADD CATEGORIES</h2>
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" id="categoryName" name="categoryName"  ></td>
			</tr>
			<tr>
				<td>
					<input type="submit"  id="addCategoryButton" name="addCategoryButton"  class="button-purple"   value="ADD">
				</td>
			</tr>
		</table>
	</form>
</div>

<?php include 'adminFooter.php';?>
