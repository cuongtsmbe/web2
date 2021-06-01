<?php 
    require('./../../con_db.php');
     session_start();  

    if(!isset($_SESSION['username']) && !isset($_SESSION['name'])){//nếu chưa đăng nhập thì khi click vào button checkout sẽ trở lại trang đăng nhập
       // echo "<script>console.log('ton tai gia tri')</script>";
       echo "no_username";
       //header('location:http://localhost/Web2/src/dangnhap_dangki/dangnhap.php');
    }else 
    if( isset($_POST['list_product_in_cart']) && json_decode($_POST['list_product_in_cart'])!=[]){//ktra giỏ hàng phải có sản phẩm
       $list_product_in_cart=json_decode($_POST['list_product_in_cart']);
       // create ma_hd_check here $ma_hd_check
        
       function RandomString($length) {//copy in web
            $keys = array_merge(range(0,9), range('a', 'z'));
        
            $key = "";
            for($i=0; $i < $length; $i++) {
                $key .= $keys[mt_rand(0, count($keys) - 1)];
            }
            return $key;
        }
        
        do {  
            $ma_hd_check=RandomString(6);
            echo "bien: ".$ma_hd_check;
            $sql_random = "SELECT * FROM `hd_wait_check` WHERE `ma_HD_check`=\"".$ma_hd_check."\"";
            $query_test_random=mysqli_query($con,$sql_random);
         } while(mysqli_num_rows($query_test_random)!==0);//tìm mã hóa đơn mà chưa có trong csdl ma_hd_check của table hd_wait_check

       //ma_hd_check
            $sql_insert_hd_wait_check = "INSERT INTO `hd_wait_check`(`ma_HD_check`,`ma_kh`) VALUES (\"".$ma_hd_check."\",\"".$_SESSION['username']." \")";
            $query_sql=mysqli_query($con,$sql_insert_hd_wait_check);//vì hd_wait_check có primary_key là ma_HD_check nên cần insert trc cthd_wait_check    
           $Tri_gia=0;
            for($i=0;$i<count($list_product_in_cart);$i++){
                $sql_product_item="SELECT * from product where product.id=".$list_product_in_cart[$i]->id."";
                $query_p=mysqli_query($con,$sql_product_item);
                while($row=mysqli_fetch_object($query_p)){
                    $Tri_gia=$Tri_gia+($list_product_in_cart[$i]->sl*$row->price-$list_product_in_cart[$i]->sl*$row->price*$list_product_in_cart[$i]->sale*0.01);// vì select từ product với kiện bằng với id primary key nên kqua trả về chỉ cho ra một row
                }
                 $sql_insert_cthd_wait = "INSERT INTO `cthd_wait_check`(`ma_HD_check`,`id_product`,`soluong`,`sale`) VALUES (\"".$ma_hd_check."\",".$list_product_in_cart[$i]->id." ,".$list_product_in_cart[$i]->sl.",".$list_product_in_cart[$i]->sale.")";
                 $query_sql=mysqli_query($con,$sql_insert_cthd_wait);//thực hiện truy vấn insert
                 //tăng số lượng vừa bán và giảm số sản phẩm đi
                 $sql_buy_number="UPDATE product SET buy=buy+".$list_product_in_cart[$i]->sl." WHERE id=".$list_product_in_cart[$i]->id."";
                 mysqli_query($con,$sql_buy_number);
            }
        $sql_update_trigia="UPDATE hd_wait_check SET Tri_gia=".$Tri_gia." WHERE ma_HD_check=\"".$ma_hd_check."\"";
        $query_update=mysqli_query($con,$sql_update_trigia);
        $Tri_gia=0; // because $Tri_gia là biến global nên phải xét lại $Tri_gia cho hóa đơn sau
        echo $sql_update_trigia;
    }else{
        echo "<script>alert('You need Add product to cart to continue.')</script>";
    }

?>