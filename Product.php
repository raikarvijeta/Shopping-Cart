<?php 
include 'adminHeader.php';
include 'db_connect.php';


if (isset($_GET['delete_product_id'])) {
   deleteProduct();
}

function listProduct(){
	$database = new db_connection;
	$connection=$database->connectToDatabase();
	$sql = "SELECT p.id,p.name, p.price, p.description, p.quantity, p.image, p.is_featured, c.name as category_name
			FROM products p
		    INNER JOIN categories c ON p.category_id = c.id
		    ORDER BY createdOn DESC";

	$result = mysqli_query($connection, $sql);
	return $result;
}

$result=listProduct();

function deleteProduct(){

	$database=new db_connection;
	$connection=$database->connectToDatabase();
	$product_id =$_GET["delete_product_id"];
	$deleteSql = "DELETE FROM products WHERE id= $product_id";
	
	if ($connection->query($deleteSql) === TRUE){
		echo "Record deleted successfully";
	    header("Refresh:0; url=product.php");	
	}else{
		  echo "Error in deleting record : " . $deleteSql . "<br>" . $connection->error;
		}
	}
?>


<head>
	<script type="text/javascript" src="js/adminValidations.js">
</script>
</head>
<div class="main-container" >
	<form action="addProduct.php" method="POST" id="addCategoryForm" name="addCategoryForm" enctype="multipart/form-data">
		<h2>LIST PRODUCTS </h2>
		<div style="overflow-x:auto;">
					<table>
			<thead>
				<tr>
					<th colspan="10">
						<input type="submit" id="addCategoryButton" name="addCategoryButton"  class="button-purple"  href="addProduct.php" value="ADD PRODUCT">
					</th>
				</tr>
				<tr>
					<th>NAME</th>
					<th>PRICE</th>
					<th>DESCRIPTION</th>
					<th>QUANTITY</th>
					<th>IMAGE</th>
					<th>CATEGORY</th>
					<th>FEATURED</th>

					<th colspan="3">ACTIONS</th>
				</tr>
				<tbody>
					<tbody>
			<?php
			if (mysqli_num_rows($result) > 0) { // output data of each row when query run
            while($row = mysqli_fetch_assoc($result)) { ?>
        		<tr>
					<td><?php echo $row["name"]; ?> </td>
					<td><?php echo $row["price"]; ?> </td>
					<td><?php echo $row["description"]; ?> </td>
					<td><?php echo $row["quantity"]; ?></td>
					<td><img class="product-image" src="<?php echo $row["image"]; ?>" /></td>
					<td><?php echo $row["category_name"];?></td>
					<td><?php 
						if($row["is_featured"] == 1) { ?>
						<input type="checkbox" name="is_featured" value="1" id="is_featured" checked disabled="disabled">
						<?php } else { ?>
							<input type="checkbox" name="is_featured" value="0" id="is_featured" disabled="disabled">
						<?php } ?>
					</td>

					<td>
						<a class="button-green" href="editProduct.php?id=<?php echo $row["id"] ?>">Edit</a>
					</td>
					<td>
						<a class="button-green" href="viewDetails.php?id=<?php echo $row["id"] ?>">VIEW</a>
					</td>
					<td>
						<input type="submit"  name="btnDeleteProduct" id="btnDeleteProduct" class="button-red" value="Delete"
						onclick="return deleteProduct(<?php echo $row['id'];?>);"/>
						
					</td>
				</tr>
		<?php } 
	} else { ?>
    				<tr>
    					<td colspan="6">
    						No Products Available
    					</td>
    				</tr>
<?php }
				?>
				
			</tbody>
				</tbody>
			</thead>
		</table>
			
		</div>

	</form>
</div>

