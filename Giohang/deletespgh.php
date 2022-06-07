<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete_lich_su_mua_hang</title>
</head>
<body>
    <?php
        $khoa = $_GET["key"];
        require("../Context/connect.php");
        $sql = "DELETE FROM `giohang` WHERE `giohang`.`MaID` = '$khoa'";
        $result = mysqli_query($conn, $sql);
        if($result){
            mysqli_close($conn);
            header("location: giohang.php");
        }
        else {
            echo "xóa thất bại" . mysqli_error($conn);
        }
    ?>
</body>
</html>