<?php
    session_start();

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        require 'components/dbconnect.php';
        $username = $_SESSION['user'];
        $name = $_POST['mname'];
        $email = $_POST['memail'];
        $subject = $_POST['msubject'];
        $message = $_POST['mmessage'];
        $sql = "INSERT INTO `user_message` (`username`, `full_name`, `email`, `subject`, `message`) VALUES ('$username', '$name', '$email', '$subject', '$message');";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "
            <script> 
                alert('Message Sent !!');
                window.location.href='homepage.php';
            </script>
            "; 
        }
    }

?>