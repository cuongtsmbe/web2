<?php
    if(!isset($con)){
        require('./../../../con_db.php');
    }
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_GET['add_admin'])){

        $text='';
        $text=' 
        <label for="exampleFormControlTextarea1"><h2>Thêm admin </h2></label>
            <form method="POST" active="">
            
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Username</label>
                        <input type="text" class="form-control" id="username_add" name="username_add"   placeholder="example: abch@def  Trên 6 kí tự " value="" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" id="name_add" placeholder="Tên admin..." name="name_add" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="text" class="form-control" id="password" placeholder="example: Treen 5 kí tự cho phép kí tự đặc biệt là @.()" name="password_add" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Phone</label>
                        <input type="number" class="form-control" id="Phone" placeholder="example:0123456789 or 012345678  (9 or 10 số)"  name="Phone_add" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Gmail</label>
                        <input type="text" class="form-control" id="gmail_add" placeholder="example: abced@gmail.com" name="gmail_add" value="">
                    </div>
                    <div class="form-group ">
                        <input type="submit" class="form-control " name="Save_add_admin" id="submit_add" value="Save" >
                    </div>
             </form>';
            echo $text;
        
    }
?>
<?php 
    if(isset($_POST['username_add']) && isset($_POST['name_add']) && isset($_POST['password_add']) && isset($_POST['Phone_add']) && isset($_POST['gmail_add']) && isset($_POST['Save_add_admin'])){
        if(empty($_POST['username_add']) || empty($_POST['name_add']) || empty($_POST['password_add']) || empty($_POST['Phone_add']) || empty($_POST['gmail_add']) || empty($_POST['Save_add_admin'])){
            echo '<script>alert("Nhập đầy đủ thông tin");</script>';
            exit;
        }
         $username_add_condition="/^[a-zA-Z]{3}[a-zA-Z\d\@]{3,}/";//(Trên 6 kí tự )3  kí tự đầu phải là chữ còn lại cho phép @ và số->.. là cho phép kí tự đặc biệt không có dấu ' "
        //$name_add_condition="/^[a-z0-9A-Z\s]{3,}/";//nhập tên không dấu
        $password_add_condition="/^[\da-zA-Z\s\.\@\(\)]{5,}/"; // Treen 5 kí tự cho phép kí tự đặc biệt là @.() 
        $Phone_add_condition="/^[0][1-9]{8,9}/";//vd 0123456789
        $gmail_add_condition="/^[A-Za-z\d]+[\@][a-zA-Z]+[\.]+[a-zA-Z]+/";//vd abced@gmail.com

        if(!preg_match($username_add_condition,$_POST['username_add'])){
        echo '<script>alert("username không đúng mẫu.(Trên 6 kí tự )3  kí tự đầu phải là chữ còn lại cho phép @ và số");</script>';
        exit;
        }
        if(!preg_match($password_add_condition,$_POST['password_add'])){
            echo '<script>alert("password không đúng mẫu.Treen 5 kí tự cho phép kí tự đặc biệt là @.() ");</script>';
            exit;
            }
        if(!preg_match($Phone_add_condition,$_POST['Phone_add'])){
            echo '<script>alert("phone không đúng.bắt đầu số 0 và có 9-10 số ");</script>';
            exit;
        }
        if(!preg_match($gmail_add_condition,$_POST['gmail_add'])){
            echo '<script>alert("mail không đúng. vd abced@gmail.com");</script>';
            exit;
        }
        $sql="select admin.username from admin where username=\"".$_POST['username_add']."\"";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)!==0){
            echo '<script>alert("Username exist.");</script>';
            exit;
        }
        $sql="INSERT INTO admin (username,name,phone,gmail,password,create_at,update_at) VALUES (\"".$_POST['username_add']."\",\"".$_POST['name_add']."\",\"".$_POST['Phone_add']."\",\"".$_POST['gmail_add']."\",\"".$_POST['password_add']."\",current_timestamp(),current_timestamp()) ";
        $result=mysqli_query($con,$sql);
        echo "<script>alert('Đã thêm thành công .');</script>";
        echo "<script>window.location='./index.php?Admin_Nhanvien=1';</script>";
    }
?>