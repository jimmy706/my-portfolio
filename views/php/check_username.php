<?php 
    require "connect.php";
    $username = $_GET['username'];
    $sql = "SELECT * from thanhvien where tendangnhap = '$username' ";
    $result = $connect->query($sql);
    echo mysqli_num_rows($result);
    $connect->close();
?>