<?php
include 'header.php';
include 'conn.php';
?>
<html>
    <head>
    <title>Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">

    </head>
    <body>

    <section class="display-product-table">
    <table>

<thead>
   <th>Order id</th>
   <th>Customer name</th>
   <th>Customer userid</th>
   <th>Products</th>
   <th>Price</th>
</thead>

<tbody>
   <?php
   
      $select_products = mysqli_query($conn, "SELECT * FROM `order`");
      if(mysqli_num_rows($select_products) > 0){
         while($row = mysqli_fetch_assoc($select_products)){
   ?>

   <tr>
      <td><?php echo $row['oid']?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['userid']; ?></td>
      <td><?php echo $row['total_products']?></td>
      <td><?php echo $row['total_price']?></td>
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
    </body>
</html>