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
    header('./index.php');
}
?>

<body>
    <section>
        <div class="container dangnhap_container">
            <div class="form_content">
                <h2>Đăng Nhập</h2>
                <p>Đăng Nhập Thông tin .Để có thể tiếp tục mua hàng</p>
                <a href="./index.php?">Trang Chủ</a>
            </div>
            <div class="dangnhap">
                <h1>Sign In</h1>
                <form>
                    <div id="username_content"></div>
                    <div id="username_login_suc"></div>
                    <input type="text" name="" required="" placeholder="Username" id="Username">
                    <div id="username_password"></div>
                    <input type="password" name="" required="" placeholder="Password" id="Password">
                    <input type="button" name="" value="Login" onclick="Test_login()">
                    <!-- khi click vào login thì nó sẽ gửi thông tin đăng nhập đến server để kiểm tra thong qua hàm Test_login -->
                </form>
                <div style="  display: flex;
                            flex-direction: row; width: 100%;
                            height: 20px;
                            justify-content:space-between;
                            flex-wrap: none;">
                    <div style="height:20px; width:70px "><a href="./index.php?url=dangki">Đăng Kí</a></div>
                    <div style="height:20px; "><a href="./index.php?url=quenmatkhau">Quên mật khẩu</a></div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function Test_login() {
            var username = document.getElementById('Username').value;
            var password = document.getElementById('Password').value;
            $.ajax({
                url: './dangnhap_dangki/xuly/xuly_login.php',
                type: "post",
                dataType: "html",
                data: {
                    username: username,
                    password: password
                }
            }).fail(function() {
                console.log("Không thể truy cập đến server bằng ajax .. file dangnhap.php -> xuly/xuly_login.php");
            }).done(function(data) {
                if (data == 0) {
                    $('#username_content').html("username không tồn tại");
                    $('#username_login_suc').html("");
                    $('#username_password').html("");
                }
                if (data == 1) {
                    $('#username_content').html("");
                    $('#username_login_suc').html("");
                    $('#username_password').html("Nhập sai mật khẩu.");
                }
                if (data == 2) {
                    $('#username_login_suc').html("login success");
                    $('#username_password').html("");
                    $('#username_content').html("");
                    setTimeout('Redirect()', 700); //sau 0.7s sẽ chuyển đến trang chủ
                }
            });
        }

        function Redirect() {
            var get_session_php = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>"; //biến này không xài đến , nên có thể xóa đi
            window.location = "./index.php";
        }
    </script>
</body>

</html>