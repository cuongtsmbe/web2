<?php 
    session_start();
    require('./../../../con_db.php');
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $queryUsername="select user_login from user where user_login='".$username."'";
        $resultUser=mysqli_query($con,$queryUsername);
        $numUser=mysqli_num_rows($resultUser);

        $queryUserAndPass="select user_login from user where user_login='".$username."' and password = '".$password."'";
        $resultUserAndPass=mysqli_query($con,$queryUserAndPass);
        $numUserAndPass=mysqli_num_rows($resultUserAndPass);

        if($numUser==0){
            echo 0;
            exit;
        }
        if($numUserAndPass){
            $_SESSION['username']=$username;
            $getname="select name from user where user_login='".$username."' and password = '".$password."'";
            $result_get=mysqli_query($con,$getname);
            while($row=mysqli_fetch_array($result_get)){//có thể không dùng while vì câu truy vấn này chỉ chô ra một row
                $_SESSION['name']=$row[0];
            }
            echo 2;
            exit;
        }
        if($numUser && $numUserAndPass == 0){
            echo 1;
            exit;
        }
        //các giá trị 0.1.2 sẽ đc kiểm trả tại .done() của ajax
    }
?>