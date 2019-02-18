<?php 
include 'header.php';
include 'db_connect.php';
include 'classes/products.php';
include 'navBar.php';

if (isset($_GET['delete_productImg_id'])) 
{
   products::deleteProductImg($connection);
}

function listProductImages($connection)
{
	$productImgId=$_GET["id"];
	$sql = "SELECT image from product_image where product_id = $productImgId ";
	$result = mysqli_query($connection, $sql);
	return $result;
}

$result=listProductImages($connection);
// var_dump($result);
// exit();
?>
<head>
	<script type="text/javascript" src="js/adminValidations.js"></script>
</head>
<div class="main-container" >
	<form action="productImage.php" method="POST" id="productImage" name="productImage" enctype="multipart/form-data">
		<h2> PRODUCT IMAGES</h2>
		<div style="overflow-x:auto;">
			<table>
				<tr>
					<th>IMAGES</th>
					<th colspan="1">ACTION</th>
				</tr>
				<tbody>
					<?php
					if (mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_assoc($result)) 
							{?>
								<tr>
									<td><img class="product-image" src="image/<?php echo $row["image"]?>" ></td>
									<td>
										<input type="submit"  name="btnDeleteProductImg" id="btnDeleteProductImg" class="button-red" value="Delete"onclick="return deleteProductImg(<?php echo $row['id'];?>);"/>
									</td>
									</tr>
					  <?php }
					} 
					else 
						{ ?>
							<tr>
								<td colspan="2">No Products Available</td>
								</tr>
				  <?php }?>
				  <a href="http://cart.sj/Product.php" onclick="history.go(-1)">Go Back</a>
				</tbody>
			</table>
		</div>
	</form>
</div>
			
