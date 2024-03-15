<?php
    $count=0;
    if(isset($_SESSION['cart'])){
        $count=count($_SESSION['cart']);
    }
    echo '
    <div class="navbar">
    <div class="logo">SkinHub</div>
    <ul class="links">
        <li class="link1"> <a href="homepage.php">Home</a></li>
        <li class="link1"> <a href="products.php">Products</a></li>
        <li class="link3"> <a href="team.php">Our Team</a></li>
    </ul>
    
    <div class="cart-login">
        <div class="cart">
        <div class="count" align="center"> <font color="white">'.$count.'</font></div>
        <a href="mycart.php"><i class="fas fa-shopping-cart"></i></a>
            <div class="underline"></div>
        </div>
        <div class="login">
            <a>
            <button class="btn-login">
            <a href="/project/logout.php"><h3 style="color:white;">Logout</h3></a>
            </button>
            </a>
        </div>
    </div>
    </div>
    ';
?>