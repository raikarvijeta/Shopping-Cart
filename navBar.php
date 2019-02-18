<?php
session_start();
?>
<div class="main-container">
	<div class="header-nav">
		<div class="header-right">
			<a class="active" href="">Home</a>
		<?php
			if( ( $_SESSION['login_role']) == "user")
			{?>
				<a href="http://cart.sj/login.php">Login</a>
				<a href="http://cart.sj/contactUs.php">Contact Us</a>
				<a href="http://cart.sj/register.php">Register</a>
				<a href="logout.php">Logout</a>
				<?php
			}
			?>
			<?php 
			if (($_SESSION['login_role'])=="admin")
			{?>
				 <a href="">Orders</a> 
				 <a href="">Sale</a>
				 <a href="">Offers</a>
				 <div class="dropdown">
				 	<button class="dropbtn">Product 
						<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content">
						<a href="http://cart.dev/addCategory.php">Category</a>
					</div>
				</div>
				<?php
			}?>
		</div>
	</div>
</div>