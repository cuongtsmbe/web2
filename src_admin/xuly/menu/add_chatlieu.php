<?php  if(isset($_GET['url'])&&$_GET['url']=="menu_chatlieu"){
     $menu_chatlieu='  <div class="form-group">
     <label for="exampleFormControlSelect1">Chọn mục muốn xóa :</label>
     <select class="form-control" id="chat_lieu" name="del_chat_lieu" >';
        $sql_menu_chatlieu="select * from  menu_item_chatlieu";        
        $sql_menu_chatlieu_query=mysqli_query($con,$sql_menu_chatlieu);
        while($row=mysqli_fetch_object($sql_menu_chatlieu_query)){
        $menu_chatlieu.='<option value="'.$row->value_name.'" >'.$row->name.'</option>';
        }
        $menu_chatlieu.='  </select>
        </div>';
 
    ?>
    <form method="POST">
            <?php echo $menu_chatlieu;?>
            <div class="form-group">
                <label for="exampleFormControlInput1">Thêm Chất Liệu :</label>
                <input type="text" class="form-control" id="chatlieu_sp" placeholder="Tên nhóm..." name="chatlieu_sp" >
             </div>
             <div class="form-group ">
                <input type="submit" class="form-control " name="sb_add_menu_chatlieusp" id="chat_lieu_button" value="Thực hiện" >
            </div>
    </form>
<?php }?>

<?php

    if(isset($_POST['sb_add_menu_chatlieusp'])){
        function Ma_ramdom_ma_chatlieu($length) {//copy in web
            $keys = array_merge(range(0,9), range('a', 'z'));

            $key = "";
            for($i=0; $i < $length; $i++) {
                $key .= $keys[mt_rand(0, count($keys) - 1)];
            }
            return $key;
          }

            do {  
              $ma_chatlieusp=Ma_ramdom_ma_chatlieu(8);
              $sql_random = "SELECT * FROM `menu_item_chatlieu` WHERE `value_name`=\"".$ma_chatlieusp."\"";
              $query_test_random=mysqli_query($con,$sql_random);
            } while(mysqli_num_rows($query_test_random)!==0);
            
            if(empty($_POST['chatlieu_sp'])){
                $sql="DELETE FROM menu_item_chatlieu WHERE value_name=\"".$_POST['del_chat_lieu']."\"; ";
                $result=mysqli_query($con,$sql);
                echo "<script>alert('deleted :".$_POST['del_chat_lieu']." ')</script>";
            }else {
                $sql="INSERT INTO menu_item_chatlieu (value_name,name) VALUES (\"".$ma_chatlieusp."\",\"".$_POST['chatlieu_sp']."\") ";
                $result=mysqli_query($con,$sql);
                  
            }
        echo "<script> setTimeout(()=>{window.location='./index.php?success_add=1'},700);</script>";  
        }   



?>
