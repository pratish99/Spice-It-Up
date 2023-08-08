<?php
session_start();
include('config.php');

if(isset($_GET['search1'])){
	$search = $_GET['search'];

	$p_search = "SELECT * FROM `products_tb` WHERE Product_name='$search'";
    $result1 = mysqli_query($conn1,$p_search);
	if(mysqli_num_rows($result1) > 0){
		while($fetch_product = mysqli_fetch_assoc($result1)){
			?>
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
		 <?php
		
		}
	}
}


?>

<html>
    <head>

    </head>
    <body>
    <form action="" method="GET">
			<input class="search" type="search" placeholder="Search" aria-label="Search" name="search">
			<button class="btn" type="submit" name="search1">Search</button>
			</form>
    </body>
</html>