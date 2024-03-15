<?php
  require 'components/checkLogin.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SkinHub</title>
    
    <script src="https://kit.fontawesome.com/52d221e002.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/homepage.css">
    <link rel="stylesheet" href="./css/card.css" />
    
  </head>

  <body>
    
    <?php include './components/navbar.php'?>
    <?php include './components/slideshow.php' ?>
    <?php include './components/category_tile.php' ?>
    <?php include './components/top_products_tile.php' ?>
    <?php include './components/footer.php' ?>
    
  </body>
 
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
  let cnt = 0;
let prev = document.getElementById('prevbutton')
let next = document.getElementById('nextbutton')
let images = document.getElementsByClassName('image')
console.log(prevbutton);
console.log(nextbutton);

function control(x){
    cnt = cnt+x;
    if(cnt < images.length){
        slider(cnt)
    }
    else{
        cnt = 0
        slider(cnt)
    }
}

slider(cnt)

function slider(num){
    for(let i = 0 ; i < images.length; i++){
        images[i].style.display = 'none'
    }
    images[num].style.display ='block'
}

setInterval(() => {
    control(1)
}, 4000);
</script>
</html>
