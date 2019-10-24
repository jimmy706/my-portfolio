<?php 
    $servername = "localhost";
    $username = "id10701167_jimmy";
    $password = "meoden1999";
    $database = "id10701167_buoi3";

    $connect = new mysqli($servername,$username,$password,$database);
    mysqli_set_charset($connect,"utf8");
    if($connect->connect_error){
        die("Connection failed: " . $connect->connect_error);
    }

?>