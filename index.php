<?php
    session_start();
    require("Context/connect.php");
    $sql = "SELECT * FROM `ttsanpham`";
    $result = mysqli_query($conn, $sql);
    $tk = 'Tài khoản';
    if(isset($_SESSION["User"])){
        $tk = $_SESSION["User"];
    }
    // Số sản phẩm trong 1 trang
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page']:18;
    // đánh số trang
    $current_page = !empty($_GET['page']) ? $_GET['page']:1;
    // tổng số trang thu được từ database
    $offset = ($current_page - 1) * $item_per_page;
    $sql1 = mysqli_query($conn,"SELECT * FROM `ttsanpham` ORDER BY `MaID` ASC LIMIT ".$item_per_page." OFFSET ".$offset.";");
    $total = mysqli_query($conn,"SELECT * FROM `ttsanpham`");
    $total = $total->num_rows;
    $sum_page = ceil($total/$item_per_page);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milk-shop</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous"> -->
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/fonts/themify-icons-font/themify-icons/themify-icons.css">
    <style>
        .slider{
            padding-top: 130px;
            padding-left: 140px;
        }
        .slider img{
            width: 1200px;
            height: 450px;
        }
        /* ----------content------------- */

        #content{
            width: 1200px;
            margin: 20px auto;
            border-radius: 10px;
            height: auto;
        }
        
        #phantrang{
            text-align: center; 
        }
        #phantrang a{
            color: orange;
            font-weight: bold;
            font-family: sans-serif;
        }
        #phantrang a:hover{
            color: orangered;
            font-weight: bold;
            font-family: sans-serif;
        }
        .page-item{
            font-size: 20px;
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
            display: flex;
            flex-wrap: wrap;
        }
        .products li{
            width: 15%;
            border-radius: 10px;
            border: 1px solid tomato;
            margin: 5px 10px;
            text-align: center;
        }
        .product-price{
            color: rgb(52, 96, 228);
        }
        .products li a{
            color: rgb(228, 93, 15);
        }

        .products li img{
            margin: 5px;
            max-width: 95%;
            height: auto;
            display: block;
        }
        .products li .product-top{
            display: block;
        }
        .products li:hover .product-top{
            position: relative;
        }
        .products li:hover img{
            filter: opacity(80%);
        }
        .products li:hover .buy-now{
            display: block;
            filter: opacity(80%);
        }
        .products .product-top .buy-now{
            text-align: center;
            display: none;
            background: #FF6600;
            padding: 10px 0px;
            color: #fff;
            position: absolute;
            width: 100%;
            bottom: 0;
        }
        /* ------------------------- */
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
                    <li class="timkiem"><input type="text" name="txtsearch" placeholder="Tìm kiếm..." class="input-search"></li>
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
                                        <li><a href="http://localhost/do_an_shop_sua/Khachhang/ttkhachhang.php">Thông tin cá nhân</a></li>
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
        <div class="slider">
            <img id="img" src="Anh/slide-img1.jpg" alt="" onclick="change()">
        </div>
        <!-- end slider -->

        <!-- begin content -->
        <form action="" method="POST">
            <div id="content">
                <h2 class="sanpham">SẢN PHẨM</h2>
                <ul class="products">
                    <?php
                        while($row = mysqli_fetch_array($sql1)){
                    ?>
                        <li>
                            <div class="product-item">
                                <div class="product-top">
                                    <a href="TTChitietSp/ttchitietsp.php?key=<?php echo $row['MaID']?>" class="thumb">
                                        <img src="Anh/<?php echo $row['image']?>" alt="anh">
                                    </a>
                                    <!-- <input type="submit" name="bntadd" value="Mua ngay" class="buy-now"> -->
                                    <a href="Giohang/addgh.php?key=<?php echo $row['MaID']?>" class="buy-now">Mua ngay</a>
                                </div>
                                <div class="product-info">
                                    <a href="TTChitietSp/ttchitietsp.php?key=<?php echo $row['MaID']?>" class="product-cat">Dạng: <?php echo $row['Loai'];?></a><br>
                                    <a href="TTChitietSp/ttchitietsp.php?key=<?php echo $row['MaID']?>" class="product-name"><?php echo $row['TenSanPham'];?></a>
                                    <div class="product-price"><?php echo $row['Dongia'];?>đ</div>
                                </div>
                            </div>
                        </li>
                    <?php
                        }
                        mysqli_close($conn);
                    ?>
                </ul>
            </div>
        </form>
        <!-- end content -->
        <!-- begin changpage -->
        <div id="phantrang">
            <?php
                // hiển thị nút first để về trang đầu tiên
                if($current_page > 3){
                    $first_page = 1;
                ?>
                <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $first_page ?>">First</a>

                <!-- trả về trang kế trước -->
            <?php } if($current_page > 1){
                    $prev_page = $current_page - 1;
                ?>
                <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">Back</a>
            <?php } ?>

            <!-- Hiển thị sản phẩm ở từng trang  -->
            <?php for($num = 1 ; $num <= $sum_page; $num++){ ?>
                <?php if($num != $current_page){ ?>
                        <?php if($num > $current_page - 3 && $num < $current_page + 3){ ?>
                            <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
                    <?php } ?>

                    <?php } else { ?>
                        <strong class="current-page page-item"><? $num ?></strong>
                <?php } ?>
            <?php } ?>
            
            <!-- trả về trang tiếp theo -->
            <?php if($current_page < $sum_page - 1){
                    $next_page = $current_page + 1;
                ?>
                <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">Next</a>
            <?php } ?>

            <!-- Hiển thị trang cuối -->
            <?php
                if($current_page < $sum_page - 2){
                    $end_page = $sum_page;
                ?>
                <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>">Last</a>
            <?php } ?>
        </div>                  
        <!-- end changpage -->

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
    <script>
        var a = 1;
        change = function(){
            var imgs = ["Anh/slide-img1.jpg", "Anh/slide-img2.jpg", "Anh/slide-img3.jpg"];
            document.getElementById('img').src = imgs[a];
            a++;
            if(a == 3){
                a = 0;
            }
        }
        setInterval(change, 3000)
    </script>
</body>
</html>