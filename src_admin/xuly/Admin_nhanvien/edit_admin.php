<?php
    if(!isset($con)){
        require('./../../../con_db.php');
    }
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_GET['sua_admin'])){
       
        $sql="select * from admin where admin.username=\"".$_GET['sua_admin']."\"";
        $sql_query=mysqli_query($con,$sql);
        while($row=mysqli_fetch_object($sql_query)){
        $text='';
        $text=' 
            <form method="POST" active="">
            <label for="exampleFormControlTextarea1"><h2>Sửa admin </h2></label>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Username</label>
                        <select  class="form-control" id="username_edit" name="username_edit" >
                            <option value="'.$_GET['sua_admin'].'">'.$_GET['sua_admin'].'</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" id="name_edit" placeholder="Tên admin..." name="name_edit" value="'.$row->name.'">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="text" class="form-control" id="password" placeholder="Nhập mật khẩu admin..." name="password_edit" value="'.$row->password.'">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Phone</label>
                        <input type="number" class="form-control" id="Phone" placeholder="Nhập phone admin..." name="Phone_edit" value="'.$row->phone.'">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Gmail</label>
                        <input type="text" class="form-control" id="gmail_edit" placeholder="Nhập gmail..." name="gmail_edit" value="'.$row->gmail.'">
                    </div>
                    <div class="form-group ">
                        <input type="submit" class="form-control " name="Save_edit_admin" id="submit_but" value="Save" >
                    </div>
             </form>';
            echo $text;
        }
    }
?>
<?php 
    if(isset($_POST['username_edit']) && isset($_POST['name_edit']) && isset($_POST['password_edit']) && isset($_POST['Phone_edit']) && isset($_POST['gmail_edit']) && isset($_POST['Save_edit_admin'])){
        if(empty($_POST['username_edit']) || empty($_POST['name_edit']) || empty($_POST['password_edit']) || empty($_POST['Phone_edit']) || empty($_POST['gmail_edit']) || empty($_POST['Save_edit_admin'])){
            echo '<script>alert("Nhập đầy đủ thông tin");</script>';
            exit;
        }
        if($_SESSION['username_admin']===$_POST['username_edit']){
            echo '<script>alert("Không thể thay đổi thông tin của Admin đang đăng nhập");</script>';
            exit;
        }
        $sql='UPDATE admin SET name=\''.$_POST['name_edit'].'\',phone=\''.$_POST['Phone_edit'].'\',gmail=\''.$_POST['gmail_edit'].'\',password=\''.$_POST['password_edit'].'\', update_at=current_timestamp() where username=\''.$_POST['username_edit'].'\'';
        $result=mysqli_query($con,$sql);
        echo "<script>alert('Đã update thành công .');</script>";
        echo "<script>window.location='./index.php?Admin_Nhanvien=1';</script>";
    }
?>