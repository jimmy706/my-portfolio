<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        h1{
            color: red;
            text-align: center;
        }
    </style>
    <title>Handle Login</title>
</head>
<body>
    <?php 
    session_start();
    require "connect.php";

    $username = $_POST['username'];
    $pass = md5($_POST['password']);

    $sql = "SELECT tendangnhap, matkhau, id from thanhvien where tendangnhap = '$username'";

    $result = $connect->query($sql);
    if (mysqli_num_rows($result)==0) { // TODO: ko thấy user
        $connect->close();
        header("Location: ./index.php");
    }
    else{
        while($row = $result->fetch_assoc()){
            if($row['matkhau'] == $pass){
                $_SESSION['userId'] = $row['id'];
                header("Location: ./information.php");  
                $connect->close();
                break;
            }
            $connect->close();
            header("Location: ./index.php");            
        }        
    }
?>
</body>
</html>