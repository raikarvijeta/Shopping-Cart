<?php
include 'header.php';
include 'db_connect.php';
include 'classes/category.php';
if (isset($_POST['addCategoryButton']))
{
    categories::addCategory($connection);
}
?>
<div class="main-container">
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
<a href="http://cart.dev/Product.php" onclick="history.go(-1)">Go Back</a>
<?php include 'adminFooter.php';?>
