<?php
  require 'components/checkLogin.php';
  if(isset($_GET['productId']))
  {
    require 'components/dbconnect.php';
    $productId = $_GET['productId'];
    $sql = "SELECT * FROM products WHERE id = '$productId'";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/productdetails.css" />
    <title><?php echo htmlspecialchars($product['name']); ?></title>
  </head>
  <body>

    <?php if($product!=NULL): ?>

      <form action="manage_cart.php" method="POST"> 
    <section class="product-detail">
        <a href="mycart.php"><ion-icon class="cart-icon" name="cart"></ion-icon></a>
      <div class="product-detail-info">
        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
        <p><?php echo htmlspecialchars($product['detail']); ?></p>
        <input type="hidden" name="Item_Name" value="<?php echo htmlspecialchars($product['name']); ?>">
        <input type="hidden" name="Price" value="<?php echo htmlspecialchars($product['price']);?>">  

        <div class="quantity">
            <div class="price">
                <span> ₹ <?php echo htmlspecialchars($product['price']); ?></span>
            </div>
        </div>
        <button class="buy-now" name="Add_To_Cart" type="submit">Buy Now</button>
      </div>
      <div class="product-detail-img">
        <img src="images/products/<?php echo htmlspecialchars($product['imageName']); ?>" alt="Product Image Here" />
      </div>
    </section>
      
    </form>
    <?php else : ?>
      <div class="not-found">
        <br>
        <h2 align="center">Bad Request<br><b><h1>No such product exists !<h1></b></h2>
        <br><br>
        <h3 align="center"><a href="homepage.php">Click here </a>  to go to homepage</h3><br>
        <h3 align="center"><a href="products.php">Click here </a>  to go to all products</h3>
      </div>

    
    <?php endif; ?>
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
