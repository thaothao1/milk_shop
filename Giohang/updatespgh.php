<?php
    $tk = 'Tài khoản';
    session_start();
    if(!isset($_SESSION["User"])){
        header("location: http://localhost/do_an_shop_sua/Login/login.php");
    }
    else{
        $tk = $_SESSION["User"];
        $khoa = $_GET["key"];
        require("../Context/connect.php");
        $sql = "SELECT * FROM `giohang` INNER JOIN ttsanpham WHERE giohang.MaID = ttsanpham.MaID And giohang.CheckTT = '1'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if(isset($_POST["update"])){
            $sl = $_POST["txtSL"];
            $sql = "UPDATE `giohang` SET `Soluong` = '$sl' WHERE `giohang`.`MaID` = '$khoa';";
            $result = mysqli_query($conn, $sql);
            if($result){
                mysqli_close($conn);
                header("location: giohang.php");
            }
            else{
                echo "Update thất bại" .  mysqli_error($conn);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row["TenSanPham"]?></title>
 
    <link rel="stylesheet" href="../assets/fonts/themify-icons-font/themify-icons/themify-icons.css">
    <style>
        *{
            padding: 0;
            margin:  0;
            box-sizing: border-box;
        }

        html{
            font-family: Arial, Helvetica, sans-serif;
        }

        li{
            list-style-type: none;
        }
        a{
            text-decoration: none;
        }

        /* ---------header---------- */

        #header{
            height: 60px;
            background-image: url(https://i.pinimg.com/originals/64/f7/54/64f75410341b139db0df4164d4269146.jpg);
            background-size: 100% 100px;
            background-repeat: no-repeat;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
      
        }

        #header .logo-text {
            float: left;
            line-height: 60px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 30px;
            font-style: italic;
            padding-left: 50px;
        }
        /* ------------------------ */

        /* ----------menu----------- */

        #menu{
            height: 46px;
            background: #f66e34;
            position: fixed;
            top: 60px;
            left: 0;
            right: 0;
        }

        #navigation{
            display: inline-block;
        }

        #navigation .input-search{
            padding-left: 20px;
            width: 300px;
            height: 30px;
            border-radius: 20px;
            border: 2px solid #fff;
        }

        #navigation > li > a{
            text-transform: uppercase;
            color: #fff;
        }

        #navigation li a{
            color: aliceblue;
            text-decoration: none;
            line-height: 46px;
            padding: 0 18px;
            display: block;
        }
        #navigation .subnav li:hover .subnav-right,
        #navigation li:hover .subnav{
            display: block;
        }

        #navigation .subnav .subnav-right li:hover  a,
        #navigation .subnav  > li:hover > a{
            background-color: #ccc;
        }
        #navigation > li:hover > a{
            color: black;
        }
        #navigation > li{
            display: inline-block;
        }
        #navigation .trangchu{
            padding-left: 40px;
        }
        #navigation .right{
            padding-left: 150px;
        }

        #navigation li{
            position: relative;
        }
        #navigation .subnav{
            display: none;
            top: 100%;
            left: 0;
            min-width: 160px;
            background-color: #fff;
            position: absolute;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        }

        #navigation .subnav a{
            padding: 0 12px;
            color: black;
            line-height: 46px;
        }
        #navigation .subnav .subnav-right{
            position: absolute;
            background-color: #fff;
            top: 0;
            min-width: 160px;
            left: -100%;
            right: 500px;
            display: none;
        }

        /* ------------------------- */

        /* #slider{
            margin-top: 120px;
        } */

        #content{
            width: 1200px;
            margin: 20px auto;
            margin-top: 180px;
            border-radius: 10px;
            height: auto;
        }

        #content .sanpham{
            width: 300px;
            text-align: center;
            color: #f66e34;
            border-radius: 10px;
            border: 2px solid #f66e34;
            font-size: 18px;
            line-height: 35px;
            height: 35px;
            margin-bottom: 50px;
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
            width: 300px;
            background: rgba(208,1,27,0.08);
            font-size: 20px;
            border-radius: 10px;
            color: #d0011b;
            display: inline-block;
            padding: 3px;
            font-weight: 400;
            box-sizing: border-box;
            text-align: center;
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
        .products .soluong {
            width: 100px;
            height: 32px;
            font-size: 16px;
            font-weight: 400;
            box-sizing: border-box;
            text-align: center;
            border: 1px solid #757575;
            border-radius: 5px;

        }
        .products .product-soluong{
            font-size: 20px;
            color: #757575;
        }
        .products .product-update .update{
            width: 100px;
            cursor: pointer;
            height: 32px;
            background: rgba(208,1,27,0.08);
            font-size: 16px;
            font-weight: 400;
            text-align: center;
            border: 1px solid;
            border-radius: 10px;
            color: #d0011b;
        }
        .products .product-update{
            margin: 20px 100px;
        }


        .clear{
            clear: both;
        }

        #footer{
            font-family: Arial;
            background-color: rgb(127, 201, 228);
            height: 300px;
        }
        #footer div{
            color: blanchedalmond;
        }
        .ti-home, .ti-mobile, .ti-email{
            padding-right: 10px;
        }

        .title_footer .logo{
            text-align: center;
            padding-top: 50px;
        }
        .title_footer .lienhe li{
            text-decoration:  none;
            list-style-type: none;
            padding-top: 20px;
        }
        .title_footer .lienhe{
            padding-top: 20px;
            padding-left: 100px;
        }
        .icon_footer_media{
            padding-left: 400px;
            font-size: 32px;
        }
        .icon_footer_media i{
            padding-right: 20px;
        }
    </style>
