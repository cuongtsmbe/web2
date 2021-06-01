<?php if(!isset($_SESSION)){session_start();}  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./../css/dangnhap_dangxuat/dangnhap_dangki.css"> 
    <script src="./../js/jquery.js"></script>
</head>
<?php
if (isset($_SESSION['username']) && isset($_SESSION['name'])) {
    //echo "<script>console.log('username : '+ '".$_SESSION['username']."');</script>";
    header('location:./index.php');
}
?>
<body>
    <section>
        <div class="container dangnhap_container">
            <div class="form_content">
                <h2>Lấy lại thông tin qua mail: </h2>
                <p>Hãy nhập thông tin và vào gmail để xem lại thông tin nhé.</p>
                    <a href="./index.php">Trang Chủ</a>
            </div>
            <div class="dangnhap">
                <h1>Quên mật khẩu</h1>
                <form action='./dangnhap_dangki/xuly/gmail.php' method="post">
                    <input type="text" name="username" required="" placeholder="Username" id="Username">
                    <input type="submit" name="guimail" value="Yêu cầu" >
                </form>
                <a href="./index.php?url=dangki">Đăng Kí</a>
            </div>
        </div>
    </section>
  
    <script>

    </script>
</body>
</html>