<!DOCTYPE html>
<?php
include('smtp/PHPMailerAutoload.php');

function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	//$mail->SMTPDebug=3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host = "smtp.gmail.com.";
	$mail->Port = "465"; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "skinhubcreators@gmail.com";
	$mail->Password = '12345';
	$mail->SetFrom("skinhubcreators@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		
        return false;
	}else{
		
        return true;
	}
}
?>
<?php
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        require 'components/dbconnect.php';
        $alert = false;
        if(isset($_POST['send-otp']))
        {
            $email = $_POST['email'];
            $check_email = "SELECT * FROM `users` WHERE `email`= '$email'";
            $result = mysqli_query($conn, $check_email);
            $num = mysqli_num_rows($result);
            
            if($num >0){
                $email = $_POST['email'];
                $code = rand(999999, 111111);
                $insert_code = "UPDATE `users` SET `code` = '$code' WHERE `email` = '$email'";
                $result = mysqli_query($conn, $insert_code);
                if($result)
                {
                    $email = $_POST['email'];
                    //$fromEmail = "skinhubcreators@gmail.com";
                    $subject = "Password Reset OTP";
                    $message = "Your password reset OTP is $code";
                    $result = smtp_mailer($email,$subject,$message);
                    /*$headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
                    $result = mail($email, $subject, $message, $headers);*/

                    if($result)
                    {
                        $alert = "We've sent a password reset otp to your email - $email";
                        $_SESSION['otpsent'] = true;
                        $_SESSION['email'] = $email;
                        echo '
                        <script type="text/javascript">
                            alert("'.$alert.'");
                        </script>';
                    }
                    else
                    {
                        $alert = "Failed to send OTP !";
                        echo '
                            <script type="text/javascript">
                                alert("'.$alert.'");
                                window.location.href="forget.php";
                            </script>
                            ';
                    }
    
                }
                else
                {
                    $alert = "Something went wrong!";
                    echo '
                    <script type="text/javascript">
                        alert("'.$alert.'");
                        window.location.href="forget.php";
                    </script>
                    ';                
                }
            }
            else{
                $alert = "Email not registered !";
                echo '
                    <script type="text/javascript">
                    alert("'.$alert.'");
                    window.location.href="forget.php";
                    </script>
                    ';
            }
        }        
        elseif(isset($_POST['verify-otp']))
        {
            $otp = $_POST['otp'];
            $email = $_SESSION['email'];
            $check_otp = "SELECT *  FROM `users` WHERE `email` = '$email' AND `code` = '$otp'";
            $result = mysqli_query($conn, $check_otp);
            if(mysqli_num_rows($result) > 0)
            {
                $_SESSION['newpass'] = true;
                $_SESSION['otpsent'] = false;
                $alert = "OTP Verified !";
                echo '
                    <script type="text/javascript">
                        alert("'.$alert.'");
                        window.location.href="newpass.php";
                    </script>';
            }
            else
            {
                $alert = "Entered Wrong OTP !";
                echo '
                    <script type="text/javascript">
                        alert("'.$alert.'");
                    </script>';
            }
        }
        elseif(isset($_POST['change-pass']))
        {
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            if(!empty($password) && ($password == $cpassword))
            {
                $code = 0;
                $email = $_SESSION['email'];
                $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                $change_pass = "UPDATE 'users' SET `code` = '$code' ,`password` = '$hashPassword' WHERE email = '$email'";
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
            <form action="forget.php" method="post">
                <?php if(!isset($_SESSION['otpsent']) && $_SESSION['otpsent']!=true && !isset($_SESSION['newpass']) && $_SESSION['newpass'] != true): ?>
                <h3>Reset Password</h3>
                <label for="email" style="color: Yellow; padding-top: 18px; padding-bottom: 12px;">Enter Your Registered Email</label>
                <input type="email" name="email" id="email" placeholder="Email"/>
                <input type="submit" name="send-otp" value="Send OTP" />
                
                <?php elseif(isset($_SESSION['otpsent']) || $_SESSION['otpsent'] == true): ?>
                <h3>Reset Password (OTP)</h3>
                <label for="otp" style="color: Yellow; padding-top: 18px; padding-bottom: 12px;">Enter OTP</label>
                <input type="number" name="otp" id="otp" placeholder="OTP"/>
                <input type="submit" name="verify-otp" value="Verify OTP" />
                
                <?php elseif(isset($_SESSION['newpass']) || $_SESSION['newpass'] == true): ?>
                <h3>Set New Password</h3>
                <label for="password" style="color: Yellow; padding-top: 18px; padding-bottom: 12px;">Enter New Password</label>
                <input type="password" name="password" placeholder="New Password" />
                <input type="password" name="cpassword" placeholder="Confirm New Password" />
                <input type="submit" name="change-pass" value="Done" />

                <?php endif; ?>
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>
    
  </body>
</html>
