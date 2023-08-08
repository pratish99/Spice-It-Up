<?php
include 'header.php';
include 'conn.php';
?>
<html>
    <head>
    <title>Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">

    </head>
    <body>

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
   
      $select_products = mysqli_query($conn, "SELECT * FROM `customer_register`");
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
    </body>
</html>