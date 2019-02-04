<?php

include 'dbCreate.php';

class products
{

	 private $name;
	 private $price;
	 private $description;
	 private $quantity;
	 private $image;
	 private $category_id;
	 private $is_featured;
	 // public $imageError = "";

	public static function addProduct($connection)
	 {
	 	if (isset($_POST["addPdBttn"]))
	 	{
	 		$name=$_POST["Name"];
	 		$price=$_POST["Price"];
	 		$description=$_POST["Description"];
	 		$quantity=$_POST["Quantity"];
	 		$category=$_POST["pro_category"];

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
					// $check = getimagesize($_FILES["txtImage"]["tmp_name"]);
					// if($check !== false)
					// {
					// 	//echo "File is an image - " . $check["mime"] . ".";
					// 	$uploadOk = 1;
					// }else{
					// 	//echo "File is not an image.";
					// 	$uploadOk = 0;
					// }

					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					    $imageError = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						$checkValid="false";
					    $uploadOk = 0;
					}

					// Check if no error
					if ($uploadOk == 0){
						//echo "Sorry, your file was not uploaded.";
					} else{
						if (move_uploaded_file($_FILES["txtImage"]["tmp_name"], $target_file)) {
							//echo "The file ". basename( $_FILES["txtImage"]["name"]). " has been uploaded.";
						}else{
							//echo "Sorry, there was an error uploading your file.";
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
			if($uploadOk == 1){
				$sql = "INSERT INTO products(name,price,image,quantity,description,category_id,	createdOn,updatedOn,is_featured) VALUES ('$name','$price','$target_file','$quantity','$description','$category',NOW(),NOW(),'$is_featured')";
				if ($connection->query($sql))
				{
					// echo " added successfully";
					?>
					<script type="text/javascript">
						alert("Successfully Product Added");
						window.location.href = "http://cart.dev/addProduct.php";
					</script>
					<?php
					header('refresh:1; url=addProduct.php');
				}else{
					echo "Error: " . $sql . "<br>" . $connection->error;
				}
			}
	}
}


	public static function updateProduct($connection)
	{
		if (isset($_POST["editProductButton"]))
		{
			$product_id=$_POST["hd_Pro_id"];
		 	$name=$_POST["Name"];
			$price=$_POST["Price"];
			$description=$_POST["Description"];
			$quantity=$_POST["Quantity"];
			$category=$_POST["pro_category"];

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

			if(isset($_POST["is_featured"])){
				$is_featured=1;
			}else{
				$is_featured=0;
			}

			$updateSql = "UPDATE  products SET
			name='$name',
			price='$price',
			image='$target_file',
			quantity='$quantity',
			description='$description',
			updatedOn=NOW(),
			is_featured='$is_featured',
			category_id ='$category'

			WHERE id= $product_id";

			if ($connection->query($updateSql))
			{
			   // echo " Updated successfully";
				?>
				<script type="text/javascript">
					alert(" Product Updated Successfully");
					window.location.href = "http://cart.dev/Product.php";
				</script>
				<?php

			    header('refresh:1; url=product.php');
			}else{
			    echo "Error: " . $updateSql . "<br>" . $connection->error;
			}
		}

	}
	public static function deleteProduct($connection)
	{
		if (isset($_GET['delete_product_id']))
		{
			$product_id =$_GET["delete_product_id"];
			$deleteSql = "DELETE FROM products WHERE id= $product_id";
			if ($connection->query($deleteSql) === TRUE)
			{
				echo "Record deleted successfully";
				header("Refresh:0; url=product.php");
			}else{
				echo "Error in deleting record : " . $deleteSql . "<br>" . $connection->error;
			}
		}
	}
}
?>