<!DOCTYPE html>
<?php
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        require 'components/dbconnect.php';
        $alert = false;
        if(isset($_POST['change-pass']))
        {
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            if(($password == $cpassword))
            {
                $code = 0;
                $email = $_SESSION['email'];
                $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                $change_pass = "UPDATE `users` SET `code` = '$code',`password` = '$hashPassword' WHERE email = '$email'";
                $result = mysqli_query($conn, $change_pass);
                if($result)
                {
                    $_SESSION['newpass']= false;
                    $alert = "Password Changed Successfully";
                    echo '
                    <script type="text/javascript">
                        alert("'.$alert.'");
                        window.location.href="index.php";
                    </script>';

                }
                else
                {
                    $alert = "Failed to change password, Try Again";
                    echo '
                    <script type="text/javascript">
                        alert("'.$alert.'");
                    </script>';
                }
                
            }
            else
            {
                $alert = "Your passwords mismatch!!";
                echo '
                    <script type="text/javascript">
                        alert("'.$alert.'");
                    </script>';
            }

        }
    }
?>
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
    
    <div class="conatiner">
      <div class="box">
        <div class="same signin">
          <h2> </h2>
          
        </div>
        <div class="same signup">
          <h2>
          </h2>
          
        </div>
        <div class="form">
          <div class="sameform signinform">
            <form action="newpass.php" method="post">
                
                
                <?php
                if($_SESSION['newpass'] != false)
                echo '<h3>Set New Password</h3>
                <label for="password" style="color: Yellow; padding-top: 18px; padding-bottom: 12px;">Enter New Password</label>
                <input type="password" name="password" placeholder="New Password" />
                <input type="password" name="cpassword" placeholder="Confirm New Password" />
                <input type="submit" name="change-pass" value="Done" />';
                else
                 header("location: homepage.php");
                ?>
                
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>
    
  </body>
</html>
