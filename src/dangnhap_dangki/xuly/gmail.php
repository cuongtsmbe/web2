<?php

use PHPMailer\PHPMailer\PHPMailer;

//use PHPMailer\PHPMailer\Exception;

require '../composer/vendor/phpmailer/phpmailer/src/PHPMailer.php';

require '../composer/vendor/phpmailer/phpmailer/src/Exception.php';

require '../composer/vendor/phpmailer/phpmailer/src/SMTP.php';

require './config.php';

if (!isset($con)) {
  require('./../../../con_db.php');
}
// khi click vào button submit thì sẽ gửi username lên db và lấy thông tin gmail và thực hiện gửi thông tin đăng nhập đến gmail
if (isset($_POST['guimail']) && !empty($_POST['username'])) {
  $sql = "select * from user where user_login='" . $_POST['username'] . "'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) == 0) {
    echo '<div style="width:100% ; height: 100px ; display:flex; justify-content:center; color:green; "><div style="width:400px;height: 100px">Username này chưa được đăng kí  : <a style="cursor: pointer;" href="http://cuahangbalo.com/Web2/src/dangnhap_dangki/dangki.php"><button>Quay lại trang chủ</button></a></div></div>';

    exit;
  }
  while ($row = mysqli_fetch_object($result)) {
    $addAddress_mail = $row->gmail;
    $res_thongtin = $row->password;
  }
}
$mail = new PHPMailer();

$mail->IsSMTP();

$mail->CharSet = "UTF-8";

$mail->Mailer = 'smtp';

// $mail->SMTPDebug = 1;//hiển thị các thông tin khi thực hiện để tiện debug

$mail->SMTPAuth   = TRUE;

$mail->SMTPSecure = 'tls'; //nếu là ssl thì đổi port thành 465

$mail->Port       = 587;

$mail->Host       = 'smtp.gmail.com';

$mail->Username   = $Username_mail; //gmail dùng để gửi đi

$mail->Password   =  $Password_mail; //dùng pw or mã 

$mail->setFrom($Username_mail, $name_mail);

$mail->addAddress($addAddress_mail, 'Bạn');

$mail->isHTML(true); //chuyển chuỗi thành html trong mail

$mail->Subject = 'Thông tin đăng nhập của bạn là: ';

$mail->Body    = $mail_body . '<h3>' . $res_thongtin . '</h3> Hãy đăng nhập và đổi mật khẩu :  <a style="cursor: pointer;" href="http://cuahangbalo.com/Web2/src/index.php?url=dangnhap"><button>continue</button></a>';

if (!$mail->Send()) {

  echo '<div style="width:100% ; height: 100px ; display:flex; justify-content:center; color:green; "><div style="width:400px;height: 100px">Error while sending Email.To again : <a style="cursor: pointer;" href="http://cuahangbalo.com/Web2/src/index.php?url=quenmatkhau"><button>continue</button></a></div></div>';
  // echo '<pre>';
  // var_dump($mail);
  // echo '</pre>';
  echo false;
} else {

  echo '<div style="width:100% ; height: 100px ; display:flex; justify-content:center; color:green; "><div style="width:400px;height: 100px">Email sent successfully .To gmail: <a style="cursor: pointer;" href="https://mail.google.com/mail/u/0/#inbox"><button>continue</button> </a></div>
    <div style="width:400px;height: 100px">Email sent successfully .To cuahangbalo.com: <a style="cursor: pointer;" href="http://cuahangbalo.com/Web2/src/index.php?url=dangnhap"><button>Quay lại</button> </a></div></div>';
}
