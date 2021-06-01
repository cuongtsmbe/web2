<?php 
    require('./../con_db.php');
    if(isset($_POST['start'])&&isset($_POST['numberValue'])){
        $startGetValue=$_POST['start'];
        $numberValue=$_POST['numberValue'];
        if(isset($_POST['loc_sp'])){
             $loc_sp=$_POST['loc_sp'];
            //  $type_sp= $loc_sp['type_sp'];        
             if(!isset($loc_sp['type_sp']) || $loc_sp['type_sp']===''){
                 $query_loc_type=1;
             }else{
                $query_loc_type="product.type_product='".$loc_sp['type_sp']."'";
             }
                            //nếu không có điều kiện lọc là loại sp thì mặc định loại where .... and 1-> là $query_loc_type
                            //  echo "<script>console.log('string : '+".$type_sp.")</script>";
            if(!isset($loc_sp['chat_lieu']) || $loc_sp['chat_lieu']===''){
                $query_chat_lieu=1;
            }else{
               $query_chat_lieu="product.Chat_lieu='".$loc_sp['chat_lieu']."'";
            }
            if(!isset($loc_sp['color']) || $loc_sp['color']===''){
                $query_color=1;
            }else{
               $query_color="product.Color='".$loc_sp['color']."'";
            }
            if(!isset($loc_sp['ngan_laptop']) || $loc_sp['ngan_laptop']===''){
                $query_ngan_laptop=1;
            }else{
               $query_ngan_laptop="product.Ngan_dung_laptop='".$loc_sp['ngan_laptop']."'";
            }
            if(!isset($loc_sp['name_fiter']) || $loc_sp['name_fiter']===''){
                $query_name_fiter=1;
            }else{
                $query_name_fiter="product.namesp like '%".$loc_sp['name_fiter']."%'";
            }
            if(!isset($loc_sp['price']) || $loc_sp['price']==''){
                $query_price=1;
            }else{
                $arrayGia=explode("-",$loc_sp['price']);//giống với hàm split string trong javascript bởi vì trong table sql khoảng giá đc viết 0-500000 nếu là trên 2 triệu sẽ đc viết là 2000000-1
                $query_start="product.price >= ".$arrayGia[0];
                if($arrayGia[1]==1){
                    $query_end=" and 1";//VD nếu trên 2000000 thì chỉ cần xét điều kiện là price>2000000 là  đc còn phía sau end sẽ cho đk là 1
                }else{
                    $query_end=" and product.price <= ".$arrayGia[1];
                }
               $query_price=$query_start.$query_end;//nối 2 điều kiện lại với nhau
            }
            if(!isset($loc_sp['thuonghieu_sp']) || $loc_sp['thuonghieu_sp']===''){
                $query_thuonghieu_sp=1;
            }else{
               $query_thuonghieu_sp="product.Thuong_hieu='".$loc_sp['thuonghieu_sp']."'";
            }
       
        }else{
            $query_loc_type=1;
            $query_chat_lieu=1;
            $query_color=1;
            $query_ngan_laptop=1;
            $query_price=1;
            $query_thuonghieu_sp=1;
            $query_name_fiter=1;
        } 
        $query_sql= "SELECT product.id,product.type_product,image_sp.link_src,product.price,product.sale,product.namesp FROM product,image_sp WHERE product.id=image_sp.id_product and ".$query_loc_type ." and ".$query_chat_lieu." and ".$query_color." and ".$query_ngan_laptop." and ".$query_price." and ".$query_thuonghieu_sp." and ". $query_name_fiter." group by product.id limit ".$startGetValue.",".$numberValue." ";
        //group by để nếu 1 sp có nhiều ảnh thì nó chỉ lấy một ảnh thôi
       $result=mysqli_query($con,$query_sql);
        //   echo '<script> console.log("'.$query_sql.'")</script>';
        // exit;
        if(!$result){
            echo "không có sản phẩm nào!";
            exit;
        }
        if(mysqli_num_rows($result)==0){
            exit;
        }
        $ValueRequest='';
        while($row=mysqli_fetch_object($result)){
            $newPrice=$row->price-$row->price*$row->sale/100;
           $ValueRequest.='<div class="Item" >
           <a style="text-decoration: none"  href="./index.php?url=product_detail&id_product='.$row->id.'" >
           <div class="giam_gia_img">
               <img src="./../update_image/'.$row->link_src.'">
               <span class="percent">'.$row->sale.'%</span>
           </div>
           <h5>'.$row->namesp.'</h5>
           <div class="price">
               <span class="price_new">'.$newPrice.' vnd</span>&nbsp
               <span class="price_old">'.$row->price.' vnd</span>
           </div>
      </a> </div>';

        }
        echo $ValueRequest;
   }else{
       echo "<script> console.log('Không thể Tìm thấy giá trị Post trong file này !!!')</script>";
   }
?>