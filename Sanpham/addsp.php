<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TThêm sản phẩm</title>
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
            $mamh = $_POST["txtMaMH"];
            $mancc = $_POST["txtMaNCC"];
            $tenlh = $_POST["txtTenLH"];
            $lh = $_POST["txtLH"];
            $sql = "INSERT INTO `sanpham` (`MaMH`, `MaNCC`, `TenHang`, `LoaiHang`) VALUES ('$mamh', '$mancc', '$tenlh', '$lh')";
            $result = mysqli_query($conn, $sql);
            if($result){
                mysqli_close($conn);
                header("location: sanpham.php");
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
    <form action="" method="POST">
    <div class="container col-md-5" style="font-family: sans-serif; font-weight: bold; padding-top: 150px ;">
		<div class="card">
			<div class="card-body">
                <h3 style="text-align: center; color: blue;">Thêm mới sản phẩm</h3>
                <hr size="3px" color="red">
				<fieldset class="form-group">
					<label>Mã mặt hàng: </label> 
                    <input type="text" name="txtMaMH" placeholder="Mã mặt hàng" class="form-control" required="required">
				</fieldset>

				<fieldset class="form-group">
					<label>Mã nhà cung cấp: </label> 
                        <select name="txtMaNCC" class="form-control" required="required">
                            <?php
                                $sql = "SELECT * FROM `nhacungcap`";
                                $result = mysqli_query($conn, $sql);
                                while($row1 = mysqli_fetch_assoc($result)){
                            ?>
                                <option value="<?php echo $row1['MaNCC']?>"><?php echo $row1['MaNCC']; echo "-"; echo $row1['TenNCC']?></option>
                            <?php
                                }
                            ?>
                        </select>
				</fieldset>

                <fieldset class="form-group">
					<label>Tên loại hàng: </label> 
                    <input type="text" name="txtTenLH" placeholder="Tên loại hàng" class="form-control" required="required">
				</fieldset>

                <fieldset class="form-group">
					<label>Loại hàng: </label> 
                    <input type="text" name="txtLH" placeholder="Loại hàng" class="form-control" required="required">
				</fieldset>

                <button type="submit" name="btnAdd" value="Add" class="btn btn-success" href="#">Thêm</button>
                <button type="reset" name="btnHuy" value="Reset" class="btn btn-success" href="#">Hủy</button>
        </form>
    </div>
    <br>
</body>
</html>