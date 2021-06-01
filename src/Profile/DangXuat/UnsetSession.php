<?php 
    session_start();//má ngồi tìm 1 tiếng đồng hồ thì ra là do mày   2:30h 
    if(isset($_SESSION['username']) && isset($_SESSION['name'])){
        unset($_SESSION["username"]);
        unset($_SESSION["name"]);
    }
    if(isset($_SESSION['avatar'])){
        unset($_SESSION['avatar']);
    }
    sleep(1);
    header('location:./index.php');
?>