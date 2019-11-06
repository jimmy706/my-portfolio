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
            text-align: left;
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
        
        #products-suggestion{
            list-style-type: none;
            padding: 0;
            background: white;
            width: 500px;
            margin: auto;
        }
        #products-suggestion li{
            cursor: pointer;
            line-height: 2;
            border-top: 1px solid black;
        }
        .product-name{
            position: relative;
        }        
        .product-img{
            position: absolute;
            width: 100px;
            height: 100px;
            top: 0;
            left: 100%;
            display: none;
        }
        .product-name:hover .product-img{
            display: block;
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
        <form class="search-form">
            <input name="search"  autocomplete="off" placeholder="Nhập tên sản phẩm" />
            <ul id="products-suggestion" >
                
            </ul>
        </form>
        
        <a href="./information.php">Về trang cá nhân</a>
        <a href="./add-product.php">Thêm sản phẩm</a>
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
                        echo "<td class='product-name'> <img class='product-img' src='" . $row['hinhanhsp'] . "'/> <span>" . $row['tensp'] ."</span> </td>";
                        echo "<td>" . $row['giasp'] . " (VND)</td>";
                        echo "<td> <a class='product-detail-link' data-idsp='" . $row['idsp'] . "' href='product-info.php?idsp=". $row['idsp']."'>Xem chi tiết</a></td>";
                        echo "<td> <a title='Cập nhật sản phẩm' href='update-product.php?idsp=".$row['idsp'] . "'><img class='icon' src='edit.png'/></a></td>";
                        echo "<td> <a title='Xóa sản phẩm' href='delete-product.php?idsp=".$row['idsp'] . "'><img class='icon' src='delete.png'/></a></td>";
                    echo "</tr>";
                    $count++;
                }
                $connect->close();
            
            ?>
        </table>
        <div id="detail-content">
        </div>
         <form method='POST' action='logout.php'>
            <a href="./Buoi4_Bai4.php">Xem danh sách sản phẩm slideshow</a>
                <br>
            <button class='log-out' type='submit'>Đăng xuất</button>
        </form>
    </div>
    
   <script>
       const input = document.querySelector("input[name='search']");
       const suggestions = document.getElementById("products-suggestion");
       input.addEventListener("input",function(event){
           const val = this.value.trim();
            if(val !== ''){
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function (){
                    if(this.readyState == 4 && this.status == 200){
                        const response = this.responseText;
                        const productList = JSON.parse(response);                        
                        suggestions.innerHTML = productList.map(product => `<li data-idsp=${product.idsp} onclick="handleViewDetail(event)">${product.tensp}<li>`).join('');                        
                    }
                }
                xhttp.open("GET",`handle-search-product.php?productName=${val}`,true);
                xhttp.send();
           }
           else{
               suggestions.innerHTML = "";
           }
       })

        const detailLinks = [...document.getElementsByClassName("product-detail-link")];
        const detailContent = document.getElementById("detail-content");
        detailLinks.forEach(link => {
            link.addEventListener("click",handleViewDetail)
        })
        function handleViewDetail(e){
            e.preventDefault();
            const idsp = e.target.dataset.idsp || e.target.value;
            const xhttp = new XMLHttpRequest(); 
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200){
                    const response = this.responseText;
                    detailContent.innerHTML = response;
                }
            }
            xhttp.open("GET", `product-info.php?idsp=${idsp}`, true);
            xhttp.send();
        }
        
   </script>
</body>
</html>