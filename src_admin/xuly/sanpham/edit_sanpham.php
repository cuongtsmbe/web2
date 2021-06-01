<?php
    if(!isset($con)){
        require('./../../con_db.php');
    }
    if(isset($_POST['submit_button'])){//thực hiện update file lên server khi nhấn submit
        require('./xuly/update_image_server/update_img_server.php');//vì đang mở file này tại index nên phải require đi từ trang index.php
    }
    // require('./../update_image_server/update_img_server.php');
    if(isset($_GET['edit']) && isset($_GET['id_product_edit'])){//hiển thị đúng thông tin của sản phẩm trong db
        //lần đầu truy vấn là để lấy giá trị cần thiết của sản phẩm lưu vào các biến
        $sql="select * from product,image_sp where product.id=".$_GET['id_product_edit']." and product.id=image_sp.id_product group by product.id";
        $query_sql=mysqli_query($con,$sql);
        while($row=mysqli_fetch_object($query_sql)){
            $type_product=$row->type_product;
            $chatlieu_product=$row->Chat_lieu;
            $size_product=$row->Ngan_dung_laptop;
            $thuong_hieu_pro=$row->Thuong_hieu;
            $color_pro=$row->Color;
        }
        //option của sản phẩm LOẠI sản phẩm
        $text_menu_type='  <div class="form-group">
                                <label for="exampleFormControlSelect1">Loại sản phẩm</label>
                                <select class="form-control" id="type_product" name="type_product">';
        $sql_menu_type="select * from menu_item_nhomsp";        
        $sql_menu_type_query=mysqli_query($con,$sql_menu_type);
        while($row=mysqli_fetch_object($sql_menu_type_query)){
            $select=($type_product===$row->value_name)?"selected":"";
            $text_menu_type.='<option value="'.$row->value_name.'" '.$select.'>'.$row->name.'</option>';
        }
        $text_menu_type.='  </select>
        </div>';
       //kết thức option của LOẠI sản phẩm 

        //option của sản phẩm CHẤT LIỆU sản phẩm
        $text_chatlieu='  <div class="form-group">
                                <label for="exampleFormControlSelect2">Chất liệu</label>
                                <select class="form-control" id="Chat_lieu" name="Chat_lieu">';
        $sql_menu_type="select * from menu_item_chatlieu";        
        $sql_menu_type_query=mysqli_query($con,$sql_menu_type);
        while($row=mysqli_fetch_object($sql_menu_type_query)){
            $select=($chatlieu_product===$row->value_name)?"selected":"";
            $text_chatlieu.='<option value="'.$row->value_name.'" '.$select.'>'.$row->name.'</option>';
        }
        $text_chatlieu.='  </select>
        </div>';
       //kết thức option của CHẤT LIỆU sản phẩm 

        //option của sản phẩm THUONG_HIEU sản phẩm
        $text_thuong_hieu='    <div class="form-group">
                                <label for="exampleFormControlSelect2">Thương hiệu </label>
                                <select  class="form-control" id="thuonghieu" name="thuong_hieu" >';
        $sql_menu_type="select * from menu_item_thuong_hieu";        
        $sql_menu_type_query=mysqli_query($con,$sql_menu_type);
        while($row=mysqli_fetch_object($sql_menu_type_query)){
            $select=($thuong_hieu_pro===$row->value_name)?"selected":"";
            $text_thuong_hieu.='<option value="'.$row->value_name.'" '.$select.'>'.$row->name.'</option>';
        }
        $text_thuong_hieu.='  </select>
        </div>';
       //kết thức option của THUONG_HIEU sản phẩm 

          //option của sản phẩm SIZE sản phẩm
          $text_size_product='     <div class="form-group">
                                        <label for="exampleFormControlSelect2">Size </label>
                                        <select  class="form-control" id="size_sp" name="size_product">';
            $sql_menu_type="select * from menu_item_ngan_laptop";        
            $sql_menu_type_query=mysqli_query($con,$sql_menu_type);
            while($row=mysqli_fetch_object($sql_menu_type_query)){
            $select=($size_product===$row->value_name)?"selected":"";
            $text_size_product.='<option value="'.$row->value_name.'" '.$select.'>'.$row->name.'</option>';
            }
            $text_size_product.='  </select>
            </div>';
        //kết thức option của SIZE sản phẩm 

        //option của sản phẩm COLOR sản phẩm
          $text_color='        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Màu</label>
                                            <select  class="form-control" id="color_sp" name="color_product" >';
            $sql_menu_type="select * from menu_item_color";        
            $sql_menu_type_query=mysqli_query($con,$sql_menu_type);
            while($row=mysqli_fetch_object($sql_menu_type_query)){
            $select=($color_pro===$row->value_name)?"selected":"";
            $text_color.='<option value="'.$row->value_name.'" '.$select.'>'.$row->name.'</option>';
            }
            $text_color.='  </select>
        </div>';
        //kết thức option của COLOR sản phẩm 


        //lấy ảnh của sản phẩm đó
            $sql_image="select * from image_sp where id_product=".$_GET['id_product_edit']."";
            $query_image=mysqli_query($con,$sql_image);
            $text_image_option='<div > 
                                    <label for="exampleFormControlInput1">Chọn ảnh muốn xóa</label>
                                    <select name="image_product[]" id="image_product" multiple>
                            ';
            while($row=mysqli_fetch_object($query_image)){
                $text_image_option.='<option value='.$row->id.'  style="height:100px ; width:100px ; background-image:url(./../update_image/'.$row->link_src.');background-size:cover">'.$row->name.'</option>';
            }
            $text_image_option.='</div></select>';

        //end lấy ảnh sản phẩm 

        $sql="select * from product,image_sp where product.id=".$_GET['id_product_edit']." and product.id=image_sp.id_product group by product.id";
        $query_sql=mysqli_query($con,$sql);
        $text='';
        while($row=mysqli_fetch_object($query_sql)){
        $text.='   <div class="edit_product">
         <form action="" method="POST" enctype="multipart/form-data">
         <div class="form-group">
                <label for="exampleFormControlSelect2">ID</label>
                <select class="form-control" name="id">
                <option value="'.$_GET['id_product_edit'].'">'.$_GET['id_product_edit'].' </option>
                </select>
                </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name__product" placeholder="Nhập tên sản phẩm" name="name_product" value="'.$row->namesp.'">
            </div>
                '.  $text_menu_type.'
                '.$text_chatlieu.'
                '.$text_thuong_hieu.'
                '.$text_size_product.'
                '.$text_color.'
           
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mô tả sản phẩm </label>
                <textarea class="form-control" id="Content_sp" rows="3" placeholder="Nhập mô tả sản phẩm ..." name="details_product" >'.$row->content.'</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Giá sản phẩm</label>
                <input type="number" class="form-control" id="price_sp_edit" placeholder="Giá sản phẩm." name="price_sanpham" value='.$row->price.'>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Sale % sản phẩm</label>
                <input type="number" class="form-control" id="sale" placeholder="% sale sản phẩm." name="sale" value="'.$row->sale.'">
             </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Số lượng sản phẩm trong kho</label>
                <input type="number" class="form-control" id="so_luong" placeholder="Nhập số lượng sản phẩm có trong kho..." name="soluong_product" value="'.$row->so_luong.'">
            </div>
            '. $text_image_option.'
            <div class="form-group">
                <label for="exampleFormControlFile1">Thêm ảnh sản phẩm</label>
                <input type="file" class="form-control-file" id="add_image_product" name="update_file_inf">
            </div>
            <div class="form-group ">
                <input type="submit" class="form-control " name="submit_button" id="submit_but" value="submit_button_val" >
            </div>
            </form>
            </div>';
        }
        echo $text;

    }
    //khi nhấn nút update thì nó sẽ lưu các thông tin đó vào db
    if(isset($_POST['submit_button'])){
       if(!$_POST['price_sanpham'] || !$_POST['name_product'] || !$_POST['type_product'] || !$_POST['Chat_lieu'] || !$_POST['thuong_hieu'] || !$_POST['size_product'] || !$_POST['color_product'] || !$_POST['soluong_product']){
           echo 'Không thể update vì có những thông tin quan trọng bị để trống';
       }else{
        if($_POST['sale']<0){
            echo "<script>alert('sale >=0');</script>";
            exit;
        }
        if(empty($_POST['sale'])){
            $_POST['sale']=0;

        }
        if( empty($_POST['price_sanpham'])||$_POST['price_sanpham']<=0 ){
            echo "<script>alert('chưa nhập giá sản phẩm Or giá nhỏ hơn 0');</script>";
            exit;
        }
        if( empty($_POST['soluong_product'])||$_POST['soluong_product']<0 ){
            echo "<script>alert('chưa nhập số lượng  sản phẩm Or số lượng nhỏ hơn or bằng 0');</script>";
            exit;
        }
           $sql='UPDATE product SET product.namesp="'.$_POST["name_product"].'",product.type_product="'.$_POST["type_product"].'",product.Chat_lieu="'.$_POST["Chat_lieu"].'",product.Thuong_hieu="'.$_POST["thuong_hieu"].'",product.Ngan_dung_laptop="'.$_POST["size_product"].'",product.Color="'.$_POST["color_product"].'",product.price='.$_POST["price_sanpham"].',product.sale='.$_POST["sale"].',product.so_luong='.$_POST['soluong_product'].',product.content="'.$_POST['details_product'].'",product.update_at=current_timestamp() WHERE product.id='.$_POST["id"].'';
            $result=mysqli_query($con,$sql);
            if(!empty($_FILES['update_file_inf']['name'])){//(kiểm tra $FILES) nếu có chọn file thì thì thực hiện lưu tên file lên db
                $sql_insert="INSERT INTO image_sp (id_product,name,link_src,create_at,update_at)
                VALUES (".$_POST['id'].",'Them_image',\"".$_FILES['update_file_inf']['name']."\",current_timestamp(),current_timestamp())";
                $query_sql=mysqli_query($con,$sql_insert);
            }
            if(isset($_POST['image_product'])){//xóa các ảnh được chọn trong option
                $text='';
                for($i=1;$i<count($_POST['image_product']);$i++){
                    $text.=' or id='.(int)$_POST['image_product'][$i].'';
                }
                $sql_delete='DELETE FROM  image_sp WHERE id='.(int)$_POST["image_product"][0].''.$text.'';
                $sql_query=mysqli_query($con, $sql_delete);
            }
            echo "<script> setTimeout(()=>{window.location='http://localhost/Web2/src_admin/index.php?update_success=1'},200);</script>";
        }
    }
  
?>