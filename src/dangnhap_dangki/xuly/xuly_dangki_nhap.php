<?php 
    //xử lý thông tin đăng kí username vừa nhập lên database để kiểm tra sau đó trả về kết quả phù hợp
    if(!isset($con)){	
    	require('./../../../con_db.php');
    }
    if(empty($_POST["username"])){
        echo "Cần nhập username.";
        exit;
    }
	if(!preg_match("/^[A-Za-z0-9]{6,15}$/", $_POST['username'], $matchs)){
        echo "Username không hợp lệ (6-15 kí tự gồm chữ,số).";
        exit;
	}
	$username = $_POST['username'];
    $queryusername = "select user_login from user where user_login='".$username."'";
    $result = mysqli_query($con,$queryusername);	
    if(mysqli_num_rows($result)>0){
        echo "Username này đã tồn tại. Xin nhập username khác.";
    }else{
        echo "";
    }
?>