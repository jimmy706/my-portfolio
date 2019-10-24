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
        .wrapper{
            background-color: gray;
            border: 1px solid red;
            text-align: center;
        }
        table{
            border-collapse: collapse;
            margin: 0 auto;
            text-align: left;
        }
        table,td,th{
            border: 1px solid black;
        }
        td, th{
            padding: 10px;
        }
        .log-out{
            margin: 20px auto;
            display: inline-block;
            color: white;
            background: gray;
            box-shadow: 0 0 5px 3px rgba(255,255,255,0.2);
            text-align: center;
            padding: 15px 20px;
        }
        .title{
            text-align: center;
            border-bottom: 1px dotted red;
            padding: 15px 0;
            margin: 0;
            color: red;
        }
        .icon{
            cursor: pointer;
            width: 20px;
            height: 20px;
        }
    </style>
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <div class="wrapper">
        <?php 
            require "connect.php";
            $userId = $_SESSION['userId'];
            $result = $connect->query("SELECT tendangnhap from thanhvien where id = '$userId'");
            while($row = $result->fetch_assoc()){
                echo "<h2 class='title'>Chào bạn " .$row['tendangnhap'] . "!</h2>";                
            }
        ?>
        <a href="./information.php">Về trang cá nhân</a>
        <p>Danh sách sản phẩm của bạn là:</p>
        <table>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th colspan="3">Lựa chọn</th>
            </tr>
            <?php 
                
                
                $sql = "SELECT * from sanpham where idtv = '$userId'";
                $result = $connect->query($sql);
                $count = 1;
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                        echo "<td>" .$count."</td>";
                        echo "<td>" . $row['tensp'] ."</td>";
                        echo "<td>" . $row['giasp'] . " (VND)</td>";
                        echo "<td> <a href='product-info.php?idsp=".$row['idsp']."'>Xem chi tiết</a></td>";
                        echo "<td> <a title='Cập nhật sản phẩm' href='update-product.php?idsp=".$row['idsp'] . "'><img class='icon' src='edit.png'/></a></td>";
                        echo "<td> <a title='Xóa sản phẩm' href='delete-product.php?idsp=".$row['idsp'] . "'><img class='icon' src='delete.png'/></a></td>";
                    echo "</tr>";
                    $count++;
                }
                $connect->close();
            
            ?>
        </table>
         <form method='POST' action='logout.php'>
            <button class='log-out' type='submit'>Đăng xuất</button>
        </form>
    </div>
    
   
</body>
</html>