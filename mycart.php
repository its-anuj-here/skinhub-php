<?php

require 'components/checkLogin.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART</title>
    <link rel="stylesheet" href="./css/homepage.css" />
    <script src="https://kit.fontawesome.com/52d221e002.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        .underline {
          border-radius: 3px;
          height: 5px;
          background: #c000ff;
          background: -webkit-gradient(linear, left top, right top, from(#c000ff), color-stop(83%, #7a6de3));
          background: linear-gradient(90deg, #c000ff 0%, #7a6de3 83%);
        }
        .checkout{
            padding: 20px;
            display: flex;
        }
        .btn-add{
      background: rgb(192,0,255);
        background: linear-gradient(90deg, rgb(144, 0, 192) 0%, rgb(105, 87, 240) 73%);
        color:rgb(255, 255, 255);
    }
    </style>
</head>
<body>
    <?php include("components/navbar.php");?>
    <?php if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0): ?>
        <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5 checkout">

    <div class="col-lg-8">
        <h1>CART</h1><div class="underline"></div>
       <table class="table">
          <thead class="text-center">
           <tr>
             <th scope="col">Serial No.</th>
             <th scope="col">Item Name</th>
             <th scope="col">Item Price</th>
             <th scope="col">Quantity</th>
             <th scope="col">Total</th>
             <th scope="col"></th>
          </tr>
         </thead>
       <tbody class="text-center">
           <?php
         
                if(isset($_SESSION['cart']))
                {
                 foreach($_SESSION['cart'] as $key => $value)
                 { 
                    $sr =$key+1;
                   
                     echo "
                        <tr>
                            <td>$sr</td>
                            <td>$value[Item_Name]</td>
                            <td>Rs.$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                             <td>
                               <form action='manage_cart.php' method='POST'>
                             <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'>
                             <input type='hidden' name='Item_Name' value='$value[Item_Name]'>  
                             </form>
                             </td>
                             <td class='itotal'></td>
                             <td>
                            <form action='manage_cart.php' method='POST'>
                              <button name='Remove_Item' class='btn btn-sm  btn-outline-danger' >REMOVE</button>
                              <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                             </form>
                            </td>
                            
                    ";
                 
                }
            }

        ?>
         
        
    </tbody>
</table>
            </div>
            <div class="col-lg-4">
                <div class="border bg-light rounded p-4">
                  <h4>Grand Total:</h4>
                  <h5 class="text-right" id="gtotal"></h5><br>

                  <?php
                        if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)

                          {
                ?>

                  <form action="purchase.php" method="POST">
                  <div class="form-group">
                     <label>Email</label>
                    <input type ="email"  name="full_name" class="form-control" required>
                 </div>
              <div class="form-group">
                 <label>Phone Number</label>
                <input type ="text" name="phone_no" class="form-control" required>
            </div>
              <div class="form-group">
                      <label>Address</label>
                      <input type ="text" name="address" class="form-control" required>
             </div>
                       <div class="form-check">
                          <input class="form-check-input" type="radio" name="pay_mode" value="COD" id="flexRadioDefault1">
                          <label class="form-check-label" for="flexRadioDefault1">
                              Cash On Delivery
                              </label>
                      </div>
                     <br>
                    <button class="btn btn-add btn-block" name="purchase">Make Purchase</button>
                </form>
                <?php

                 }
              ?>
                </div>
            </div>
        </div>
    </div>    
    <?php else : ?>
                <div class="not-found">
                    <br>
                    <h2 align="center"><b>No product in cart !</b></h2>
                    <br><br>
                    
                    <h3 align="center"><a href="products.php"  style="font-size: 14">Click here</a>   to go to all products</h3>
                </div>
                <?php endif; ?>



<script>
    var gt=0;
    var iprice=document.getElementsByClassName('iprice');
    var iquantity=document.getElementsByClassName('iquantity');
    var itotal=document.getElementsByClassName('itotal');
    var gtotal=document.getElementById('gtotal');

    function subTotal(){
        gt=0;
        for(i=0;i<iprice.length ;i++)
        {
            
        itotal[i].innerText="Rs."+(iprice[i].value)*(iquantity[i].value); 
        gt=gt+ (iprice[i].value)*(iquantity[i].value); 
        }
        gt="Rs. "+gt;
        gtotal.innerText=gt;
    }
    subTotal();
</script>

</body>
</html>