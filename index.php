<?php 
  require 'components/loginSignup.php'
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/alert.css" />
    
    <!--navbar-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/52d221e002.js" crossorigin="anonymous"></script>
    
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    
    <title>Login/Signup</title>
  </head>
  <body>
      <div class="login-navbar" style="background-color: #343047;" >
        <div class="logo" align="center" style="background-color: #343047; vertical-align:middle;">
                 <img src="images/nav_parts/loginLogo.PNG" style="background-color: #343047; vertical-align:middle;" alt="Site_Logo" width="200" height="58" class="company">
        </div>
      </div>
    <?php
      if($showMsg)
      {
        echo '
        <script type="text/javascript">
          alert("'.$showMsg.'");
          window.location.href="index.php";
        </script>';
      }
    ?>
    <div class="conatiner">
      <div class="box">
        <div class="same signin">
          <h2>Already Have An Account ?</h2>
          <button class="signinbtn" type="submit">Login</button>
        </div>
        <div class="same signup">
          <h2>Don't Have an Account ?</h2>
          <button class="signupbtn" type="submit">Signup</button>
        </div>
        <div class="form">
          <div class="sameform signinform">
            <form action="index.php" method="post">
                <h3>Login</h3>
            <input type="email" name="email" id="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Password" />
            <input type="submit" name="login" value="Login" />
            <a href="forget.php" class="forgot">Forgot Password?</a>
            </form>
          </div>
          <div class="sameform signupform">
            <form action="index.php" method="post">
                <h3>Signup</h3>
            <input type="text" name="uname" placeholder="UserName" />
            <input type="number" name="age" placeholder="Age" />
            <input type="text" name="email" placeholder="Email Id" />
            <input type="password" name="password" placeholder="Password" />
            <input type="password" name="cpassword" placeholder="Confirm Password" />
            <input type="submit" name="signup" value="Register" />
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>
    <script>
      const signupbtn = document.querySelector(".signupbtn");
      const signinbtn = document.querySelector(".signinbtn");
      const form = document.querySelector(".form");
      const sameform = document.querySelector(".sameform")

      signupbtn.onclick = function () {
        form.classList.add("active");
        sameform.classList.add("active2");
      };

      signinbtn.onclick = function () {
        form.classList.remove("active");
        sameform.classList.remove("active2");

      };
    </script>
  </body>
</html>
