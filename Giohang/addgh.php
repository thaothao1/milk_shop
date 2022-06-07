<?php
    session_start();
    if(!isset($_SESSION["User"])){
        header("location: http://localhost/do_an_shop_sua/Login/loginkh.php");
    }
    else{
        $khoa = $_GET["key"];
        require("../Context/connect.php");
        $sql = "SELECT *from ttsanpham WHERE MaID = '$khoa';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $makh = $_SESSION['User'];
        $maid = $row["MaID"];
        $tensp = $row["TenSanPham"];
        $sl = 1;
        $sqladd = "INSERT INTO `giohang` (`MaKH`, `MaID`, `TenSp`, `CheckTT`, `Soluong`) VALUES ('$makh', '$maid', '$tensp', '1', '$sl');";
        $resultadd = mysqli_query($conn, $sqladd);
        if($resultadd){
            mysqli_close($conn);
            header("location: ../Giohang/giohang.php");
        }
        else{
            echo "Thêm thất bại" .  mysqli_error($conn);
        }
    }
?>