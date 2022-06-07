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
    <title>Danh sách khách hàng</title>
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
        $sql = "SELECT * FROM `khachhang`";
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
        </div>
	</header>
	<br>
    <div class="row" >
		<div class="container" style="background-color: white;">
            <h3 style="text-align: center; color: blue;">Danh sách khách hàng</h3>
                <hr size="5px" color="red">
			<br>
			<table class="table table-bordered">
				<thead>
                    <tr>
                        <th>User</th>
                        <th>PassWord</th>
                        <th>Tên khách hàng</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th colspan="2"><a href="">Quyền ADMIN</a></th>
					</tr>
				</thead>
				<tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?php echo $row["User"]?></td>
                            <td><?php echo $row["PassWord"]?></td>
                            <td><?php echo $row["TenKH"]?></td>
                            <td><?php echo $row["Gioitinh"]?></td>
                            <td><?php echo $row["Diachi"]?></td>
                            <td><?php echo $row["SDT"]?></td>
                            <td><?php echo $row["Email"]?></td>
                            <td><a href="deletekh.php?key=<?php echo $row['User']?>" class="btn btn-success"
                            onclick="return confirm('Bạn có chắc chắc muốn xóa không?')">delete</a></td>
                        </tr>
                    <?php
                        }
                        mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>