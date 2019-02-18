<?php
include 'header.php';
include 'db_connect.php';
include 'classes/products.php';
include 'validation.php';


if(isset($_POST["editProductButton"]))
{
	if(($checkValid == "true"))
	{
		products::updateProduct($connection);
	}
	
}

function listCategories($connection) {
	$sql = "SELECT * FROM categories";
	$result = mysqli_query($connection, $sql);
	return $result;
}
$result = listCategories($connection);

function getProduct($connection){
	 $product_id=$_GET["id"];
	 $selectSql="SELECT * FROM products WHERE id=$product_id";
	 $resultProduct = mysqli_query($connection, $selectSql);
	 $rowProduct = mysqli_fetch_assoc($resultProduct);
	 return $rowProduct;
}
if(isset($_GET["id"])) {
	$rowProduct=getProduct($connection);
}

?>
<div class="main-container"">
	<form action="" method="POST" id=""  id="editProductForm" name="editProductForm" enctype="multipart/form-data">
		<h2>EDIT PRODUCTS</h2>
		<table>
			<tr>
				<input type="hidden"  value="<?php if(isset($rowProduct['id'])){echo $rowProduct['id'];}?>" name="hd_Pro_id">
				<td>Name</td>
				<td><input type="text" value="<?php if(isset($rowProduct['name'])){echo $rowProduct['name'];}?>" id="Name" name="Name" ></td>
			
				<td><span class="error"> <?php echo $productnameError; ?></span><br><br></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input type="text"  value="<?php if(isset($rowProduct['price'])){echo $rowProduct['price'];}?>" id="Price" name="Price" ></td>
				<td><span class="error"> <?php echo $priceError; ?></span><br><br></td>
			</tr>
			<tr>
			<td>Description</td>
			<td><input type="text" value="<?php if(isset($rowProduct['description'])){echo $rowProduct['description'];}?>" id="Description" name="Description" required="required"></td>
			</tr>
			<tr>
			<td>Quantity</td>
			<td><input type="text" value="<?php if(isset($rowProduct['quantity'])){echo $rowProduct['quantity'];}?>" id="Quantity" name="Quantity" required="required"></td>
		</tr>
		<tr>
			<td>Image</td>
			<td><input type="file" id="txtImage" name="txtImage"  accept="image/*" required="required">
			<span>Existing Image:<?php echo $rowProduct['image']?></span>
			<input type="hidden" value="<?php echo $rowProduct['image']?>" name="hd_old_img" id="hd_old_image"/>
			</td >
		</tr>
		<tr>
			<td>Select Product Images to Upload</td>
			<td><input type="file" name="multiple-imgProduct[]" id="multiple-imgProduct" accept="image/*" multiple></td>
		</tr>
		<tr>
			<td>Featured</td>
			<td><input type="checkbox" name="is_featured" value="<?php if(isset($rowProduct['is_featured'])) {echo $rowProduct['is_featured'];} else echo 1;?>" id="is_featured" <?php if($rowProduct['is_featured'] == 1) { echo "checked"; } ?>></td>
		</tr>
		<tr>
				<td> Category</td>
				<td>
					<select name="pro_category" id="pro_category">
					<?php 
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) { 

						?>
						<option value="<?php echo $row["id"]; ?>" 

				<?php if($rowProduct['category_id'] == $row["id"]) 
				echo "selected"; ?> >
							<?php echo $row["name"]; ?>
						</option>
					<?php } 
				} else { ?> 
						<option value="">No Categories Available</option>
				<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<a href="http://cart.sj/Product.php" onclick="history.go(-1)">Go Back</a>
				</td>	

				<td>
					<input type="submit"  id="editProductButton" name="editProductButton"  class="button-purple"   value="UPDATE">
				
				</td>

			</tr>
		
		</table>
	</form>
</div>