</head>
<body>
    <!-- container -->
    
    <div id="container">
        <!-- begin header -->
        <div id="header">
            <h3 class="logo-text">Thế giới của bé</h3>
        </div>
        <!-- end header -->

        <!-- begin menu -->
        <div id="menu">
            <ul id="navigation">
                <li class="trangchu"><a href="http://localhost/do_an_shop_sua/main.php">Trang chủ</a></li>
                <li>
                    <a href="">GỢI Ý CHO BA MẸ <i class="nav-arrow-down ti-angle-down"></i></a>
                    <ul class="subnav">
                        <li><a href="http://localhost/do_an_shop_sua/Sanpham/suatuoi.php">Sữa tươi</a></li>
                        <li><a href="http://localhost/do_an_shop_sua/Sanpham/suabot.php">Sữa bột</a></li>
                    </ul>
                </li>
                <li><a href="">HỆ THỐNG CỬA HÀNG</a></li>
                <li class="right">
                    <li lass="timkiem"><input type="text" name="txtsearch" placeholder="Tìm kiếm..." class="input-search"></li>
                    <li>  
                        <a href="">
                            <i class="ti-search"></i>
                        </a>
                    </li>
                    <li> <a href="http://localhost/do_an_shop_sua/Giohang/giohang.php"><i class="ti-shopping-cart"> Giỏ hàng</i></a></li>
                    <li>
                        <a href=""><i class="ti-user"> <?php echo $tk?> </i>
                            <ul class="subnav">
                                <li><a href="">Thông tin </a>
                                    <ul class="subnav-right">
                                        <li><a href="">Thông tin cá nhân</a></li>
                                        <li><a href="http://localhost/do_an_shop_sua/Giohang/lichsumuahang.php">Lịch sử mua hàng</a></li>
                                    </ul>
                                </li>
                                <li><a href="http://localhost/do_an_shop_sua/Login/phanquyen.php">Đăng nhập</a></li>
                                <li><a href="http://localhost/do_an_shop_sua/Login/dangki.php">Đăng kí</a></li>
                                <li><a href="http://localhost/do_an_shop_sua/Login/logout.php">Đăng xuất</a></li>
                            </ul>
                        </a>
                    </li>
                </li>
            </ul>
        </div>
        <!-- end menu -->

        <!-- begin slider -->
        <!-- <div id="slider">
            <img src="../Anh/slide-img3.jpg" alt="" width="100%" height ="560px"> 
        </div>  -->
        <!-- end slider -->

        <!-- begin content -->
        <form action="" method="post">
            <div id="content">
                <ul class="products">
                    <li>
                            <div class="product-item">
                                <div class="product-top">
                                    <img src="../Anh/<?php echo $row['image']?>" alt="anh">
                                </div>
                            </div>
                        </li>
                        <div class="product-info">
                            <div><?php echo $row['TenSanPham']; echo " ";echo $row['TrongLuong']?></div>
                            <div class="product-hang">Hạng sữa: <?php echo $row['TenHang'];?></div><br>
                            <div class="product-soluong">Số lượng: <input class="soluong" type="number" name="txtSL" value="<?php echo $row['Soluong'];?>"></div><br>
                            <div class="product-price"><?php echo $row['Dongia'];?></div><br>
                            <div class="product-update">
                                <input class="update" type="submit" name="update" value="Cập nhật">
                            </div>
                        </div>
                </ul>
            </div>
        </form>
        <!-- end content -->

        <!-- begin footer -->
        <div id="footer">
            <div class="title_footer">
                <h1 class="logo">
                    MILK SHOP</h1>
                <ul class="lienhe">
                    <li><i class="ti-home"></i><b>Địa chỉ: </b>Trường đại học Kiến Trúc Đà Nẵng</li>
                    <li><i class="ti-mobile"></i><b>Hotline: </b> 0123456789</li>
                    <li><i class="ti-email"></i><b>Gmail: </b>teamae@gmail.com</li>
                </ul>
            </div>
            <div class="icon_footer_media">
                <i class="ti-facebook"></i>
                <i class="ti-instagram"></i>
                <i class="ti-twitter-alt"></i>
            </div>
            
        </div>
        <!-- end footer -->
    </div>
 
</body>
</html>