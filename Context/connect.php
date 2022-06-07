<?php 
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "quan_ly_shop_sua";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if($conn){
        mysqli_query($conn, "SET NAMES 'UTF-8'");
    }
    else{
        echo "bạn đã kết nối thất bại".mysqli_connect_error();
    }

?>