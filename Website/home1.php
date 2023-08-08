<?php
session_start();
include('config.php');
if(isset($_POST['add_to_cart'])){

	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$product_image = $_POST['product_image'];
	$product_quantity = 1;

	$select_cart = mysqli_query($conn1, "SELECT * FROM `cart` WHERE name = '$product_name'");

	if(mysqli_num_rows($select_cart) > 0){
	   echo "<script>alert('product already added')</script>";
	}
	else{
	   if(isset($_SESSION['user'])){
	   $insert_product = mysqli_query($conn1, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
	   echo "<script>alert('product added to cart')</script>";
	   }
	   else{
		  echo "<script>alert('Please login to add to cart')</script>";
		  header('location:register.php');
	   }
	}

}



?>

<html>
<head>
<title> Home </title>
   <!-- custom css file link  -->
   
   <link rel="stylesheet" href="styles.css"></link>

</head>
<body>
	<header>
		<div>
			<img class="logo" src="pictures/logo.png" height="45px">
		</div>
		<div>
			<form action="" method="GET">
			<input class="search" type="search" placeholder="Search" aria-label="Search" name="search">
			<a class="btn" type="submit" name="search1" href="#">Search</a>
			</form>
		</div>
		
				<nav>
				<ul class="nav_links">
					<li><a href="home1.php">Home</a></li>
					<li><a href="mycart.php">My Cart</a></li>
					<li><a href="products1.php">Products</a></li>
					<li><a href="profile.php"><?php if(isset($_SESSION['user'])){echo $_SESSION['user'];}
					else{
						echo "Profile";
					} ?></a></li>
	
				</ul> 
		</div>
		</nav>
	</header>
	<div>
			<img class="banner" src="Pictures/banner2.jpg" alt="Banner Image">
	</div>
	
	<section class="items">
        <div class="card-container">
        <div class="card">
		<?php
		
      	$select_products = mysqli_query($conn1, "SELECT * FROM `products_tb` WHERE pid = 1");
      	if(mysqli_num_rows($select_products) > 0){
        	$fetch_product = mysqli_fetch_assoc($select_products);
		  }
      	?>
			<form action="" method="POST">
            <div>
                <img src="<?php echo $fetch_product['Product_img']; ?>" alt="product image">
            </div>
            <h3><?php echo $fetch_product['Product_name']; ?></h3>
			<small><s>Rs. <?php echo $fetch_product['Product_Og_price']; ?>/-</s></small>
            <div class="price">Rs. <?php echo $fetch_product['Product_price']; ?>/-</div>
			<input type="hidden" name="product_name" value="<?php echo $fetch_product['Product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['Product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['Product_img']; ?>">
			<input type="submit" class="btn" value="add to cart" name="add_to_cart">
        </div>
		</form>
        <div class="card">
		<?php
		
		$select_products = mysqli_query($conn1, "SELECT * FROM `products_tb` WHERE pid = 2");
		if(mysqli_num_rows($select_products) > 0){
		  $fetch_product = mysqli_fetch_assoc($select_products);
		}
		?>
		<form action="" method="POST">
            <div>
                <img src="<?php echo $fetch_product['Product_img']; ?>" alt="product image">
            </div>
            <h1><?php echo $fetch_product['Product_name']; ?></h1>
			<small><s>Rs. <?php echo $fetch_product['Product_Og_price']; ?>/-</s></small>
            <p>Rs. <?php echo $fetch_product['Product_price']; ?>/-</p>
			<input type="hidden" name="product_name" value="<?php echo $fetch_product['Product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['Product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['Product_img']; ?>">
			<input type="submit" class="btn" value="add to cart" name="add_to_cart">
        </div>
		</form>
        <div class="card">
		<?php
		
		$select_products = mysqli_query($conn1, "SELECT * FROM `products_tb` WHERE pid = 3");
		if(mysqli_num_rows($select_products) > 0){
		  $fetch_product = mysqli_fetch_assoc($select_products);
		}
		?>
		<form action="" method="POST">
            <div>
                <img src="<?php echo $fetch_product['Product_img']; ?>" alt="product image">
            </div>
            <h1><?php echo $fetch_product['Product_name'];?></h1>
			<small><s>Rs. <?php echo $fetch_product['Product_Og_price']; ?>/-</s></small>
            <p>Rs. <?php echo $fetch_product['Product_price']; ?>/-</p>
			<input type="hidden" name="product_name" value="<?php echo $fetch_product['Product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['Product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['Product_img']; ?>">
			<input type="submit" class="btn" value="add to cart" name="add_to_cart">
        </div>
		</form>
        <div class="card">
		<?php
		
		$select_products = mysqli_query($conn1, "SELECT * FROM `products_tb` WHERE pid = 4");
		if(mysqli_num_rows($select_products) > 0){
		  $fetch_product = mysqli_fetch_assoc($select_products);
		}
		?>
		<form action="" method="POST">
            <div>
                <img src="<?php echo $fetch_product['Product_img']; ?>" alt="product image">
            </div>
            <h1><?php echo $fetch_product['Product_name'];?></h1>
			<small><s>Rs. <?php echo $fetch_product['Product_Og_price']; ?>/-</s></small>
            <p>Rs. <?php echo $fetch_product['Product_price']; ?>/-</p>
			<input type="hidden" name="product_name" value="<?php echo $fetch_product['Product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['Product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['Product_img']; ?>">
			<input type="submit" class="btn" value="add to cart" name="add_to_cart">
        </div>
        </div>
	</form>
		<div class="card-container">
			<div class="card">
			<?php
		
		$select_products = mysqli_query($conn1, "SELECT * FROM `products_tb` WHERE pid = 9");
		if(mysqli_num_rows($select_products) > 0){
		  $fetch_product = mysqli_fetch_assoc($select_products);
		}
		?>
		<form action="" method="POST">
				<div>
					<img src="<?php echo $fetch_product['Product_img']; ?>" alt="product image">
				</div>
				<h1><?php echo $fetch_product['Product_name'];?></h1>
				<small><s>Rs. <?php echo $fetch_product['Product_Og_price']; ?>/-</s></small>
				<p>Rs. <?php echo $fetch_product['Product_price']; ?>/-</p>
				<input type="hidden" name="product_name" value="<?php echo $fetch_product['Product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['Product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['Product_img']; ?>">
				<input type="submit" class="btn" value="add to cart" name="add_to_cart">
			</div>
			</form>
			<div class="card">
			<?php
		
		$select_products = mysqli_query($conn1, "SELECT * FROM `products_tb` WHERE pid = 10");
		if(mysqli_num_rows($select_products) > 0){
		  $fetch_product = mysqli_fetch_assoc($select_products);
		}
		?>
		<form action="" method="POST"><
				<div>
					<img src="<?php echo $fetch_product['Product_img']; ?>" alt="product image">
				</div>
				<h1><?php echo $fetch_product['Product_name'];?></h1>
				<small><s>Rs. <?php echo $fetch_product['Product_Og_price']; ?>/-</s></small>
				<p>Rs. <?php echo $fetch_product['Product_price']; ?>/-</p>
				<input type="hidden" name="product_name" value="<?php echo $fetch_product['Product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['Product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['Product_img']; ?>">
				<input type="submit" class="btn" value="add to cart" name="add_to_cart">
			</div>
			</form>
			<div class="card">
			<?php
		
		$select_products = mysqli_query($conn1, "SELECT * FROM `products_tb` WHERE pid = 11");
		if(mysqli_num_rows($select_products) > 0){
		  $fetch_product = mysqli_fetch_assoc($select_products);
		}
		?>
		<form action="" method="POST">
				<div>
					<img src="<?php echo $fetch_product['Product_img']; ?>" alt="product image">
				</div>
				<h1><?php echo $fetch_product['Product_name'];?></h1>
				<small><s>Rs. <?php echo $fetch_product['Product_Og_price']; ?>/-</s></small>
				<p>Rs. <?php echo $fetch_product['Product_price']; ?>/-</p>
				<input type="hidden" name="product_name" value="<?php echo $fetch_product['Product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['Product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['Product_img']; ?>">
				<input type="submit" class="btn" value="add to cart" name="add_to_cart">
			</div>
			</form>
			<div class="card">
			<?php
		
		$select_products = mysqli_query($conn1, "SELECT * FROM `products_tb` WHERE pid = 12");
		if(mysqli_num_rows($select_products) > 0){
		  $fetch_product = mysqli_fetch_assoc($select_products);
		}
		?>
		<form action="" method="POST">
				<div>
					<img src="<?php echo $fetch_product['Product_img']; ?>" alt="product image">
				</div>
				<h1><?php echo $fetch_product['Product_name'];?></h1>
				<small><s>Rs. <?php echo $fetch_product['Product_Og_price']; ?>/-</s></small>
				<p>Rs. <?php echo $fetch_product['Product_price']; ?>/-</p>
				<input type="hidden" name="product_name" value="<?php echo $fetch_product['Product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['Product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['Product_img']; ?>">
				<input type="submit" class="btn" value="add to cart" name="add_to_cart">
			</div>
			</form>
			</div>
			</section>
			<section class="items" id="partner">
				<div class="productIntro">
					<h1> Our Partners </h1>
				</div>
				<div class="card-container">
				<div class="card">
					<div>
						<img src="Pictures/everestlogo.png" alt="product image">
					</div>
				</div>
				<div class="card">
					<div>
						<img src="Pictures/patanjalilogo.png" alt="product image">
					</div>
				</div>
				<div class="card">
					<div>
						<img src="Pictures/badshahlogo.png" alt="product image">
					</div>
				</div>
				<div class="card">
				<div>
					<img src="Pictures/pushplogo.png" alt="product image">
				</div>
			</section>
	
			<footer>
				<div>
					<img src="pictures/logo.png">
					<p>&copy; 2022, Spice-It-Up</p>
				</div>
				<div>
					<a href="#">Contact Us</a>	
					<a href="aboutus.html">About Us</a>
				</div>
			</footer>
</body>
</html>