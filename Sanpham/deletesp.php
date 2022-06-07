<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $khoa = $_GET["key"];
        require("../Context/connect.php");
        $sql = "DELETE FROM `sanpham` WHERE `sanpham`.`MaMH` = '$khoa'";
        $result = mysqli_query($conn, $sql);
        if($result){
            mysqli_close($conn);
            header("location: sanpham.php");
        }
        else {
            echo "xóa thất bại" . mysqli_error($conn);
        }
    ?>
</body>
</html>