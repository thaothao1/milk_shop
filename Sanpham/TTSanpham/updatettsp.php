
<?php
    session_start();
    if(!isset($_SESSION["Useradmin"])){
        header("location: http://localhost/classroom/do_an_shop_sua/Login/loginadmin.php");
    }
    $khoa = $_GET["key"];
    require("../../Context/connect.php");
    $sql = "select *from `ttsanpham` where MaID = '$khoa'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "getID thất bại" .  mysqli_error($conn);
    }
    else $row = mysqli_fetch_assoc($result);

    if(isset($_POST["btnUpdate"])){
        $maid = $_POST["txtMaID"];
        $mamh = $_POST["txtMaMH"];
        $tensp = $_POST["txtTenSP"];
        $tenhang = $_POST["txtTenhang"];
        $loai = $_POST["txtLoai"];
        $trongluong = $_POST["txtTrongluong"];
        $dongia = $_POST["txtDongia"];
        $ngsx = $_POST["txtNgaySX"];
        $hsd = $_POST["txtHSD"];
        $tpdd = $_POST["txtTPDD"];
        $loiich = $_POST["txtLoiIch"];
        $img = $_POST["txtImg"];
        $sql = "UPDATE `ttsanpham` SET `MaID` = '$maid', `MaMH` = '$mamh', `TenSanPham` = '$tensp', `TenHang` = '$tenhang', `Loai` = '$loai', `TrongLuong` = '$trongluong', `Dongia` = '$dongia', `NgaySX` = '$ngsx', `HanSD` = '$hsd', `TPDinhDuong` = '$tpdd', `Loiich` = '$loiich', `image` = '$img' WHERE `ttsanpham`.`MaID` = '$khoa'";
        $result = mysqli_query($conn, $sql);
        if($result){
            mysqli_close($conn);
            header("location: ttsanpham.php");
        }
        else{
            echo "Update thất bại" .  mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update sản phẩm</title>
    <link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../cssAdmin.css">
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
    <form method="POST">
    <div class="container col-md-5" style="font-family: sans-serif; font-weight: bold;">
		<div class="card">
			<div class="card-body">
                <h3 style="text-align: center; color: blue;">Update thông tin sản phẩm</h3>
                <hr size="3px" color="red">
				<fieldset class="form-group">
					<label>Mã ID: </label> 
                    <input type="text" name="txtMaID" value = "<?php echo $row['MaID']?>" class="form-control" required="required">
				</fieldset>

				<fieldset class="form-group">
					<label>Mã mặt hàng: </label> 
                        <select name="txtMaMH" class="form-control" required="required">
                            <?php
                                $sql = "SELECT * FROM `sanpham`";
                                $result = mysqli_query($conn, $sql);
                                while($row1 = mysqli_fetch_assoc($result)){
                            ?>
                                <option value="<?php echo $row1['MaMH']?>" <?php if($row1['MaMH'] == $row['MaMH']) echo "selected"?>><?php echo $row1['MaMH']; echo "-"; echo $row1['TenHang']?></option>
                            <?php
                                }
                            ?>
                        </select>
				</fieldset>

                <fieldset class="form-group">
					<label>Tên sản phẩm: </label> 
                    <input type="text" name="txtTenSP" value = "<?php echo $row['TenSanPham']?>" class="form-control" required="required">
				</fieldset>

                <fieldset class="form-group">
					<label>Tên hãng: </label> 
                        <select name="txtTenhang" class="form-control" required="required">
                            <?php
                                $sql = "SELECT * FROM `sanpham`";
                                $result = mysqli_query($conn, $sql);
                                while($row1 = mysqli_fetch_assoc($result)){
                            ?>
                                <option value="<?php echo $row1['TenHang']?>" <?php if($row1['TenHang'] == $row['TenHang']) echo "selected"?>><?php echo $row1['MaMH']; echo "-"; echo $row1['TenHang']?></option>
                            <?php
                                }
                            ?>
                        </select>
				</fieldset>

                <fieldset class="form-group">
					<label>Loại (bột - lỏng): </label> 
                    <select name="txtLoai" class="form-control" required="required">
                            <option value="Bột">Dạng bột</option>
                            <option value="nước">Dạng nước</option>
                    </select>
				</fieldset>

                <fieldset class="form-group">
					<label>Trọng lượng: </label> 
                    <input type="text" name="txtTrongluong" value = "<?php echo $row['TrongLuong']?>" class="form-control" required="required">
				</fieldset>

                <fieldset class="form-group">
					<label>Đơn giá: </label> 
                    <input type="text" name="txtDongia" value = "<?php echo $row['Dongia']?>" class="form-control" required="required">
				</fieldset>

                <fieldset class="form-group">
					<label>Ngày sản xuất: </label> 
                    <input type="text" name="txtNgaySX" value = "<?php echo $row['NgaySX']?>" class="form-control" required="required">
				</fieldset>

                <fieldset class="form-group">
					<label>Hạn sử dụng: </label> 
                    <input type="text" name="txtHSD" value = "<?php echo $row['HanSD']?>" class="form-control" required="required">
				</fieldset>

                <fieldset class="form-group">
					<label>TP dinh dưỡng: </label> 
                    <input type="text" name="txtTPDD" value = "<?php echo $row['TPDinhDuong']?>" class="form-control" required="required">
				</fieldset>

                <fieldset class="form-group">
					<label>Lợi ích: </label> 
                    <input type="text" name="txtLoiIch" value = "<?php echo $row['Loiich']?>" class="form-control" required="required">
				</fieldset>

                <fieldset class="form-group">
					<label>Hình ảnh: </label> 
                    <input type="file" name="txtImg" value = "<?php echo $row['image']?>" class="form-control" required="required">
				</fieldset>

                <button type="submit" name="btnUpdate" value="Update" class="btn btn-success" href="#">Update</button>
                <button type="reset" name="btnHuy" value="Reset" class="btn btn-success" href="#">Hủy</button>
        </div>
        </form>
</body>
</html>