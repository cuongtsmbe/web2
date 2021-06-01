<?php    
      if(!isset($con)){ 
        require('./../con_db.php');
      }
      if(in_array(8, $quyen__adminlogin)){
        require('./xuly/sanpham/show_sanpham.php');
      }
      if(in_array(6, $quyen__adminlogin)){
        require('./xuly/sanpham/edit_sanpham.php');
      }
      if(in_array(5, $quyen__adminlogin)){
        require('./xuly/sanpham/them_sanpham.php');
      }
      if(in_array(2, $quyen__adminlogin)){
        require('./xuly/check_DonHang/checkDon.php');
        require('./xuly/check_DonHang/chi_tiet_sp.php');
      }
      if(in_array(14, $quyen__adminlogin)){
        require('./xuly/sp_banchay/index.php');
      }
      if(in_array(16, $quyen__adminlogin)){
        require('./xuly/menu/add_nhomsp.php');
        require('./xuly/menu/add_chatlieu.php');
        require('./xuly/menu/add_size.php');
        require('./xuly/menu/add_thuonghieu.php');
        require('./xuly/menu/add_price.php');
      }
      if(in_array(14, $quyen__adminlogin)){
        require('./xuly/Don/don.php');
        require('./xuly/Don/chi_tiet_hd.php');
      }
      if(in_array(1, $quyen__adminlogin)){
        require('./xuly/User/User.php');
      }
      if(in_array(9, $quyen__adminlogin)){
        require('./xuly/Admin_nhanvien/show_admin.php');
      }
      if(in_array(10, $quyen__adminlogin)){
        require('./xuly/Admin_nhanvien/edit_admin.php');
      }

      if(in_array(11, $quyen__adminlogin)){
        require('./xuly/Admin_nhanvien/add_admin.php');
      }

      if(in_array(13, $quyen__adminlogin)){
        require('./xuly/Admin_nhanvien/phan_quyen.php');
      }
      if(in_array(15, $quyen__adminlogin)){
        require('./xuly/supplier/supplier.php');
        require('./xuly/supplier/add_supplier.php');
      }
      // if(isset($_GET['Update_img_server'])){
      //   require('./xuly/update_image_server/update_img_server.php'); //vì đây dùng require nên file ảnh nếu muốn update dc bằng soure code thì update_image phải nằm tương ứng $targetDir
      // }
      if(isset($_GET['update_success'])){
        echo "<div classname='success_up'>Update Thành Công.</div>";
      }
      if(isset($_GET['success_add'])){
        echo "<div classname='success_up'>Thực hiện Thành Công.</div>";
      }
  ?>