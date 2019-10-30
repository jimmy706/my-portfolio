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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa sản phẩm</title>
    <style>
        .title{
            color: red;
            text-align: center;
        }
        .required-txt{
            text-align: center;
        }
        .form{
            margin-top: 40px;
        }
        .form table{
            margin: 0 auto;
            background-color: gray;
            border: 1px solid black;
            padding: 15px;
        }
        .form textarea{
            resize: none;
            width: 100%;
            height: 60px;
        }
        .form input{
            width: 100%;
        }
    </style>
</head>
<body>
    <?php 
        $idsp = $_GET['idsp'];
        require "connect.php";
        $sql = "SELECT * from sanpham where idsp = '$idsp'";
        $result = $connect->query($sql);
        if($result->num_rows < 1){
            $connect->close();
            header("Location: ./products.php");
        }
        echo "<form method='post' enctype='multipart/form-data' action='handle-update-product.php' class='form'>";
            echo "<h1 class='title'>Sửa thông tin sản phẩm</h1>";
            echo "<table>";
            while($row = $result->fetch_assoc()){
                echo "<input type='hidden' name='idsp' value= '" . $idsp . "'/>";
                echo "<tr>";
                    echo "<td>Tên sản phẩm:</td>";
                    echo "<td><input name='tensp' type='text' value='" . $row['tensp'] . "'/></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Mô tả:</td>";
                    echo "<td><textarea name='chitietsp'>" . $row['chitietsp'] . "</textarea></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Giá sản phẩm(VND):</td>";
                    echo "<td><input name='giasp' type='number' value='" . $row['giasp'] . "'/></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Hình ảnh:</td>";
                    echo "<td><input name='hinhanhsp' type='file'/></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td colspan='2' style='text-align:center'>
                            <button type='reset'>Làm lại</button>
                            <button type='submit'>Lưu</button>
                         </td>";
                echo "</tr>";
            }
            echo "</table>";
        echo "</form>";
        $connect->close();
    ?>
</body>
</html>