<?php 
    session_start();
    require "connect.php";

    $username = $_POST['username'];
    $pass = md5($_POST['password']);
    $avatar = "img/" . basename($_FILES['avatar']['name']);
    $sex = $_POST['sex'];
    $job = $_POST['job'];
    $hobbies = '';
    if(isset($_POST['hobbies'])){
        $hobbies = join(",",$_POST['hobbies']);
    }
    if(!file_exists($avatar)){
        copy($_FILES["avatar"]["tmp_name"], $avatar);
    }

    mysqli_query($connect,"INSERT INTO thanhvien(tendangnhap,matkhau,hinhanh,gioitinh,nghenghiep,sothich) VALUES ('$username', '$pass', '$avatar', '$sex', '$job', '$hobbies')")  or die(mysqli_error($connect));     
    // $last_id = $connect->insert_id;
    // $_SESSION['userId'] = $last_id;        
    
    echo "<h1 style='text-align: center'>Đăng ký thành công! <a href='./index.html'>Về trang đăng nhập</a></h1>";
    die();
    $connect->close();
?>

    
