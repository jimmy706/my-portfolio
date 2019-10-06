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
    <title>Thêm sản phẩm</title>
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
    <h1 class="title">Thêm sản phẩm</h1>
    <p class="required-txt">Vui lòng điền đầy đủ thông tin bên dưới</p>
    <form action="handle-add-product.php" class="form" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Tên sản phẩm:</td>
                <td><input type="text" name="tensp"></td>
            </tr>
            <tr>
                <td>Mô tả:</td>
                <td><textarea name="chitietsp"></textarea></td>
            </tr>
            <tr>
                <td>Giá sản phẩm (VND):</td>
                <td><input type="number" name="giasp" min="1000" value="1000" required></td>
            </tr>
            <tr>
                <td>Hình ảnh:</td>
                <td><input type="file" name="hinhanhsp"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center">
                    <button type="reset">Làm lại</button>
                    <button type="submit">Lưu</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>