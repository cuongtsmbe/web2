<?php  if(isset($_GET['url'])&&$_GET['url']=="menu_thuonghieu"){
     $menu_type='  <div class="form-group">
     <label for="exampleFormControlSelect1">Thương hiệu sẽ bị xóa :</label>
     <select class="form-control" id="thuonghieu" name="thuonghieusp" >';
        $sql_thuonghieu="select * from menu_item_thuong_hieu";        
        $sql_thuonghieu_query=mysqli_query($con,$sql_thuonghieu);
        while($row=mysqli_fetch_object($sql_thuonghieu_query)){
        $menu_type.='<option value="'.$row->value_name.'" >'.$row->name.'</option>';
        }
        $menu_type.='  </select>
        </div>';
      
    ?>
    <form method="POST">
        <?php echo  $menu_type;?>
            <div class="form-group">
                <label for="exampleFormControlInput1">Thêm Thương hiệu  sản phẩm :</label>
                <input type="text" class="form-control" id="thuonghieu_sp" placeholder="Tên nhóm..." name="thuonghieu_sp" >
             </div>
             <div class="form-group ">
                <input type="submit" class="form-control " name="sb_add_menu_thuonghieu" id="sb_add_menu_thuonghieu" value="Thực Hiện " >
            </div>
    </form>
<?php }?>

<?php

    if(isset($_POST['sb_add_menu_thuonghieu'])){
        function Ma_ramdom_ma_thuonghieu($length) {//copy in web
            $keys = array_merge(range(0,9), range('a', 'z'));

            $key = "";
            for($i=0; $i < $length; $i++) {
                $key .= $keys[mt_rand(0, count($keys) - 1)];
            }
            return $key;
          }

            do {  
              $ma_thuonghieu=Ma_ramdom_ma_thuonghieu(8);
              $sql_random = "SELECT * FROM `menu_item_thuong_hieu` WHERE `value_name`=\"".$ma_thuonghieu."\"";
              $query_test_random=mysqli_query($con,$sql_random);
            } while(mysqli_num_rows($query_test_random)!==0);


            if(empty($_POST['thuonghieu_sp'])){
                $sql="DELETE FROM menu_item_thuong_hieu WHERE value_name=\"".$_POST['thuonghieusp']."\"; ";
                $result=mysqli_query($con,$sql);
                echo "<script>alert('deleted :".$_POST['thuonghieusp']." ')</script>";
            }else {
                $sql="INSERT INTO menu_item_thuong_hieu (value_name,name) VALUES (\"".$ma_thuonghieu."\",\"".$_POST['thuonghieu_sp']."\") ";
                $result=mysqli_query($con,$sql);

                echo "<script> setTimeout(()=>{window.location='./index.php?success_add=1'},700);</script>";
            }

          
        }   



?>