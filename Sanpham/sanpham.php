<?php
    session_start();
    if(!isset($_SESSION["Useradmin"])){
        header("location: http://localhost/classroom/do_an_shop_sua/Login/loginadmin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../cssAdmin.css">
    <style>
        table{
            text-align: center;
        }
        .row{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php
        require("../Context/connect.php");
        $sql = "SELECT * FROM `sanpham`";
        $result = mysqli_query($conn, $sql);
    ?>
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
                    <li><a href="../Login/logout.php">Đăng xuất</a></li> 
                </ul>
            </div>
            <!-- end menu -->
        </div>
	</header>
	<br>
    <div class="row" >
		<div class="container" style="background-color: white;">
            <h3 style="text-align: center; color: blue;">Danh sách sản phẩm</h3>
                <hr size="5px" color="red">
			<div class="container text-left">
				<a href="addsp.php" class="btn btn-success">Thêm sản phẩm</a>
			</div>
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
                        <th>Mã sản phẩm</th>
                        <th>Mã nhà cung cấp</th>
                        <th>Tên Hàng</th>
                        <th>Loại Hãng</th>
                        <th colspan="2"><a href="">Quyền ADMIN</a></th>
					</tr>
				</thead>
				<tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                        <td><?php echo $row["MaMH"]?></td>
                        <td><?php echo $row["MaNCC"]?></td>
                        <td><?php echo $row["TenHang"]?></td>
                        <td><?php echo $row["LoaiHang"]?></td>
                        <td><a href="updatesp.php?key=<?php echo  $row['MaMH']?>" class="btn btn-success">update</a></td>
                        <td><a href="deletesp.php?key=<?php echo $row['MaMH']?>" class="btn btn-success"
                            onclick="return confirm('Bạn có chắc chắc muốn xóa không?')">delete</a></td>
                        </tr>
                    <?php
                        }
                        mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
</body>
</html>