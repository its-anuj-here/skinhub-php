<?php 
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "project";

    $conn = mysqli_connect($server, $user, $password, $db);
    if(!$conn){
        die("Error! :".mysqli_connect_error());
    }
?>