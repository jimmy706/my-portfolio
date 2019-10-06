<?php 
    session_start();
    if(empty($_SESSION['userId'])){
        header("Location: ./index.php");
    }
    $idsp = $_POST['idsp'];
    $tensp = $_POST['tensp'];
    $chitietsp = $_POST['chitietsp'];
    $giasp = floatval($_POST['giasp']);
    $hinhanhsp = "img/" . basename($_FILES['hinhanhsp']['name']);

    if(!file_exists($hinhanhsp)){
        copy($_FILES["hinhanhsp"]["tmp_name"], $hinhanhsp);
    }

    require "connect.php";
    $sql = "UPDATE sanpham SET tensp = '$tensp', chitietsp = '$chitietsp', giasp = '$giasp', hinhanhsp = '$hinhanhsp' WHERE idsp = '$idsp'";
    if($connect->query($sql) === TRUE){
        header("Location: ./products.php");
    }
    else{
        echo "<h1 style='color:red'>Opp! Something when wrong</h1>";
    }

    $connect->close();
?>