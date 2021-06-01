<?php
    if(!isset($con)){
        require('./../../con_db.php');
    }
    if(isset($_POST['submit_button_add_product'])){//thực hiện update file lên server khi nhấn submit
        require('./xuly/update_image_server/update_img_server.php');//vì đang mở file này tại index nên phải require đi từ trang index.php
        }
    // require('./../update_image_server/update_img_server.php');//chỉ dùng khi chạy trên browser với chỉ trang này
    if(isset($_GET['add_product'])){

 
        //option của sản phẩm LOẠI sản phẩm
        $text_menu_type='  <div class="form-group">
                                <label for="exampleFormControlSelect1">Loại sản phẩm</label>
                                <select class="form-control" id="add_type_product" name="type_product">';
        $sql_menu_type="select * from menu_item_nhomsp";        
        $sql_menu_type_query=mysqli_query($con,$sql_menu_type);
        while($row=mysqli_fetch_object($sql_menu_type_query)){
            $text_menu_type.='<option value="'.$row->value_name.'" >'.$row->name.'</option>';
        }
        $text_menu_type.='  </select>
        </div>';
       //kết thức option của LOẠI sản phẩm 

        //option của sản phẩm CHẤT LIỆU sản phẩm
        $text_chatlieu='  <div class="form-group">
                                <label for="exampleFormControlSelect2">Chất liệu</label>
                                <select class="form-control" id="add_Chat_lieu" name="Chat_lieu">';
        $sql_menu_type="select * from menu_item_chatlieu";        
        $sql_menu_type_query=mysqli_query($con,$sql_menu_type);
        while($row=mysqli_fetch_object($sql_menu_type_query)){    
            $text_chatlieu.='<option value="'.$row->value_name.'">'.$row->name.'</option>';
        }
        $text_chatlieu.='  </select>
        </div>';
       //kết thức option của CHẤT LIỆU sản phẩm 

        //option của sản phẩm THUONG_HIEU sản phẩm
        $text_thuong_hieu='    <div class="form-group">
                                <label for="exampleFormControlSelect2">Thương hiệu </label>
                                <select  class="form-control" id="add_thuonghieu" name="thuong_hieu" >';
        $sql_menu_type="select * from menu_item_thuong_hieu";        
        $sql_menu_type_query=mysqli_query($con,$sql_menu_type);
        while($row=mysqli_fetch_object($sql_menu_type_query)){           
            $text_thuong_hieu.='<option value="'.$row->value_name.'" >'.$row->name.'</option>';
        }
        $text_thuong_hieu.='  </select>
        </div>';
       //kết thức option của THUONG_HIEU sản phẩm 

          //option của sản phẩm SIZE sản phẩm
          $text_size_product='     <div class="form-group">
                                        <label for="exampleFormControlSelect2">Size </label>
                                        <select  class="form-control" id="add_size_sp" name="size_product">';
            $sql_menu_type="select * from menu_item_ngan_laptop";        
            $sql_menu_type_query=mysqli_query($con,$sql_menu_type);
            while($row=mysqli_fetch_object($sql_menu_type_query)){
            $text_size_product.='<option value="'.$row->value_name.'">'.$row->name.'</option>';
            }
            $text_size_product.='  </select>
            </div>';
        //kết thức option của SIZE sản phẩm 

        //option của sản phẩm COLOR sản phẩm
          $text_color='        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Màu</label>
                                            <select  class="form-control" id="add_color_sp" name="color_product" >';
            $sql_menu_type="select * from menu_item_color";        
            $sql_menu_type_query=mysqli_query($con,$sql_menu_type);
            while($row=mysqli_fetch_object($sql_menu_type_query)){
            $text_color.='<option value="'.$row->value_name.'" >'.$row->name.'</option>';
            }
            $text_color.='</select></div>';
        //kết thức option của COLOR sản phẩm 
        
       //option của sản phẩm NCC sản phẩm
            $text_NCC='        <div class="form-group">
                <label for="exampleFormControlSelect2">Nhà Cung Cấp</label>
                <select  class="form-control" id="NCC" name="NCC" >';
                $sql_menu_type="select * from  supplieres";        
                $sql_menu_type_query=mysqli_query($con,$sql_menu_type);
                while($row=mysqli_fetch_object($sql_menu_type_query)){
                $text_NCC.='<option value="'.$row->id.'" >'.$row->name.'</option>';
                }
                $text_NCC.='</select></div>';
        //kết thức option của NCC sản phẩm 
        
        $text='';
       
        $text.='   <div class="add_product">
         <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleFormControlInput1">Tên sản phẩm</label>
                <input type="text" class="form-control" id="add_name__product" placeholder="Nhập tên sản phẩm" name="name_product" value="">
            </div>
                '.  $text_menu_type.'
                '.$text_chatlieu.'
                '.$text_thuong_hieu.'
                '.$text_size_product.'
                '.$text_color.'
                '.$text_NCC.'
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mô tả sản phẩm </label>
                <textarea class="form-control" id="add_Content_sp" rows="3" placeholder="Nhập mô tả sản phẩm ..." name="details_product" ></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Giá sản phẩm</label>
                <input type="number" class="form-control" id="add_price_sp_edit" placeholder="Giá sản phẩm." name="price_sanpham" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Sale % sản phẩm</label>
                <input type="number" class="form-control" id="add_sale" placeholder="% sale sản phẩm." name="sale" >
             </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Số lượng sản phẩm trong kho</label>
                <input type="number" class="form-control" id="add_so_luong" placeholder="Nhập số lượng sản phẩm có trong kho..." name="soluong_product">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Thêm ảnh sản phẩm</label>
                <input type="file" class="form-control-file" id="add_add_image_product" name="update_file_inf">
            </div>
            <div class="form-group ">
                <input type="submit" class="form-control " name="submit_button_add_product" id="submit_button_add_product" value="Thêm sản phẩm " >
            </div>
            </form>
            </div>';
        
        echo $text;

    }
    //khi nhấn nút update thì nó sẽ lưu các thông tin đó vào db
    if(isset($_POST['submit_button_add_product'])){
        if($_POST['sale']<0){
            echo "<script>alert('sale >=0');</script>";
            exit;
        }
        if(empty($_POST['sale'])){
            $_POST['sale']=0;

        }
        if(empty($_POST['name_product']) ){
            echo "<script>alert('chưa nhập tên sản phẩm');</script>";
            exit;
        }
        if( empty($_POST['NCC']) ){
            echo "<script>alert('Chọn Nhà Cung Cấp sản phẩm');</script>";
            exit;
        }
        if( empty($_POST['price_sanpham'])||$_POST['price_sanpham']<=0 ){
            echo "<script>alert('chưa nhập giá sản phẩm Or giá nhỏ hơn 0');</script>";
            exit;
        }
        if( empty($_POST['soluong_product'])||$_POST['soluong_product']<0 ){
            echo "<script>alert('chưa nhập số lượng  sản phẩm Or số lượng nhỏ hơn or bằng 0');</script>";
            exit;
        }
        if( empty($_FILES['update_file_inf']['name']) ){
            echo "<script>alert('chưa chọn ảnh cho sản phẩm');</script>";
            exit;
        }

        $sql="INSERT INTO product (supplier_id,namesp,type_product,Chat_lieu,Thuong_hieu,Ngan_dung_laptop,Color,price,so_luong,buy,view,sale,content,create_at,update_at)  VALUES  (".$_POST['NCC'].",\"".$_POST['name_product']."\",\"".$_POST['type_product']."\",\"".$_POST['Chat_lieu']."\",\"".$_POST['thuong_hieu']."\",\"".$_POST['size_product']."\",\"".$_POST['color_product']."\",".$_POST['price_sanpham'].",".$_POST['soluong_product'].",0,0,".$_POST['sale'].",\"".$_POST['details_product']."\",current_timestamp(),current_timestamp())";
        $query_sq=mysqli_query($con,$sql);
        //lấy id sản phẩm vừa mới insert vào để update ảnh
        $id_pro='';
        $sql="select product.id from product order by id desc limit 1";
        $query_id=mysqli_query($con,$sql);

        while($row=mysqli_fetch_object($query_id)){
            $id_pro=$row->id;//lấy id cuối hàng cuối cùng của bảng product
        }
                 //update ảnh cho sản phẩm cần thêm
        $sql_update_img="INSERT INTO image_sp (id_product,name,link_src,create_at,update_at) 
        VALUES (".(int)($id_pro).",'anh them ',\"".$_FILES['update_file_inf']['name']."\",current_timestamp(),current_timestamp())";
        $query_img=mysqli_query($con,$sql_update_img);

        echo "<script> setTimeout(()=>{window.location='./index.php?success_add=1'},700);</script>";
   }

?>