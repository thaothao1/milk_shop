<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Đăng nhập</title>
    <style>
        .container h1{
            padding-top: 20px;
        }
        a{
            text-decoration: none;
            color: black;
            border: 1px solid #555555;
            border-radius: 5px;
        }
        form button{
            margin: 0 auto;
            color: white;
            text-decoration: none;
            display: block;
            font-size:larger;
        }
        form button:hover{
            color: purple;
            text-decoration: none;
            display: block;
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
        $sos = null;
        if(isset($_POST["btnSub"])){
            require("../Context/connect.php");
            $sql = "SELECT * FROM `admin`;";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $user = $_POST["txtUser"];
            $pass = $_POST["txtPassword"];
            if($user == $row["User"] && $pass == $row["PassWord"]){
                $_SESSION["Useradmin"] = $row["User"];
                header("location: http://localhost/do_an_shop_sua/Sanpham/sanpham.php");
            }
            else{
                $sos = 'Sai tài khoản hoặc mật khẩu!';
            }
        }
    ?>
    <div class="container">
        <h1>ĐĂNG NHẬP</h1>
        <a href="http://localhost/do_an_shop_sua/">Trang chủ</a><br>
        <?php
            echo $sos;
        ?>
        <form action="" method="POST">
            <input type="text" placeholder="Tên đăng nhập" name="txtUser" required>
            <input type="password" placeholder="Mật khẩu" name="txtPassword" required id="pass">
            <span class="material-icons-outlined" onclick="change(this)">visibility</span>
            <button type="submit" name="btnSub">Đăng nhập</button>
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
</html>