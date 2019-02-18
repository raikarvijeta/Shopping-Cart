<?php 
include 'db_connect.php';
include 'dbCreate.php';
include 'header.php';
include 'navBar.php';


function featuredProducts($connection)
{
	$imageSql = "SELECT name,description,image,is_featured FROM products WHERE is_featured=1";
	$imgResult=mysqli_query($connection,$imageSql);
	return $imgResult;
}

$imgResult=featuredProducts($connection);	
?>
<div class="main-container">
	<div class="slideshow-container"><!-- Slideshow container -->
		<?php 
		if (mysqli_num_rows($imgResult) > 0)
		{
			$totalProducts = mysqli_num_rows($imgResult);
			$counter = 1;
			while($row = mysqli_fetch_assoc($imgResult)) 
				{ ?>
							<div class="mySlides fade">
							<div class="numbertext">
								<?php echo $counter; ?> / <?php echo $totalProducts; ?>
							</div>
							<?php if($row['image'] != "") 
							{ ?>
								<img src="<?php echo $row['image']; ?>" style="width: 450px; height: 350px;">
					  <?php } 
					  else
					  	{ ?>
						<img src="image/no-image.png">
				  <?php } ?>
				  <div class="text">
						<?php echo $row['name']; ?>--<!-- <?php echo $row['description']; ?> --></div>
					</div>
					<?php $counter++;
			    }?>
			    <a class="prev" onclick="plusSlides(-1)">Prev</a>
			    <a class="next" onclick="plusSlides(1)">Next </a>
 <?php }
	else{ ?>
		<div>
		    <h3>No featured events</h3>
		</div>
  <?php } ?>
</div>
<br>
</div>
<div class="customerView-container">
	<?php include 'customerView.php'?>
</div>
<?php include 'userFooter.php'?>
