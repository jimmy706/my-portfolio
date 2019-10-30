<?php 
    session_start();
    if(empty($_SESSION['userId'])){
        header("Location: index.html");
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buổi 4 bài 4</title>
</head>
<body>
    <?php 
        require "connect.php";
        $userId = $_SESSION['userId'];
        $sql = "SELECT * from sanpham where idtv = '$userId'";
        $result = $connect->query($sql);
        echo "<div class='slideshow'>";
        while($row = $result->fetch_assoc()){
            echo "<img width='400' height='300' class='img-slideshow' src='".$row['hinhanhsp']."'/>";
        }
            echo "<button onClick='changeSlide(-1)'>Prev</button>";
            echo "<button onClick='changeSlide(1)'>Next</button>";
        echo "</div>";
    ?>
    <script>
        const images = [...document.getElementsByClassName("img-slideshow")];
        let currentIndex = 0;

        function changeImgDisplay(index){
            images.forEach(img => img.style.display = "none");
            images[index].style.display = "block";            
        }

        function changeSlide(val) {
			currentIndex += val;
			if (currentIndex === images.length) {
				currentIndex = 0;
			}
			else if (currentIndex < 0) {
				currentIndex = images.length - 1;
			}
			changeImgDisplay(currentIndex);
            laptopSel.value = currentIndex;
		}

        changeImgDisplay(currentIndex);
    </script>
</body>
</html>