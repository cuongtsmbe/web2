<?php 
        if(!isset($con)){
            require('./../../../con_db.php');
        }
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_GET['phanquyen_admin'])){
            echo '<label for="exampleFormControlTextarea1"><h2> Admin: '.$_GET['phanquyen_admin'].' </h2></label>';
            $sql_quyen="select * from admin_privilege where username_admin=\"".$_GET['phanquyen_admin']."\"";
            $result_quyen_admin=mysqli_query($con,$sql_quyen);
            $quyen = [];// lưu lại quyền của admin này để kiểm tra checked các check box
            $i=0;
            while($row_quyen=mysqli_fetch_object($result_quyen_admin)){
                 $quyen[$i]=$row_quyen->privilege_id;
                $i++;
            }
            for($i=0;$i<count($quyen);$i++){
                $quyen[$i]=(int) $quyen[$i];
            }
            sort($quyen);
            $sql="select group_privilege.id as id_group,group_privilege.name as name_group from group_privilege order by group_privilege.id asc";
            $result=mysqli_query($con,$sql);
            $text=' <form action="" method="POST">';
            while($row=mysqli_fetch_object($result)){
                $text.='</br><label > <h3>'.$row->name_group.'</h3></label></br>';
                //cứ mối nhóm quyền thì hiển thị từng quyền
                $sql_quyen="select privilege.id as id_privilege,privilege.name as name_privilege from privilege where privilege.group_privilege_id=".$row->id_group."";
                $result_quyen=mysqli_query($con,$sql_quyen);
                while($row_quyen=mysqli_fetch_object($result_quyen)){
                    $text.='<input type="checkbox" name="phanquyen[]" '.(in_array($row_quyen->id_privilege,$quyen)?"checked":"") .' value="'.$row_quyen->id_privilege.'">
                    <label> '.$row_quyen->name_privilege.'</label> &ensp; &ensp; &ensp;';
                }
            }
            $text.='  </br><input type="submit" name="save_quyen" value="Save" style="margin-top:50px;padding:10px 40px ">
            </form>';
            echo $text;
            
        }
        if(isset($_POST['phanquyen'])){
            if(!isset($_GET['phanquyen_admin']) || empty($_GET['phanquyen_admin']) || $_SESSION['username_admin']===$_GET['phanquyen_admin']){
                echo "<script>alert('Không thể phân quyền cho admin này !.');</script>";
                exit;
            }
                //nếu admin không tồn tại (tự nhập admin vào trên thanh địa chỉ)
            $sql="select * from admin where username=\"".$_GET['phanquyen_admin']."\"";
            $query=mysqli_query($con,$sql);
            if(mysqli_num_rows($query)==0){
                echo "<script>alert('Admin này không tồn tại !.');</script>";
                exit;
            }
                //xóa quyền cũ đi để cập nhật quyền mới vào
            $sql_del_pri_old="DELETE FROM admin_privilege WHERE username_admin=\"".$_GET['phanquyen_admin']."\"";
            $sql_query=mysqli_query($con,$sql_del_pri_old);
            //insert quyền mới vào
                $sql_insert_quyen='INSERT INTO admin_privilege (username_admin,privilege_id,update_at) VALUES  ';
            for($i=0;$i<count($_POST['phanquyen']);$i++){
                $sql_insert_quyen.='(\''.$_GET['phanquyen_admin'].'\','.$_POST['phanquyen'][$i].',current_timestamp())';
                if($i<count($_POST['phanquyen'])-1){
                    $sql_insert_quyen.=',';
                }
            };
            $result=mysqli_query($con,$sql_insert_quyen);
            
            echo "<script>alert('Đã cập nhật quyền cho admin: ".$_GET["phanquyen_admin"]."');</script>";
            echo "<script> window.location='./index.php?Admin_Nhanvien=1' ;</script>"; 
        }
       
    ?>