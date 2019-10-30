<?php 
    session_start();
    if(empty($_SESSION['userId'])){
        header("Location: ./index.html");
    }
    $tensp = $_POST['tensp'];
    $chitietsp = $_POST['chitietsp'];
    $giasp = floatval($_POST['giasp']);
    $hinhanhsp = "img/" . basename($_FILES['hinhanhsp']['name']);
    $idtv = $_SESSION['userId'];


    if(!file_exists($hinhanhsp)){
        copy($_FILES["hinhanhsp"]["tmp_name"], $hinhanhsp);
    }
    require "connect.php";
    $sql = "INSERT INTO sanpham(tensp,chitietsp,giasp,hinhanhsp,idtv) VALUES ('$tensp','$chitietsp','$giasp','$hinhanhsp',$idtv)";
    $connect->query($sql);
    $connect->close();
    header("Location: ./products.php");
?>