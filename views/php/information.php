<?php
session_start();
if(empty($_SESSION['userId'])){
    header("Location: ./index.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .info {
            background-color: #888;
            border: 1px solid red;
        }

        .info .info-header{
            color: red;
            text-align: center;
            border-bottom: 1px dotted red;
            margin: 0;
            padding: 20px 0;
        }

        .info .info-content{
            display: flex;
            margin: 15px;
        }

        .info .info-content img{
            max-width: 500px;
        }

        .info ul{
            list-style-type: none;
            font-size: 1.2rem;
        }

        .info .log-out{
            margin: 20px auto;
            display: inline-block;
            color: white;
            background: gray;
            box-shadow: 0 0 5px 3px rgba(255,255,255,0.2);
            text-align: center;
            padding: 15px 20px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <?php 
        require 'connect.php';
        $userId = $_SESSION['userId'];

        $sql = "SELECT tendangnhap,hinhanh,gioitinh,nghenghiep,sothich from thanhvien where id='$userId'";
        $result = $connect->query($sql);

        while($row = $result->fetch_assoc()){
            echo "<div class='info'>";
                echo "<h1 class='info-header'> Hello " . $row['tendangnhap'] . "!</h1>";
                echo "<div class='info-content'>";
                    echo "<img src = '" . $row['hinhanh'] . "'/>";
                    echo "<ul>";
                        echo "<li> Nickname: ". $row['tendangnhap'] ."</li>";
                        echo "<li> Giới tính: ". $row['gioitinh'] ."</li>";
                        echo "<li> Nghề nghiệp: ". $row['nghenghiep'] ."</li>";
                        echo "<li> Sở thích: ". $row['sothich'] ."</li>";
                        echo "<li><a href='add-product.php'>Thêm sản phẩm</a></li>";
                        echo "<li><a href='products.php'>Danh sách sản phẩm</a></li>";
                        echo "<form method='POST' action='logout.php'>";
                            echo "<button class='log-out' type='submit'>Đăng xuất</button>";
                        echo "</form>";
                    echo "</ul>";
                echo"</div>";
            echo "</div>";
        }
        $connect -> close();
    ?>
    
</body>
</html>