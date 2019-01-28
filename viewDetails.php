<?php 
include 'adminHeader.php';
include 'db_connect.php';

if(isset($_GET["id"])) {
	$result = viewProductDetails();
}
$id=$_GET["id"];
function viewProductDetails(){
	$database = new db_connection;
	$connection=$database->connectToDatabase();
	$productId = $_GET["id"];
	$viewSql=" SELECT p.name,p.price, p.description, p.quantity, p.image,c.name as category_name
			   FROM products p
			   INNER JOIN categories as c ON p.category_id = c.id AND p.id = ". $productId;;

	$result = mysqli_query($connection, $viewSql);
	return $result;

}
?>
<body>
<?php require 'resources/fbShare.php'?>
<div class="main-container">
	<div class="fb-like" data-href="http://cart.dev/viewDetails.php?id=<?php echo $id ?>" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
	</div>
	<div>
		
	</div>
	<?php
	if (mysqli_num_rows($result) > 0) { 
		while($row = mysqli_fetch_assoc($result)) { ?>
			<ul class="product-details ">
				<li>
					<label>Name: </label><?php echo $row["name"]; ?>
				</li>
				<li>
					<label>Price: </label><?php echo $row["price"]; ?>
				</li>
				<li>
					<label>Description:</label>
					<?php if($row["description"]) { 
						echo $row["description"];
					}else { 
						echo "No Description Avialble";
					}?>
				</li>
				<li>
					<label>Image:</label>
					<?php if($row["image"]){
						echo "<img class='product-image' src='".$row["image"]."'>";
					}else{ 
						echo "No image Avialble";
					}?>
				</li>
			</li>
			<li>
				<label>Quantity: </label><?php echo $row["quantity"]; ?>
			</li>
			<li>
				<label>Category: </label><?php echo $row["category_name"]; ?>
			</li>
		</ul>
	<?php } 
}?>
</div>
</body>
