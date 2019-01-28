<?php
include 'adminHeader.php';
include 'db_connect.php';


$result = listCategories();

if(isset($_GET["id"])) {
	$rowProduct=getProduct();
}

if(isset($_POST["editProductButton"])) {
	updateProduct();
}

function listCategories() {
	$database = new db_connection;
	$connection=$database->connectToDatabase();
	$sql = "SELECT * FROM categories";
	$result = mysqli_query($connection, $sql);
	return $result;
}

function getProduct(){
	 $database=new db_connection;
	 $connection=$database->connectToDatabase();
	 $product_id=$_GET["id"];
	 $selectSql="SELECT * FROM products WHERE id=$product_id";
	 $resultProduct = mysqli_query($connection, $selectSql);
	 $rowProduct = mysqli_fetch_assoc($resultProduct);
	 return $rowProduct;
}

function updateProduct(){
 	$database=new db_connection;
 	$connection=$database->connectToDatabase();
 	$product_id=$_POST["hd_Pro_id"];
 	$pdName=$_POST["Name"];
	$pdPrice=$_POST["Price"];
	$pdDescription=$_POST["Description"];
	$pdQuantity=$_POST["Quantity"];
	$pdCategory=$_POST["pro_category"];

	if($_FILES["txtImage"])
	{
		$product_image = $_FILES["txtImage"]["name"];
		$target_dir = "image/";
		$target_file = $target_dir.basename($_FILES["txtImage"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		if($_FILES["txtImage"]["tmp_name"])
		{
			$check = getimagesize($_FILES["txtImage"]["tmp_name"]);
			if($check !== false)
			{
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    }else{
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		    // Check if no error
			if ($uploadOk == 0){
			    echo "Sorry, your file was not uploaded.";
			} else 
			{
			    if (move_uploaded_file($_FILES["txtImage"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["txtImage"]["name"]). " has been uploaded.";
			    }else{
			        echo "Sorry, there was an error uploading your file.";
			    }
			}			
		}
	}else{
		
		$product_image = $_POST["hd_old_img"];
	}

	$updateSql = "UPDATE  products SET
	name='$pdName',
	price='$pdPrice',
	image='$target_file',
	quantity='$pdQuantity',
	description='$pdDescription',
	updatedOn=NOW(),
	category_id ='$pdCategory'

	WHERE id= $product_id";

	if ($connection->query($updateSql))
	{
	    echo " Updated successfully";
	    //header('refresh:2; url=product.php');
	}else{
	    echo "Error: " . $updateSql . "<br>" . $connection->error;
	}
}

?>
<div class="main-container"">
	<form action="" method="POST" id=""  id="addProductForm" name="addProductForm" enctype="multipart/form-data">
		<h2>EDIT PRODUCTS</h2>
		<table>
			<tr>
				<input type="hidden"  value="<?php if(isset($rowProduct['id'])){echo $rowProduct['id'];}?>" name="hd_Pro_id">
				<td>Name</td>
				<td><input type="text" value="<?php if(isset($rowProduct['name'])){echo $rowProduct['name'];}?>" id="Name" name="Name" required="required"></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input type="text"  value="<?php if(isset($rowProduct['price'])){echo $rowProduct['price'];}?>" id="Price" name="Price" required="required"></td>
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
					
				</td>
				<td>
					<input type="submit"  id="editProductButton" name="editProductButton"  class="button-purple"   value="UPDATE">
				</td>
			</tr>
		
		</table>
	</form>
</div>
