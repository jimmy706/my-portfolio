<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .title{
            color: red; 
            text-align:center
        }
        table {
            background: #ddd; 
            padding: 15px;
            border: 1px solid #000; 
            margin: 0 auto
        }
    </style>
    <title>Đăng nhập</title>
</head>
<body>
    <form action="handle-login.php" method="post">
        <h1 class="title">Đăng nhập</h1>
        <table>
            <tr>
                <td>Tên đăng nhập: </td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Mật khẩu: </td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>                
                <td>                    
                </td>
                <td>
                    <button type="submit">Đăng nhập</button>
                </td>
            </tr> 
            <tr>
                <td>
                    chưa có tài khoản? <a href="./signup.php">Đăng kí</a>
                </td>
            </tr>   
        </table>
    </form>
</body>
</html>