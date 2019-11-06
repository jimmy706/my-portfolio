
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
                    echo "</ul>";
                echo"</div>";
            echo "</div>";
        }
        $connect -> close();
    ?>
