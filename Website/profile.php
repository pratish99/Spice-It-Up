<?php
include 'conn.php';
session_start();
if($_SESSION['user']){
    if(isset($_POST['logout'])){
        session_destroy();
        header('location:register.php');
    }
}else{
    echo "<script>alert('Please login to add to cart')</script>";
    header('location:register.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `order` WHERE oid = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:profile.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:admin.php');
      $message[] = 'product could not be deleted';
   };
};
?>

<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   
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
   

    <h1>Your Details</h1>
    <section class="display-product-table">
    <table>

<thead>
   <th>Customer userid</th>
   <th>Customer name</th>
   <th>Customer Email</th>
   <th>Customer address</th>
   <th>Customer mobileno</th>
</thead>

<tbody>
   <?php
    $user = $_SESSION['user'];
      $select_products = mysqli_query($conn, "SELECT * FROM `customer_register` where userid='$user' ");
      if(mysqli_num_rows($select_products) > 0){
         while($row = mysqli_fetch_assoc($select_products)){
   ?>

   <tr>
       <td><?php echo $row['userid']; ?></td>
       <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['address']?></td>
      <td><?php echo $row['mobile no']?></td>
   </tr>

   <?php
      };    
      }else{
         echo "<div class='empty'>no product added</div>";
      };
   ?>
</tbody>
</table>
    </section>

    <h1>Your Orders</h1>
    <section class="display-product-table">
    <table>

<thead>
   <th>Products</th>
   <th>Amount</th>
   <th></th>
</thead>

<tbody>
   <?php
   
      $select_products = mysqli_query($conn, "SELECT * FROM `order` where userid='$user' ");
      if(mysqli_num_rows($select_products) > 0){
         while($row = mysqli_fetch_assoc($select_products)){
   ?>

   <tr>
      <td><?php echo $row['total_products']?></td>
      <td><?php echo $row['total_price']?></td>
      <td><a href="profile.php?delete=<?php echo $row['oid'];?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a></td>
   </tr>

   <?php
      };    
      }else{
         echo "<div class='empty'>no product added</div>";
      };
   ?>
</tbody>
</table>
    </section>

    <form action="" method="POST">
        <button type="submit" name="logout" class="btn"> logout </button>
    </form>
    <a href="password.php">change password</a>
    
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