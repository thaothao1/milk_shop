<?php
    session_start();
    $tk = 'Tài khoản';
    if(isset($_SESSION["User"])){
        $msg1 = null;
        $msg2 = null;
        $msg3 = null;
        $tk = $_SESSION["User"];
        require("../Context/connect.php");
        $sql = "SELECT * FROM `khachhang` WHERE khachhang.User = '$tk'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($result){
            mysqli_close($conn);
        }
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
                header("location: ttkhachhang.php");
                $msg1 = 'Thay đổi thông tin thành công';
                $msg2 = null;
                $msg3 = null;
            }
            else{
                echo 'Tài khoản đã tồn tại' .mysqli_error($conn);
            }
        }
        if(isset($_POST["bntSwapPass"])){
            $pass_old = $_POST["txtPassword"];
            $pass_new = $_POST["txtPasswordNew"];
            $pass_check = $_POST["txtPasswordXN"];
            if($pass_old != $row["PassWord"]){
                $msg2 = 'Sai mật khẩu!';
                $msg1 = "";
                $msg3 = "";
            }
            else{
                if($pass_new != $pass_check){
                    $msg3 = 'Mật khẩu không trùng khớp!';
                    $msg2 = "";
                    $msg1 = "";
                }
                else{
                    require("../Context/connect.php");
                    $sql = "UPDATE khachhang Set khachhang.PassWord = '$pass_new' WHERE khachhang.User = '$tk'";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        mysqli_close($conn);
                        $msg1 = 'Đổi mật khẩu thành công';
                        $msg2 = "";
                        $msg3 = "";
                    }
                    else{
                        echo 'Đổi mật khẩu thất bại' .mysqli_error($conn);
                    }
                }
            }
        }
    }
    else{
        header("location: http://localhost/do_an_shop_sua/Login/loginkh.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/fonts/themify-icons-font/themify-icons/themify-icons.css">
    <style>
       /* ----------content------------- */

        #content{
            width: 1200px;
            margin: 110px auto;
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
            border: none;
        }

        .table{
            display: inline-block;
            border: #DDDDDD solid 1px;
            margin: 20px 50px;
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
            <img src="Anh/slide-img2.jpg" alt="" width="100%" height ="460px"> 
        </div>  -->
        <!-- end slider -->

        <!-- begin content -->
        <form action="" method="post">
            <div id="content">
                <h2 class="sanpham"><?php echo $msg1;?></h2>
                    <table class="table">
                        <tr>
                            <th colspan="6">Thông tin cá nhân</th>
                        </tr>
                        <tr>
                            <td><label>Tài khoản: </label></td>
                            <td class="user"><?php echo $row['User']?></td>
                        </tr>
                        <tr>
                            <td><label>Họ tên: </label></td>
                            <td>
                                <input type="text" name="txtHoTen" value="<?php echo $row['TenKH']?>">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Giới tính: </label></td>
                            <td>
                                <select name="txtGioiTinh">
                                    <option value="1"  <?php if($row['Gioitinh'] == '1') echo "selected"?>>Nam</option>
                                    <option value="0" <?php if($row['Gioitinh'] == '0') echo "selected"?>>Nữ</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Địa chỉ: </label></td>
                            <td>
                                <textarea name="txtDiaChi"><?php echo $row['Diachi']?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Số điện thoại: </label></td>
                            <td>
                                <input type="text" name="txtSDT" value="<?php echo $row['SDT']?>">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Email: </label></td>
                            <td>
                                <input type="text" name="txtEmail" value="<?php echo $row['Email']?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="bntUpdate" value="Cập nhật" onclick = "return confirm('Bạn có chắc muốn thay đổi thông tin không?')">
                            </td>
                        </tr>
                    </table>
                    <table class="table">
                    <tr>
                            <th colspan="3">Đổi mật khẩu</th>
                        </tr>
                        <tr>
                            <td><label>Mật khẩu cũ: </label></td>
                            <td>
                                <input type="password" name="txtPassword" placeholder="Mật khẩu cũ">
                            </td>
                            <td>
                                <?php echo $msg2;?>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Mật khẩu mới</label></td>
                            <td>
                                <input type="password" name="txtPasswordNew" placeholder="Mật khẩy mơi">
                            </td>
                            <td>
                                <?php echo $msg3;?>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Xác nhận mật khẩu: </label></td>
                            <td>
                                <input type="password" name="txtPasswordXN" placeholder="Xác nhận mật khẩu">
                            </td>
                            <td>
                                <?php echo $msg3;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="bntSwapPass" value="Đổi mật khẩu">
                            </td>
                        </tr>
                    </table>
            </div>
        </form>
        <!-- end content -->
        <div class="clear"></div>

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