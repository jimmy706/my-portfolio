<?php 
    session_start();
    $productName = $_GET['productName'];
    $userId = $_SESSION['userId'];
    require "connect.php";
    $mysql = "SELECT * FROM `sanpham` WHERE LOWER(tensp) like '%$productName%' and idtv = '$userId'";
    $result = $connect->query($mysql);
    $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($json);
    $connect->close();
?>