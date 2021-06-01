<!-- <form method="POST" enctype="multipart/form-data">
<input type="file" name="update_file_inf" id="update_file">
<input type="submit" name="submit_button" id="update_file_submit">
</form> -->
<?php 
    //nếu file chưa có trong hệ thống thì tiến hành update lên
    if(!isset($con)){
        require('./../../../con_db.php');//nếu chỉ chạy file này thì cần ktra $con
    }
    
    if(isset($_POST['submit_button']) || isset($_POST['submit_button_add_product'])){        
        $error=array();
        $targetDir='./../update_image/';
        //link sẽ update sau khi file thõa mãn các yêu cầu
        $target_file=$targetDir.basename($_FILES["update_file_inf"]["name"]);//lấy tên file với name là update_file_inf
        //1.kiểm tra kích thước
        //2.kiểm tra loại file(txt,jpg,...)
        //3.kiểm tra sự tồn tại của file trong hệ thống hay chưa

        //1.
        if($_FILES["update_file_inf"]["size"]>7340032){//kiểm tra kích thước file phải nhỏ hơn 7mb thì mới cho thực hiện tiếp
            $error['update_file_inf']="Chỉ cho phép update file dưới 7mb";
          
        }
       // 2.
        $file_type=pathinfo($_FILES["update_file_inf"]["name"], PATHINFO_EXTENSION);
        $file_allow=array('png','jpg','jpeg','gif');
        if(!empty( $file_type) && !in_array(strtolower($file_type), $file_allow)){
            $error['update_file_inf']="Chỉ cho phép update load ảnh lên ";
        }
       //3.
        if(file_exists( $target_file) && !empty($_FILES["update_file_inf"]["name"])){
             $error['thongbao']="Đã lấy file(image) có sẵn trong hệ thống.Nếu không muốn lấy file có sẵn trong hệ thống thì hãy đổi tên file và update load lại.";//nếu ở đây không báo lỗi thì khi update lên file cũ sẽ bị ghi đè lên
        }

        if(empty($error)){
           if(move_uploaded_file($_FILES['update_file_inf']['tmp_name'], $target_file)){//khi update thành công sẽ trả về giá trị là 1
            //    echo "Đã update ảnh lên server";
           }else{
               echo "Không có image nào được thêm cho sản phẩm ";
           }
        }else{
            
            if(!empty($error['update_file_inf'])){//nếu file không thõa mãn yêu cầu thì không update lên server hay update lại sản phẩm
                echo $error['update_file_inf'];
                exit; //vì file này được require đến trang index.php nên khi exit ở đây thì tất cả dòng code phía dưới sẽ không hoạt động
            }else{
                echo "<script>alert('".$error['thongbao']."');</script>";
                //hiển thị thông báo và tiếp tục thực hiện update trong file edit_sanpham.php
            }
           
        }

    }
?>