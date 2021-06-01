
    <link rel="stylesheet" href="./../css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/Profile/ThongTin/ThongTinCaNhan.css">

    <script src="./../js/jquery.js"></script>
    <!--luôn ở trên bootstrap -->
    


<body>
    <!-- nếu chưa đăng nhập thì không xem đc thông tin  -->
    <?php if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['username'])) {
        header('Location: ./index.php?url=dangnhap');
        exit;
    }
    session_write_close(); ?>
    <?php require('./task_header.php') ?>

    <div class="container">
        <h1 class="text-center">Thông tin cá nhân</h1>
        <div class="container">
            <div class="row profile">
                <div class="col-md-3">
                    <div class="profile-sidebar">
                        <div class="profile-userpic">
                            <img src="<?php echo isset($_SESSION['avatar']) ? $_SESSION['avatar'] : 'http://xemanhdep.com/wp-content/uploads/2013/03/anh-nguoi-dep.jpg' ?>" class="img-responsive" alt="Thông tin cá nhân">
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name"> <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?> </div>
                            <div class="profile-usertitle-job"> Web Developer </div>
                        </div>
                        <div class="profile-userbuttons">
                            <a href="./index.php"><button type="button" class="btn btn-success btn-sm">Trang chủ</button></a>
                            <a href="./index.php?url=dangxuat"><button type="button" class="btn btn-danger btn-sm">Thoát ra</button> </a>
                        </div>
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <div class="logo_menuchinh" style="float:left; padding-top:5px; padding-left:10px; color:#fff; margin-left:auto; margin-right:auto; text-align:center; line-height:40px; font-size:16px;font-weight:bold;font-family:Arial">cuahangbalo.com</div>


                                <li><a class="donhang" onclick="quanlydon()"><i class="glyphicon glyphicon-shopping-cart"></i> Quản lý đơn hàng </a>
                                </li>
                               
                                <li><a class="donhang" onclick="DoiMatKhau()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                            <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg></i> Đổi Mật Khẩu </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="profile-content">
                        <div id="profile_name">

                            khong the hien thi
                        </div>

                    </div>
                </div>
            </div>

</body>
<script>
    (function() {
        Thongtin()
    })()

    function Thongtin() {
        $.ajax({
            url: './Profile/ThongTin/xuly_thongtincanhan.php',
            type: "POST",
            dataType: 'html',
            data: {
                Thongtin: 1
            }
        }).fail(function() {
            alert("khong the thuc hien ");
        }).done(function(data) {
            $('#profile_name').html(data);
        })
    }

    function update() {
        $.ajax({
            url: './Profile/ThongTin/xuly_thongtincanhan.php',
            type: "POST",
            dataType: 'html',
            data: {
                update: "update_click",
                name: $("input[name=name]").val(),
                sdt: $("input[name=sdt]").val(),
                Gmail: $("input[name=Gmail]").val(),
                Avatar_img: $("input[name=Avatar_img]").val(),
                Address: $("input[name=Address]").val()
            }
        }).fail(function() {
            alert("chưa được thực hiện ");
        }).done(function(data) {
            if(data=='mail'){
                alert("mail không đúng. vd abced@gmail.com");
            }else
            if(data=='phone'){
                alert("Phone 9-> 10 số");
            }else{

            alert("update success");}
        })
    }

    function DoiMatKhau() { //hiện các ô input để thực hiện đổi password
        $.ajax({
            url: './Profile/DoiMatKhau/change_password.php',
            type: "post",
            dataType: 'html',
            data: {
                change_password: 'change_password'
            }
        }).fail(function() {
            alert("chưa được thực hiện ");
        }).done(function(data) {
            $('#profile_name').html(data);
        })
    }

    function change_password() { // khi click vào nút save 
        if ($("input[name=username]").val() == '' || $("input[name=pass_old]").val() == '' || $("input[name=password_New]").val() == '' || $("input[name=Repassword]").val() == '') {
            alert("không được để các thông tin trống!");
        } else if ($("input[name=password_New]").val() !== $("input[name=Repassword]").val()) {
            $('#warning_pass').html("</br>Mật khẩu mới không trùng");
            $('#warning_user').html("");
            $('#warning_pass_old').html("");
        } else {
            $.ajax({
                url: './Profile/DoiMatKhau/change_password.php',
                type: 'post',
                dataType: 'html',
                data: {
                    save_change: "save_change",
                    username: $("input[name=username]").val(),
                    pass_old: $("input[name=pass_old]").val(),
                    password_New: $("input[name=password_New]").val()

                }
            }).fail(function() {
                alert("Thay mật khẩu không thành công ");
            }).done(function(data) {
                if (data === 'no_exist_username') {
                    $('#warning_user').html("</br>username không đúng !");
                    $('#warning_pass_old').html("");
                    $('#warning_pass').html("");
                }
                if (data === 'password_error') {
                    $('#warning_user').html("");
                    $('#warning_pass_old').html("</br>password sai.");
                    $('#warning_pass').html("");
                }
                if (data === 'dont_match') {
                    $('#warning_user').html("");
                    $('#warning_pass_old').html("</br>password trên 5 kí tự và cho phép kí tự đặc biệt: @.().");
                    $('#warning_pass').html("");
                }
                if (data === 'success') {
                    $('#warning_success').html("</br>change password thành công.");
                    $('#warning_user').html("");
                    $('#warning_pass_old').html("");
                    $('#warning_pass').html("");
                    setTimeout(() => {
                        // sau khi update xong thì clear các ô input lại như cũ
                        $('#warning_success').html("");
                        document.getElementById('username').value = '';
                        document.getElementById('pass_old').value = '';
                        document.getElementById('password_New').value = '';
                        document.getElementById('Repassword').value = '';
                    }, 2000);
                }
            })
        }
    }

    function quanlydon() {
       
        $.ajax({
            url: './Profile/DonHang/QLDonHang.php',
            type: 'post',
            dataType: 'html',
            data: {
                quanlydon: "qldanhang"
            }
        }).fail(function() {
            alert("Không thể xem quản lý đơn hàng ");
        }).done(function(data) {
            $('#profile_name').html(data);
        })

    }

    function quanlydon_sp_date() {
        var start_date=document.getElementById('date_start_sp_duyet').value
        var end_date=document.getElementById('date_end_sp_duyet').value;
       $.ajax({
           url: './Profile/DonHang/QLDonHang.php',
           type: 'post',
           dataType: 'html',
           data: {
            start_date:start_date,
            end_date:end_date,
               quanlydon: "qldanhang"
           }
       }).fail(function() {
           alert("Không thể xem quản lý đơn hàng ");
       }).done(function(data) {
           $('#profile_name').html(data);
       })

     
   }
</script>

</html>