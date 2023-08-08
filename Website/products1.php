<?php
session_start();
@include 'config.php';

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

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="styles.css"></link>
</head>
<body>
<header>
		<div>
			<img class="logo" src="pictures/logo.png" height="45px">
		</div>
		<div>
			<input class="search" type="search" placeholder="Search" aria-label="Search">
			<button class="btn" type="submit">Search</button>
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
	


<?php  ?>

<div class="container">

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn1, "SELECT * FROM `products_tb`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="<?php echo $fetch_product['Product_img']; ?>" alt="">
            <h3><?php echo $fetch_product['Product_name']; ?></h3>
            <small><s><?php echo $fetch_product['Product_Og_price']; ?></s></small>
            <div class="price">Rs. <?php echo $fetch_product['Product_price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['Product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['Product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['Product_img']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

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
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>