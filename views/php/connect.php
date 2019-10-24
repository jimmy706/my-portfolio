<?php 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "buoi3";

    $connect = new mysqli($servername,$username,$password,$database);
    mysqli_set_charset($connect,"utf8");
    if($connect->connect_error){
        die("Connection failed: " . $connect->connect_error);
    }

?>