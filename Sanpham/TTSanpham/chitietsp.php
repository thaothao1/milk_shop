<?php
    session_start();
    if(!isset($_SESSION["Useradmin"])){
        header("location: http://localhost/classroom/do_an_shop_sua/Login/loginadmin.php");
    }
    else{
        $khoa = $_GET["key"];
        require("../../Context/connect.php");
        $sql = "SELECT *from ttsanpham WHERE MaID = '$khoa';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin chi tiết sản phẩm</title>
    <link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../cssAdmin.css">
<style>
    /* --------content--------- */

    #content{
        width: 1000px;
        margin: 5px auto;
        margin-top: 60px;
        border-radius: 10px;
        height: auto;
    }

    #content .sanpham{
        margin-bottom: 20px;
        text-align: center;
        color: #f66e34;
        font-size: 18px;
        line-height: 35px;
        height: 35px;
    }

    .products{
        list-style-type: none;
        display: flex;
        flex-wrap: wrap;
    }
    .products li{
        width: 30%;
        border-radius: 10px;
        border: 1px solid tomato;
        margin: 5px;
        text-align: center;
    }
    .product-price{
        font-size: 20px;
        color: #d0011b;
        display: inline-block;
        font-weight: 400;
    }
    .products a{
        text-decoration: none;
        color: rgb(228, 93, 15);
    }

    .products .product-info{
        font-size: 30px;
        color: rgb(228, 93, 15);
        padding-left: 50px;
    }
    .products .product-hang{
        font-size: 18px;
    }

    .products li img{
        margin: 5px;
        max-width: 95%;
        height: auto;
    }
    .product-content h2{
        padding: 0 20px;
    }
    .product-content p{
        padding: 0 40px;
    }

    /* ------------------------------------ */
</style>

</head>
<body>
    <header>
        <div id="container">
            <!-- begin header -->
            <div id="header">
                <h3 class="logo-text">Thế giới của bé</h3>
            </div>
            <!-- end header -->

            <!-- begin menu -->
            <div id="menu">
                <ul id="navigation">
                    <li><a href="http://localhost/do_an_shop_sua/Khachhang/khachhang.php">kHÁCH HÀNG</a></li>
                    <li><a href="http://localhost/do_an_shop_sua/Sanpham/sanpham.php">SẢN PHẨM</a></li>
                    <li><a href="http://localhost/do_an_shop_sua/Sanpham/TTSanpham/ttsanpham.php">THÔNG TIN SẢN PHẨM</a></li>
                    <li><a href="http://localhost/do_an_shop_sua/NhaCC/nhacungcap.php">NHÀ CUNG CẤP</a></li>
                    <li><a href="../../Login/logout.php">Đăng xuất</a></li> 
                </ul>
            </div>
            <!-- end menu -->
        </div>
	</header>
	<br>
    <div class="row" >
		<div class="container" style="background-color: white;">
            <h3 style="text-align: center; color: blue;">Thông tin chi tiết sản phẩm</h3>
                <hr size="5px" color="red">
			<br>
        <!-- begin content -->
            <div id="content">
                <ul class="products">
                    <li>
                        <div class="product-item">
                            <div class="product-top">
                                <img src="../../Anh/<?php echo $row['image']?>" alt="anh">
                            </div>
                        </div>
                    </li>
                    <div class="product-info">
                        <div><?php echo $row['TenSanPham']; echo " ";echo $row['TrongLuong']?></div>
                        <div class="product-hang">Hạng sữa: <?php echo $row['TenHang'];?></div><br>
                        <div class="product-price"><?php echo $row['Dongia'];?>đ</div>
                    </div>
                </ul><br>
                <div class="product-content">
                    <h3>Thàng phần dinh dưỡng: </h3>
                    <p>- <?php echo $row['TPDinhDuong'];?></p><br>
                    <h3>Lợi ích: </h3>
                    <p>- <?php echo $row['Loiich'];?></p><br>
                    <h5>NgàySX: <?php echo $row['NgaySX'];?></h5>
                    <h5>HạnSD: <?php echo $row['HanSD'];?></h5>
                </div>
            </div>
        <!-- end content -->
    </div>
</body>
</html>
