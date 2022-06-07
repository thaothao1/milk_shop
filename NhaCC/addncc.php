<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhà cung cấp</title>
    <link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../cssAdmin.css">
</head>
<body>
    <?php
        require("../Context/connect.php");
        if(isset($_POST["btnAdd"])){
            $mancc = $_POST["txtMancc"];
            $tenncc = $_POST["txtTenNCC"];
            $diachi = $_POST["txtDiaChi"];
            $email = $_POST["txtEmail"];
            $sdt = $_POST["txtSDT"];
            $sql = "INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `DiaChi`, `Email`, `SDT`) VALUES ('$mancc', '$tenncc', '$diachi', '$email', '$sdt')";
            $result = mysqli_query($conn, $sql);
            if($result){
                mysqli_close($conn);
                header("location: nhacungcap.php");
            }
            else{
                echo "Thêm thất bại" .  mysqli_error($conn);
            }
        }
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
                    <li><a href="Login/logout.php">Đăng xuất</a></li> 
                </ul>
            </div>
        </div>
	</header>
	<br>
    <form action="" method="POST">
    <div class="container col-md-5" style="font-family: sans-serif; font-weight: bold;">
		<div class="card">
			<div class="card-body">
                <h3 style="text-align: center; color: blue;">Thêm mới nhà cung cấp</h3>
                <hr size="3px" color="red">
				<fieldset class="form-group">
					<label>Mã nhà cung cấp: </label> 
                    <input type="text" name="txtMancc" placeholder="Mã nhà cung cấp" class="form-control" required="required">
				</fieldset>

				<fieldset class="form-group">
					<label>Tên nhà cung cấp: </label> 
                    <input type="text" name="txtTenNCC" placeholder="Tên nhà cung cấp" class="form-control" required="required">
				</fieldset>

                <fieldset class="form-group">
					<label>Địa chỉ: </label> 
                    <input type="text" name="txtDiaChi" placeholder="Địa chỉ" class="form-control" required="required">
				</fieldset>

                <fieldset class="form-group">
					<label>Số điện thoại: </label> 
                    <input type="text" name="txtSDT" placeholder="Số điện thoại" class="form-control" required="required">
				</fieldset>

                <fieldset class="form-group">
					<label>Email: </label> 
                    <input type="text" name="txtEmail" placeholder="Email" class="form-control" required="required">
				</fieldset>
                <button type="submit" name="btnAdd" value="Add" class="btn btn-success" href="#">Thêm</button>
                <button type="reset" name="btnHuy" value="Reset" class="btn btn-success" href="#">Hủy</button>
            </div>
        </div>
    </div>
    </form>
</body>
</html>