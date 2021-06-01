<?php //chọn người mà mình muốn hiện tất cả tin nhắn mình nhắn với họ s
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_POST['choose_admin'])){
        $_SESSION['choose_admin']=$_POST['choose_admin'];//lưu người mà mình muốn xem tin nhắn 
    }
?>