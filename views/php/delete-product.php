<?php 
    session_start();
    if(empty($_SESSION['userId'])){
        header("Location: ./index.php");
    }    
    if(isset($_GET['idsp'])){
        require "connect.php";
        $idsp = $_GET['idsp'];
        $sql = "DELETE from sanpham where idsp = '$idsp'";
        if($connect->query($sql) === true){
            $connect->close();
            header("Location: ./products.php");
        }
        else{
            echo "<h1 style='color:red'>Opp! Something when wrong</h1>";
        }
        $connect->close();
    }
    else header("Location: ./products.php");
?>