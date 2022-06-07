<?php
    require("../Context/connect.php");
    $khoa = $_GET["key"];
    $sql = "UPDATE `giohang` SET `CheckTT` = '0' WHERE giohang.CheckTT = '$khoa'";
    $result = mysqli_query($conn, $sql);
    if($result){
        mysqli_close($conn);
        header("location: ../Giohang/lichsumuahang.php");
    }
    else{
        echo "Update thất bại" .  mysqli_error($conn);
    }
?>