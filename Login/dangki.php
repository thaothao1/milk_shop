<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký khách hàng</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" type="text/css" href="register.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Two+Tone"
    rel="stylesheet"> 
    <style>
        .container{
            height: 600px;
        }
        .container form{
            width: 340px;
            position: absolute;
            top: 30px;
            padding: 0 20px;
            transition: 0.5s;
        }
        form h1{
            padding-top: 10px;
        }
        a{
            text-decoration: none;
            color: black;
            border: 1px solid #555555;
            border-radius: 5px;
        }
        span{
            display: inline-block;
            position: relative;
            top: 9px;
            transform: scale(0.7, 0.7);
            cursor: pointer;
        }
        form #pass{
            width: 90%;
        }
        
    </style>
</head>
<body>
    <?php
    $msg = "";
        require("../Context/connect.php");
        if(isset($_POST["btnAdd"])){
            $user = $_POST["txtUser"];
            $pass = $_POST["txtPassWord"];
            $pass_check = $_POST["txtPasswordXN"];
            $tenkh = $_POST["txtTenKH"];
            $diachi = $_POST["txtDiaChi"];
            $sdt = $_POST["txtSDT"];
            $email = $_POST["txtEmail"];
            if($pass != $pass_check){
                $msg = 'Mật khẩu không trùng khớp!';
            }
            else{
                $sql = "INSERT INTO `khachhang` (`TenKH`, `Diachi`, `SDT`, `Email`, `User`, `Password`) VALUES ('$tenkh', '$diachi', '$sdt', '$email', '$user', '$pass')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    mysqli_close($conn);
                    header("location: loginkh.php");
                }
                else{
                    echo "Tài khoản đã tồn tại";
                }
            }
        }
    ?>
    <div class="container">
        <form method="POST">
            <h1>TẠO TÀI KHOẢN</h1>
            <a href="http://localhost/do_an_shop_sua/">Trang chủ</a><br>
            <input type="text" name="txtUser" placeholder="Tài khoản">
            <input type="password" name="txtPassWord" placeholder="Mật khẩu" id="pass">
            <span class="material-icons-outlined" onclick="change(this)">visibility</span>
            <?php echo $msg?>
            <input type="password" name="txtPasswordXN" placeholder="Xác nhận mật khẩu">
            <input type="text" name="txtTenKH" placeholder="Tên khách hàng">
            <input type="text" name="txtEmail" placeholder="Email">
            <input type="text" name="txtSDT" placeholder="Số điện thoại">
            <input type="text" name="txtDiaChi" placeholder="Địa chỉ">
            <button type="submit" name="btnAdd">ĐĂNG KÝ</button>
        </form>
    </div>
    <script>
        var ip = document.getElementsByTagName('input');
        var sp = document.querySelector('span');
        function change(e){
           if(ip[1].type == "password"){
            ip[1].type = "text";
            sp.innerHTML  = "visibility_off";
           }
           else {
                ip[1].type = "password";
                sp.innerHTML = "visibility";
           }
        }

    </script>
</body>
</htm>