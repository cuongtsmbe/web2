
	<body> 
<div class="dangnhap_admin">
    <div class="title_login"> <label for="exampleFormControlTextarea1">Đăng Nhập Admin</label></div>
    <div class="dn_body">
      
        <form method="POST" active="">
            <input type="text" placeholder="Username admin.." name="username_admin" id="username_admin">
            <input type="password" placeholder="Password.." name="password_admin" id="password_admin"> 
            <input type="submit" id="submit_dn" name="submit_dn" value="Đăng nhập">
        </form>
       
    </div>
</div>
 <?php 
    if(!isset($con)){
        require('./../con_db.php');//xuất phát từ file này
    }  
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_POST['username_admin']) && isset($_POST['password_admin'])){
        if(empty($_POST['username_admin']) || empty($_POST['password_admin']) ){
            echo "<script>alert('Chưa điền thông tin');</script>";
            exit;
        }
        $sql="select * from admin where username=\"".$_POST['username_admin']."\" and password=\"".$_POST['password_admin']."\" and blocked=0";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==0){
            echo "<script>alert('Thông tin đăng nhập không chính xác.');</script>";
            exit;
        }
        $_SESSION['username_admin']=$_POST['username_admin'];
         header('location:./index.php?dn_suc=1');
    }
    session_write_close();
 ?>
</body>

