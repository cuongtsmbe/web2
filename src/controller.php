<?php 
    if(!isset($con)){
        require("./../con_db.php");
    }
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_GET["url"])&&$_GET["url"]=="balo"){
        require("./balo/balo.php");
        exit;
    }
    if(!isset($_SESSION['username']) && !isset($_SESSION['name']) && isset($_GET["url"]) && $_GET["url"]=="dangnhap"){
        require("./dangnhap_dangki/dangnhap.php");
        exit;
    }
    if(!isset($_SESSION['username']) && !isset($_SESSION['name']) && isset($_GET["url"])&&$_GET["url"]=="dangki"){
        require("./dangnhap_dangki/dangki.php");
        exit;
    }
    if(isset($_GET["url"])&&$_GET["url"]=="quenmatkhau"){
        require("./dangnhap_dangki/laymatkhau.php");
        exit;
    }
    if(isset($_SESSION['username']) && isset($_SESSION['name'])&& isset($_GET["url"])&&$_GET["url"]=="dangxuat"){
        require("./Profile/DangXuat/UnsetSession.php");
        exit;
    }
    if(isset($_GET["url"])&&$_GET["url"]=="cart"){
        require("./cart/index_cart.php");
        exit;
    }
    if(isset($_GET["url"])&&$_GET["url"]=="product_detail"){
        require("./product_details/product_details.php");
        exit;
    }
    if(isset($_SESSION['username']) && isset($_SESSION['name'])&& isset($_GET["url"])&&$_GET["url"]=="thongtindangnhap"){
        require("./Profile/ThongTin/ThongTinCaNhan.php");
        exit;
    }
    require("./Task_header.php");
    require("./trangchu/slide_index.php");
    require("./trangchu/balo_index.php");
    require("./trangchu/bestSale_index.php");    
?>