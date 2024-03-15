<?php
  $login=false;
  $showMsg = false;
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    require 'components/dbconnect.php';
    
    if(isset($_POST['signup']))
    {
      $username = $_POST['uname'];
      $age = $_POST['age'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];
  
      
      $existSql = "SELECT * FROM `users` WHERE email = '$email'"; 
      $result = mysqli_query($conn, $existSql);
      $numUserExist = mysqli_num_rows($result);
      if($numUserExist > 0){
        $showMsg = "This Email is already registered !  Please Try a Different one";
      }
      else{  
        if(($password == $cpassword))
        {
          $hashPassword = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO `users`(`uname`, `age`, `code`, `email`, `password`) VALUES ('$username', '$age', '0', '$email', '$hashPassword')";
          $result = mysqli_query($conn, $sql);
          if($result){
            $showMsg = "Success !! Your account has been successfully created.\nNow Login!";
            echo '
                            <script type="text/javascript">
                                alert("'.$showMsg.'");
                                window.location.href="index.php";
                            </script>
                            ';
          }
        }
        else{
          $showMsg = "Your passwords mismatch!!";
        }
      }
    }
    else if(isset($_POST['login']))
    {
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      $sql = "SELECT * FROM users WHERE email='$email'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      if($num == 1){
        while($row = mysqli_fetch_assoc($result)){
          if(password_verify($password, $row['password']))
          {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $email;
            $_SESSION['user']= $row['uname'];
            
            header("location: homepage.php");
          }
          else{
            $showMsg = "Invalid Password !!";
          }
        }
      }
      else{
        $showMsg= "Invalid Login Data !!";
      }
    }
    
  }
?>