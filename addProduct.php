<?php 
include 'header.php';
include 'db_connect.php';
include 'classes/products.php';
include 'validation.php';


if(isset($_POST["addPdBttn"]))
{
	if(($checkValid == "true"))	
	{
		products:: addProduct($connection);
	}
}

function listCategories($connection)
{
	$sql = "SELECT * FROM categories";
	$result = mysqli_query($connection, $sql);
	return $result;
}
$result = listCategories($connection);
?>
<div class="main-container"">
	<form action="" method="POST" id=""  id="addPdFrm" name="addPdFrm" enctype="multipart/form-data" onsubmit="return validateaddProduct()">
		<h2>ADD PRODUCTS</h2>
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" id="Name" name="Name" ></td>
				<td><span class="error"> <?php echo $productnameError; ?></span><br><br></td>

			</tr>
			<tr>
				<td>Price</td>
				<td><input type="text" id="Price" name="Price"></td>
				<td><span class="error"> <?php echo $priceError; ?></span><br><br></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><input type="text" id="Description" name="Description"></td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td><input type="text" id="Quantity" name="Quantity" ></td>
			</tr>
			<tr>
				<td>Image</td>
				<td><input type="file" id="txtImage" name="txtImage"  accept="image/*"></td>
				<td><span class="error"> <?php echo $imageError; ?></span><br><br></td>
			</tr>
			<tr>
				<td>Featured</td>
				<td><input type="checkbox" name="is_featured" value="1" id="is_featured"></td>
			</tr>
			<tr>
				<td> Category</td>
				<td><select name="pro_category" id="pro_category">
					<?php 
					if (mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_assoc($result))
							{ ?>
								<option value="<?php echo $row["id"]; ?>">
									<?php echo $row["name"]; ?></option>
					  <?php } 
					}
					else
						{ ?> 
							<option value="">Select Category</option>
				   <?php}?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<a href="http://cart.sj/Product.php" onclick="history.go(-1)">Go Back</a>
				</td>
				<td>
					<input type="submit"   id="addPdBttn" name="addPdBttn"  class="button-purple"   value="ADD">
				</td>
			</tr>
		</table>
	</form>
</div>
<?php include 'adminFooter.php';?>
