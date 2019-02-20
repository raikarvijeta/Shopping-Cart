<?php 
include 'header.php';
include 'db_connect.php';
include 'dbCreate.php';
include 'classes/products.php';

$id=$_GET["id"];

if(isset($_GET["id"]))
{
	$result =products::viewProductDetails($connection);
}

if (isset($_GET["id"]))
{
	$quantity=products::listQuantity($connection);
}

?>

<?php require 'resources/fbShare.php'?>
<div class="main-container">
	<td>
		<a href="<?php echo BASE_URL?>/Product.php" onclick="history.go(-1)">Go Back</a>
	</td>
	<div class="box-container">
		<?php
		if (mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$name=$row["name"];
				$price=$row["price"];
				?>
				<ul class="product-details">
					<li>
						<label>Name: </label><?php echo $row["name"]; ?>
					</li>
					<li>
						<label>Price: </label><?php echo $row["price"]; ?>
					</li>
					<li>
						<label>Description:</label>
						<?php
						if($row["description"])
						{ 
							echo $row["description"];
						}else
						{ 
							echo "No Description Avialble";
						}
						?>
					</li>
					<li>
						<label>Image:</label>
						<?php if($row["image"])
						{
							echo "<img class='product-image' src='".$row["image"]."'>";
						}
						else
						{
							echo "No image Avialble";
						}
						?>
					</li>
					<li>
						<label>Quantity: </label><?php echo $row["quantity"]; ?>
					</li>
					<li>
						<label>Category: </label><?php echo $row["category_name"]; ?>
					</li>
				</ul>
				<?php
			}
		}
		?>
	</div>

	<div class="lightbox-container">
		<h2 style="text-align:center">Product Gallery</h2>
		<div class="container">
			<?php

				$imgIndex = 0;
				$sql="SELECT image FROM product_image WHERE product_id = $id";
				$result=mysqli_query($connection,$sql);
				while($row = mysqli_fetch_array($result))
				{
					$imgIndex++;
					$image=$row['image'];
					if($imgIndex == 1)
						{
							?>
							<img  id="bigImg" class="img-class" src="image/<?php echo $row['image']?>" style="width:500px; height:200px; object-fit: contain; max-width:700px" onClick="openLightbox(this)" />
							<div id="myModal" class="modal">
								<span class="close" onClick="closeLightbox(this)">&times;</span>
								<img  id="img01"  class="modal-content"  src="image/<?php echo $row['image']?>"/>
							</div>
							<?php
						}?>
						<img  src="image/<?php echo $image ?>" style="height:100px;width:100px; object-fit: contain;" onClick="imageSwap(this)"/>
						<?php
				}?>
		</div>

		<form style="float: right" action="cartDetails.php?id=<?php echo $id; ?>&name=<?php echo $name; ?>&price=<?php echo $price; ?>" method="POST">

			Quantity
			<select name="productQty" style="padding: 5px 12px 5px 12px;">
				<?php for ($i = 0; $i <= $quantity; $i++) : ?>
					<option value= "<?php echo $i; ?>"><?php echo $i;?></option>
				<?php endfor; ?>
			</select>
			<input type="submit" id="addToCart" name="addToCart"  class="button-purple"  value="ADD TO CART" />

			<div class="fb-like" data-href="<?php echo BASE_URL?>/viewDetails.php?id=<?php echo $id ?>" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true">
		
	</div>
		</form>
	</div>
<?php include 'adminFooter.php';?>