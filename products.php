<?php
      
    $msg;
    require 'components/checkLogin.php';
    require 'components/dbconnect.php';
    
    if(isset($_GET['category']))
    {
        
        $category = $_GET['category'];
        //for products category wise
        $sql = "SELECT *  FROM `products` WHERE `category` = '$category'";
        $_GET['category']=NULL;
        
    }
    else
    {
        //for all product
        $sql = "SELECT * FROM `products`";
    }
    
    $result = mysqli_query($conn, $sql);
    $numOfProducts = mysqli_num_rows($result);
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/card.css" />
    <link rel="stylesheet" href="css/homepage.css" />
    <script src="https://kit.fontawesome.com/52d221e002.js" crossorigin="anonymous"></script>
    <title>Our Products</title>
    <style>
      .product-container::before {
        content: "Our Products";
      }
    </style>
  </head>
  <body>
    <?php include './components/navbar.php'?>
    <?php if($numOfProducts>0) : ?>
    <div class="product-container">
      <h3>Shop Form a Variety of products<br></h3>
      <div class="products">
        <?php 
        while($product = mysqli_fetch_assoc($result))
        {
          $id = $product['id'];
          $name = $product['name'];
          $price = $product['price'];
          $rating = $product['rating'];
          $imageName = $product['imageName'];

          echo '
          
          <form action="manage_cart.php" method="POST"> 
          <a href="productdetail.php?productId='.$id.'">
          <div class="product-card">
          <div class="product-img">
            <img src="./images/products/'.$imageName.'" alt="product_image" />
          </div>
          <div class="product-card-info">
          <h2>'.$name.'</h2>
            <div class="rating">';
              for($i = 0; $i < $rating; $i++)
              {
                echo '<ion-icon name="star"></ion-icon>';
              }
            echo '</div>
            <p>₹ '.$price.' </p>
            
          </div>
          <input type="hidden" name="Item_Name" value="'.$name.'">
          <input type="hidden" name="Price" value="'.$price.'">
          <button type="submit" name="Add_To_Cart"><ion-icon class="addtocart" name="add-outline"></ion-icon></button>
          </div></a>
          </form>
          
          ';
        }
        ?>
      </div>
      <?php else: ?>
        <div class="not-found">
      <br>
      <h2 align="center">Bad Request<br><b><h1>No such product exists !<h1></b></h2>
      <br><br>
      <h3 align="center"><a href="homepage.php">Click here</a>  to go to homepage</h3><br>
      <h3 align="center"><a href="products.php">Click here</a>  to go to all products</h3>
      </div>
      <?php endif; ?>
    </div>

    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
