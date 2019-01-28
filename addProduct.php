<?php 

include 'adminHeader.php';
include 'db_connect.php';


if(isset($_POST["addPdBttn"])) {
	addProduct();
}


function listCategories() {
	$database = new db_connection;
	$connection=$database->connectToDatabase();
	$sql = "SELECT * FROM categories";
	$result = mysqli_query($connection, $sql);
	return $result;
}

$result = listCategories();


function addProduct()
{

	$database = new db_connection;
	$connection=$database->connectToDatabase();
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
		// Check if image file of image type
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
		
		$product_image  = null;
	}

	if(isset($_POST["is_featured"])){
		$is_featured=1;
	}else{
		$is_featured=0;
	}

	$sql = "INSERT INTO products(name,price,image,quantity,description,category_id,	createdOn,updatedOn,is_featured) VALUES ('$pdName','$pdPrice','$target_file','$pdQuantity','$pdDescription','$pdCategory',NOW(),NOW(),'$is_featured')";

	if ($connection->query($sql))
	{
	    echo " added successfully";
	    header('refresh:2; url=addProduct.php');
	}else{
	    echo "Error: " . $sql . "<br>" . $connection->error;
	}
}

?>
<div class="main-container"">
	<form action="" method="POST" id=""  id="addPdFrm" name="addPdFrm" enctype="multipart/form-data" onsubmit="return validateaddProduct()">
		<h2>ADD PRODUCTS</h2>
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" id="Name" name="Name" ></td>
			</tr>
			<tr>
				<td>Price</td>
				<td>
					<input type="text" id="Price" name="Price">
				</td>

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
			<td><input type="file" id="txtImage" name="txtImage"  accept="image/*" ></td >
		</tr>
		<tr>
			<td>Featured</td>
			<td><input type="checkbox" name="is_featured" value="1" id="is_featured"></td>
		</tr>
		<tr>
			<td> Category</td>
			<td><select name="pro_category" id="pro_category">
				<?php 
				if (mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)){ ?>
						<option value="<?php echo $row["id"]; ?>">
							<?php echo $row["name"]; ?></option>
						<?php } }else { ?> 
							<option value="">Select Category</option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<input type="submit"   id="addPdBttn" name="addPdBttn"  class="button-purple"   value="ADD">
				</td>
			</tr>
		
		</table>
	</form>
</div>
<?php include 'adminFooter.php';?>

