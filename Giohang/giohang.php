
<?php
    $tk = 'Tài khoản';
    session_start();
    if(!isset($_SESSION["User"])){
        header("location: http://localhost/do_an_shop_sua/Login/loginkh.php");
    }
    else{
        $tk = $_SESSION["User"];
        require("../Context/connect.php");
        $sql = "SELECT * FROM `giohang` INNER JOIN ttsanpham WHERE giohang.MaID = ttsanpham.MaID And giohang.CheckTT = '1' And giohang.MaKH = '$tk'";
        $result = mysqli_query($conn, $sql);
        $sqlkh = "SELECT * FROM `khachhang` WHERE khachhang.User = '$tk'";
        $resultkh = mysqli_query($conn, $sqlkh);
        $rowkh = mysqli_fetch_assoc($resultkh);

        if(isset($_POST["bntUpdate"])){
            $hoten = $_POST["txtHoTen"];
            $giotinh = $_POST["txtGioiTinh"];
            $diachi = $_POST["txtDiaChi"];
            $sdt = $_POST["txtSDT"];
            $email = $_POST["txtEmail"];
            require("../Context/connect.php");
            $sql = "UPDATE khachhang Set khachhang.TenKH = '$hoten', khachhang.Gioitinh = '$giotinh',khachhang.Diachi = '$diachi', khachhang.SDT = '$sdt', khachhang.Email = '$email' WHERE khachhang.User = '$tk'";
            $result = mysqli_query($conn, $sql);
            if($result){
                mysqli_close($conn);
                header("location: giohang.php");
            }
            else{
                echo 'Tài khoản đã tồn tại' .mysqli_error($conn);
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
    <title>giỏ hàng</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/fonts/themify-icons-font/themify-icons/themify-icons.css">
    <style>
        /* ----------content------------- */
        #content{
            width: 1200px;
            margin: 20px auto;
            margin-top: 180px;
            border-radius: 10px;
            height: auto;
        }
        .table{
            border: #DDDDDD solid 1px;
            margin: 10px auto;
            margin-bottom: 40px;
        }

        .table td{
            padding: 5px 0;
            font-size: 15px;
            color: 	#555555;
            font-family: Tahoma;
        }
        .table .user{   
            font-size: 18px;
            color: red;
        }
        .table input[type=text]{
            font-family: Tahoma;
            font-weight: bold;
            font-size: 13px;
            padding-left: 5px;
            border: #DDDDDD solid 1px;
            height: 30px;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .table input[type=submit]{
            padding: 0 4px;
            border: #DDDDDD solid 1px;
            height: 20px;
            color: #fff;
            background: #FF3300;
            font-size: 15px;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .table textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
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
        .products .product-info{
            font-size: 14px;
            color: #777777;
            padding-left: 50px;
            padding-right: 5px;
            box-sizing: border-box;
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
        .products .soluong {
            width: 100px;
            height: 32px;
            font-size: 18px;
            font-weight: 400px;
            box-sizing: border-box;
            text-align: center;
            color: #d0011b;

        }
        .products .product-soluong{
            font-size: 18px;
            color: #757575;
        }

        .products .product-buy{
            padding-top: 75px;
        }

        .product-buy .buy{
            padding: 5px 20px;
            cursor: pointer;
            height: 32px;
            background: rgba(208,1,27,0.08);
            font-size: 16px;
            font-weight: 400;
            text-align: center;
            border: 1px solid;
            border-radius: 10px;
            color: #d0011b;
            margin-left: 80%;
        }
        .product-update a{
            padding: 0 5px;
            cursor: pointer;
            height: 32px;
            background: rgba(208,1,27,0.08);
            font-size: 16px;
            text-align: center;
            border: 1px solid;
            border-radius: 10px;
            color: #d0011b;
        }
        .product-update{
            margin: 20px;
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
        <!-- <div id="slider">
            <img src="../Anh/slide-img3.jpg" alt="" width="100%" height ="560px"> 
        </div>  -->
        <!-- end slider -->

        <!-- begin content -->
        <form action="" method="post">
            <div id="content">
                    <table class="table">
                        <tr>
                            <th colspan="6">Địa chỉ nhận hàng</th>
                        </tr>
                        <tr>
                            <td><label>Tài khoản: </label></td>
                            <td class="user"><?php echo $rowkh['User']?></td>
                        </tr>
                        <tr>
                            <td><label>Họ tên: </label></td>
                            <td>
                                <input type="text" name="txtHoTen" value="<?php echo $rowkh['TenKH']?>">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Giới tính: </label></td>
                            <td>
                                <select name="txtGioiTinh">
                                    <option value="1"  <?php if($rowkh['Gioitinh'] == '1') echo "selected"?>>Nam</option>
                                    <option value="0" <?php if($rowkh['Gioitinh'] == '0') echo "selected"?>>Nữ</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Địa chỉ: </label></td>
                            <td>
                                <textarea name="txtDiaChi"><?php echo $rowkh['Diachi']?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Số điện thoại: </label></td>
                            <td>
                                <input type="text" name="txtSDT" value="<?php echo $rowkh['SDT']?>">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Email: </label></td>
                            <td>
                                <input type="text" name="txtEmail" value="<?php echo $rowkh['Email']?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="bntUpdate" value="Cập nhật" onclick = "return confirm('Bạn có chắc muốn thay đổi thông tin không?')">
                            </td>
                        </tr>
                    </table>
                    <ul class="products">
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <li>
                            <div class="product-item">
                                <div class="product-top">
                                    <a href="../TTChitietSp/ttchitietsp.php?key=<?php echo $row['MaID']?>" class="thumb">
                                        <img src="../Anh/<?php echo $row['image']?>" alt="anh">
                                    </a>
                                </div>
                            </div>
                        </li>
                        <div class="product-info">
                            <div><?php echo $row['TenSanPham']; echo " ";echo $row['TrongLuong']?></div>
                            <div class="product-hang">Hạng sữa: <?php echo $row['TenHang'];?></div>
                            <div class="product-soluong">Số lượng: <a class="soluong"><?php echo $row['Soluong'];?></a></div>
                            <div class="product-price"><?php echo $row['Dongia'];?>đ</div><br>
                            <div class="product-update"><a class="delete" href="deletespgh.php?key=<?php echo $row['MaID']?>"
                                onclick="return confirm('Bạn có chắc chắc muốn xóa không?')">Xóa</a>
                                <a class="update" href="updatespgh.php?key=<?php echo $row['MaID']?>">Sửa</a>
                            </div>
                        </div>
                    <?php
                        }
                        mysqli_close($conn);
                    ?>
                </ul>
                <div class="endline"></div>
                <h3>Tổng tiền: 
                    <?php
                        require("../Context/connect.php");
                        $sql ="SELECT Sum(Soluong*Dongia*1000) AS TongTien FROM `giohang` INNER JOIN ttsanpham WHERE giohang.MaID = ttsanpham.MaID And giohang.CheckTT = '1' And giohang.MaKH = '$tk';";
                        $resultsum = mysqli_query($conn, $sql);
                        $rowsum = mysqli_fetch_assoc($resultsum);
                        if($resultsum){
                            echo $rowsum['TongTien']; echo " VND";
                            mysqli_close($conn);
                        }
                        else{
                            echo "Lấy số lượng thất bại".mysqli_error($conn);
                        }
                    ?>
                    </h3>
                <div class="product-buy">
                    <a class="buy" href="thanhtoan.php?key=<?php echo '1'?>"
                     onclick="return confirm('Bạn có chắc muốn đặt hàng không?')">Đặt hàng</a>
                </div>
            </div>
        </form>
</body>
</html>