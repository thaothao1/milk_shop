<?php
    session_start();
    if(!isset($_SESSION["Useradmin"])){
        header("location: http://localhost/classroom/do_an_shop_sua/Login/loginadmin.php");
    }
    else{
        require("../../Context/connect.php");
        $sql = "SELECT * FROM `ttsanpham`";
        $result = mysqli_query($conn, $sql);
        // Số sản phẩm trong 1 trang
        $item_per_page = 6;
        // đánh số trang
        $current_page = !empty($_GET['page']) ? $_GET['page']:1;
        // tổng số trang thu được từ database
        $offset = ($current_page - 1) * $item_per_page;
        $sql1 = mysqli_query($conn,"SELECT * FROM `ttsanpham` ORDER BY `MaID` ASC LIMIT ".$item_per_page." OFFSET ".$offset.";");
        $total = mysqli_query($conn,"SELECT * FROM `ttsanpham`");
        $total = $total->num_rows;
        $sum_page = ceil($total/$item_per_page);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sản phẩm</title>
    <link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../cssAdmin.css">
    <style>
        .img-pro img{
            width: 100px;
            height: 100px;
        }
        table{
            text-align: center;
        }
        .row{
            margin-bottom: 20px;
        }
        #phantrang{
            text-align: center;
            height: 100px;
        }
        #phantrang a{
            color: orange;
            font-weight: bold;
            font-family: sans-serif;
            line-height: 50px;
        }
        #phantrang a:hover{
            color: orangered;
            font-weight: bold;
            font-family: sans-serif;
        }
        .page-item{
            font-size: 20px;
        }
    </style>
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
    <div class="row" >
		<div class="container" style="background-color: white;">
            <h3 style="text-align: center; color: blue;">Thông tin sản phẩm</h3>
                <hr size="5px" color="red">
            <div class="container text-left">
				<a href="addttsp.php" class="btn btn-success">Thêm thông tin sản phẩm</a>
			</div>
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
                        <th>Mã ID</th>
                        <th>Mã mặt hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Tên hãng</th>
                        <th>Loại</th>
                        <th>Trọng lượng</th>
                        <th>Đơn giá</th>
                        <th>Image</th>
                        <th colspan="2"><a href="">Quyền ADMIN</a></th>
                        <th></th>
					</tr>
				</thead>
				<tbody>
                    <?php
                        while($row = mysqli_fetch_array($sql1)){
                    ?>
                        <tr>
                            <td><?php echo $row["MaID"]?></td>
                            <td><?php echo $row["MaMH"]?></td>
                            <td><?php echo $row["TenSanPham"]?></td>
                            <td><?php echo $row["TenHang"]?></td>
                            <td><?php echo $row["Loai"]?></td>
                            <td><?php echo $row["TrongLuong"]?></td>
                            <td><?php echo $row["Dongia"]?></td>
                            <td class="img-pro"><img src="../../Anh/<?php echo $row['image']?>" alt="anh" ></td>
                            <td><a href="updatettsp.php?key=<?php echo  $row['MaID']?>" class="btn btn-success">update</a></td>
                            <td><a href="deletettsp.php?key=<?php echo $row['MaID']?>" class="btn btn-success"
                                onclick="return confirm('Bạn có chắc chắc muốn xóa không?')">delete</a></td>
                            <td><a href="chitietsp.php?key=<?php echo $row['MaID']?>" class="btn btn-success">C.Tiết</a></td>
                        </tr>
                    <?php
                        }
                        mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
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

</body>
</html>
