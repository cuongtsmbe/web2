<?php if(!isset($_SESSION)){session_start();} ?>
<?php include('./dangnhap_dangki/xuly/xuly_dangki_submit.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./../css/dangnhap_dangxuat/dangnhap_dangki.css"> 
                

    <script src="./../js/jquery.js"></script>
</head>
    <?php   
        if(isset($_SESSION['username']) && isset($_SESSION['name'])){
            header('location:./index.php');
        }
    ?>
    
<body>
    <section>
        <div class="container dangki_container">
            <div class="form_content">
                <h2 id="h2">Đăng kí</h2>
                <p>Đăng kí để có thể tiếp tục mua hàng?</p>
                    <a href="./index.php">Trang Chủ</a>
            </div>
            <div class="dangki">
                <h1>Register</h1>
                <form action="./index.php?url=dangki" method="POST" id="Form-dk" onsubmit="return Test_signup()">
                    <!-- đẩy thông tin trong form lên thanh địa chỉ tại trang action với phương thức POST  lúc này action="" bằng với action="dangki.php"-->
                    <div id="content_username"></div>
                    <input type="text" name="Username" required="" placeholder="Username" id="Username" onchange="Xuly_data_Username()">
                    <input type="text" name="hoten" required="" placeholder="Họ Tên">
                    <div id="content_password"></div>
                    <input type="password" name="Password" required="" placeholder="Password" id="Password"  onchange="Xuly_data_password()">
                    <input type="password" name="Repassword" required="" placeholder="Repassword" id="RePassword" onchange="Xuly_data_password()">                   
                    <div id="content_phone"></div>
                    <input type="tel" name="number" required="" placeholder="Phone" id="Phone" onchange="Xuly_data_phone()">
                    <div id="content_email"></div>
                    <input type="gmail" name="gmail" required="" placeholder="Nhập Gmail" id="Gmail" onchange="Xuly_data_email()">
                    <input type="text" name="Address" required="" placeholder="Address">
                    <input type="submit" name="dangki" value="Đăng kí">
                </form>
                <a href="./index.php?url=dangnhap">Đăng Nhập</a>
            </div>

        </div>
    </section>
    <script>
        var errors = [false, false, false, false];
        function Xuly_data_Username(){ //thực hiện ajax đến server để kiểm tra thông tin username
            var username = document.getElementById('Username').value;
            $.ajax({
                url:'./dangnhap_dangki/xuly/xuly_dangki_nhap.php',
                type:'POST',
                dataType:'html',
                data:{
                    username:username
                }
            }).fail(function(){
                console.log('không thể kết nối dangki.php với file xuly_dangki_nhap.php bằng ajax.');
            }).done(function(data){
                if(data != "")
                    errors[0] = true;
                else errors[0] = false;    
                $('#content_username').html(data);
            });
        }

        function Xuly_data_password(){
            var RePassword = document.getElementById('RePassword').value;
            var pwpatt = /^[A-Za-z0-9]{6,18}$/g;
            if(!document.getElementById('Password').value){
                $('#content_password').html("Cần nhập password.");
                errors[1] = true;
                exit;
            }
            if(!pwpatt.test(document.getElementById('Password').value)){
                $('#content_password').html("Password không hợp lệ(6-18 kí tự chữ,số).");
                errors[1] = true;
            }else
                if(document.getElementById('Password').value != RePassword){
                    $('#content_password').html("Password không trùng khớp.");
                    errors[1] = true;
                }else{
                    $('#content_password').html("");
                    errors[1] = false;
                }
        }

        function Xuly_data_phone(){
            if(!document.getElementById('Phone').value){
                $('#content_phone').html("Cần nhập số điện thoại.");
                errors[2] = true;
                exit;
            }
            var patt = /^0[35789]\d{8}$/;
            if(!patt.test(document.getElementById('Phone').value)){
                $('#content_phone').html("Số điện thoại không hợp lệ (gồm 10 số).");
                errors[2] = true;
            }else{
                $('#content_phone').html("");
                errors[2] = false;
            }
        }

        function Xuly_data_email(){
            if(!document.getElementById('Gmail').value){
                $('#content_email').html("Cần nhập Gmail.");
                errors[3] = true;
                exit;
            }
            var patt = /^([a-z0-9_\.-]+)@([\da-z\.]+)\.([a-z\.]{2,6})$/;
            if(!patt.test(document.getElementById('Gmail').value)){
                $('#content_email').html("Gmail không hợp lệ (example: abc@gmail.com).");
                errors[3] = true;
            }else{
                $('#content_email').html("");
                errors[3] = false;
            }
        }

        function Test_signup(){
            var i;
            for(i in errors){
                if(errors[i] == true){
                    alert("Vui lòng nhập đúng thông tin!");
                    return false;
                }
            }
                document.body.style.cursor = 'wait';
                document.getElementById('Form-dk').btnSubmit.style.cursor = 'wait';
                document.getElementById('Form-dk').submit();
                return true;
        }
    </script>
    



  

    

</body>
</html> 