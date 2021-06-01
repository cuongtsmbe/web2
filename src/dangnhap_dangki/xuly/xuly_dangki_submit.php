<?php 
    if(!isset($con)){
        require("./../../../con_db.php");
    }
    // header('Content-Type: text/html; charset=utf-8');
    if(isset($_POST['dangki'])){
        $username=$_POST['Username'];
        $hoten=$_POST['hoten'];
        $password=$_POST['Password'];
        $Repassword=$_POST['Repassword'];
        $number=$_POST['number'];
        $gmail=$_POST['gmail'];
        $Address=$_POST['Address'];
        $sql = "INSERT INTO `user`(`user_login`, `name`, `password`, `sdt`, `gmail`, `avatar_img`, `address`) VALUES (\"".$username."\",\"".$hoten." \",\"".$password."\",\"".$number."\",\"".$gmail."\",\"\",\"".$Address."\")";
        mysqli_query($con,$sql);
        echo "<script>alert('Đăng kí thành công . Hãy đăng nhập để tiếp tục.');</script>";
        sleep(1);
        // header('location: ./index.php?url=dangnhap');
        echo "<script>window.location='./index.php?url=dangnhap';</script>";
        //thực hiện câu lệnh này thì nó sẽ đẩy đến trang yêu cầu
    }else{
        echo "<script>console.log('Chưa click submit');</script>";
    }
?>