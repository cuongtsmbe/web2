<?php 
    if(!isset($con)){
        require('./../../../con_db.php');
    }
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_POST['data'])){
       $sql_insert_messenger='INSERT INTO admin_chat (admin_gui,content,create_at,admin_nhan) VALUES (\''.$_SESSION['username_admin'].'\',\''.$_POST['data'].'\',current_timestamp(),\''.$_SESSION['choose_admin'].'\')';
        $query_sql=mysqli_query($con,$sql_insert_messenger);
    }
?>