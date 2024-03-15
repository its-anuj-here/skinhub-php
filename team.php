<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/team.css">
    <link rel="stylesheet" href="css/homepage.css">
    <script src="https://kit.fontawesome.com/52d221e002.js" crossorigin="anonymous"></script>
    <title>Our Team</title>

</head>
<body>
    <?php include 'components/all-nav.php'?>
    <section class="home">

        <div class="creators">
            <h3><span>CREA</span>TERS</h3>
            <p>
            <q cite="https://www.ramotion.com/blog/web-development-quotes/">
            A designer knows he has achieved perfection not when there is nothing left to add, but when there is nothing left to take away
            </q> - Antonie De-Saint Exupery
            </p>
            <button class="hire-us">Contact Us<br><hr><strong>skinhubcreators@gmail.com</strong></button>
        </div>

    
        <div class="container">
            <div class="card">
                <img src="./images/team/team.jpg" alt="">
            </div>
            <div class="card">
                <img src="./images/team/team.jpg" alt="">
            </div>
            <div class="card">
                <img src="./images/team/team.jpg" alt="">
            </div>
            <div class="card">
                <img src="./images/team/team.jpg" alt="">
            </div>
            
            
        </div>
    </section>
</body>
</html>