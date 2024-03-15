<?php
    
    require 'components/dbconnect.php';
    
    $sql = "SELECT * FROM `products`";   
    $result = mysqli_query($conn, $sql);
    $numOfProducts = mysqli_num_rows($result);

    //top products
    echo '
    <div class="product-container">
      <h3><a href="products.php" style="color:white;">Top Products</a></h3>
      <div class="products">';
      while($product = mysqli_fetch_assoc($result))
        {
          $id = $product['id'];
          $name = $product['name'];
          $price = $product['price'];
          $rating = $product['rating'];
          $imageName = $product['imageName'];
          if($rating>4)
          {
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
          
        }
        
        
      echo '</div>
    </div>
    ';

?>