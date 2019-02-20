<?php 
include 'header.php';
include 'db_connect.php';
include 'classes/products.php';
include 'navBar.php';
include 'importExport.php';

if (isset($_GET['delete_product_id']))
{
   products::deleteProduct($connection);
}

$result = products::listProduct($connection);

?>
<head>
	<script type="text/javascript" src="js/adminValidations.js"></script>
</head>
<div class="main-container" >
	<form action="" method="POST" id="productForm" name="productForm" enctype="multipart/form-data">
		<h2>  LIST PRODUCTS </h2>
		<div style="overflow-x:auto;">
			<table>
				<thead>
					<tr>
						<th colspan="11">
							<a href="<?php echo BASE_URL; ?>/addProduct.php">
								<input type="button" name="addCategoryButton" id="addCategoryButton" value=" ADD PRODUCT" class="button-purple" >
							</a>
						</th>
						<th colspan="11">
							<a href="export.php">
								<input type="button" id="export-btn" name="export-btn"  class="button-purple"  value="EXPORT" />
							</a>
						</th>
					</tr>
					<tr>
						<form action="importExport.php" method="POST">
						<th colspan="11">
							<label>Select File</label>
							<input type="file" name="file" id="file" class="input-large">
						</th>

						<th>
							<input type="submit" id="import-btn" name="import-btn"  class="button-purple"   value="IMPORT">
						</th>
					</form>
				</tr>
				<tr>
						<th>NAME</th>
						<th>PRICE</th>
						<th>DESCRIPTION</th>
						<th>QUANTITY</th>
						<th>IMAGE</th>
						<th>CATEGORY</th>
						<th>FEATURED</th>

					<th colspan="4">ACTIONS</th>
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
							<a href="viewDetails.php?id=<?php echo $row["id"] ?>">
								<input type="button" name="btnViewDetails" id="btnViewDetails" value="View" class="button-blue" >
							</a>
						</td>

						<td>
							<a href="productImage.php?id=<?php echo $row["id"] ?>">
						<input type="button" name="btnProductImage" id="btnProductImage" value="Images" class="btn-orange">
							</a>
						</td>

						<td>
							<a href="editProduct.php?id=<?php echo $row["id"] ?>">
								<input type="button" name="btnEditProduct" id="btnEditProduct" class="button-green" value="Edit" >
							</a>
						</td>
						<td>
							<input type="submit"  name="btnDeleteProduct" id="btnDeleteProduct" class="button-red" value="Delete"
							onclick="return deleteProduct(<?php echo $row['id'];?>);"/>
							
						</td>
					</tr>
		<?php } 
	} else { ?>
    				<tr>
    					<td colspan="11">
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