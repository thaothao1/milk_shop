<?php
    session_start();
    $tk = 'Tài khoản';
    $msg = null;
    if(isset($_SESSION["User"])){
        $tk = $_SESSION["User"];
    }
    $khoa = $_GET["key"];
    require("../Context/connect.php");
    $sql = "SELECT *from ttsanpham WHERE MaID = '$khoa';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST["btnmuangay"])){
        if(!isset($_SESSION["User"])){
            header("location: http://localhost/do_an_shop_sua/Login/loginkh.php");
        }
        else{
            $makh = $_SESSION["User"];
            $maid = $row["MaID"];
            $tensp = $row["TenSanPham"];
            $sl = $_POST["txtSL"];
            $sqladd = "INSERT INTO `giohang` (`MaKH`, `MaID`, `TenSp`, `CheckTT`, `Soluong`) VALUES ('$makh', '$maid', '$tensp', '1', '$sl');";
            $resultadd = mysqli_query($conn, $sqladd);
            if($resultadd){
                mysqli_close($conn);
                header("location: ../Giohang/giohang.php");
            }
            else{
                echo "Mua ngay thất bại" .  mysqli_error($conn);
            }
        }
    }
    else{
        if(isset($_POST["btnadd"])){
            if(!isset($_SESSION["User"])){
                header("location: http://localhost/do_an_shop_sua/Login/loginkh.php");
            }
            else{
                $makh = $_SESSION["User"];
                $maid = $row["MaID"];
                $tensp = $row["TenSanPham"];
                $sl = $_POST["txtSL"];
                $sqladd = "INSERT INTO `giohang` (`MaKH`, `MaID`, `TenSp`, `CheckTT`, `Soluong`) VALUES ('$makh', '$maid', '$tensp', '1', '$sl');";
                $resultadd = mysqli_query($conn, $sqladd);
                if($resultadd){
                    mysqli_close($conn);
                    $msg = 'Thêm vào giỏ hang thành công';
                }
                else{
                    echo "Thêm thất bại" .  mysqli_error($conn);
                }

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
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/fonts/themify-icons-font/themify-icons/themify-icons.css">
    <style>

        /* --------content--------- */

        #content{
            width: 1200px;
            margin: 20px auto;
            margin-top: 180px;
            border-radius: 10px;
            height: auto;
        }

        #content .sanpham{
            margin-bottom: 20px;
            text-align: center;
            color: #f66e34;
            border-radius: 10px;
            border: 2px solid #f66e34;
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

        .products .product-buy{
            padding-top: 75px;
        }

        .product-buy .add, .muangay{
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

        .product-buy .add{
            width: 150px;
        }
        .product-buy .muangay{
            background: #d0011b;
            width: 100px;
            color: #fff;
        }

        .endline{
            margin: 20px 0;
            height: 0.5px;
            width: 100%;
            background: tomato;
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
                <li class="trangchu"><a href="http://localhost/do_an_shop_sua/">Trang chủ</a></li>
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
                <h2 class="sanpham"><?php echo $msg?></h2>
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
                                <div class="product-soluong">Số lượng: <input class="soluong" type="number" name="txtSL" value="1"></div><br>
                                <div class="product-price"><?php echo $row['Dongia'];?>đ</div>
                        <div class="product-buy">
                            <input class="add" type="submit" name="btnadd" value="Thêm vào giỏ"  onclick="return confirm('Bạn có chắc muốn mua mặt hàng này')">
                            <input class="muangay" type="submit" name="btnmuangay" value="Mua ngay" >
                        </div>
                    </div>
                </ul>
                <div class="endline"></div>
                <div class="product-content">
                    <h3>Thàng phần dinh dưỡng: </h3>
                    <p>- <?php echo $row['TPDinhDuong'];?></p><br>
                    <h3>Lợi ích: </h3>
                    <p>- <?php echo $row['Loiich'];?></p><br>
                    <h5>NgàySX: <?php echo $row['NgaySX'];?></h5>
                    <h5>HạnSD: <?php echo $row['HanSD'];?></h5>
                </div>
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
            
        </div>
        <!-- end footer -->
    </div>
 
</body>
</html>