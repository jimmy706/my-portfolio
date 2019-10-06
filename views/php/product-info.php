<?php 
    session_start();
    if(empty($_SESSION['userId'])){
        header("Location: ./index.php");
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Chi tiết sản phẩm</title>
</head>
<body>
    <?php 
        require 'connect.php';
        $idsp = $_GET['idsp'];

        $sql = "SELECT * from sanpham where idsp='$idsp'";
        $result = $connect->query($sql);

        while($row = $result->fetch_assoc()){
            echo "<div class='info'>";
                echo "<h1 class='info-header'> " . $row['tensp'] . "!</h1>";
                echo "<div class='info-content'>";
                    echo "<img src = '" . $row['hinhanhsp'] . "'/>";
                    echo "<ul>";
                        echo "<li> Tên sản phẩm: ". $row['tensp'] ."</li>";
                        echo "<li> Giá: ". $row['giasp'] ."</li>";
                        echo "<li> Mô tả: <p>". $row['chitietsp'] ."</p></li>";
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