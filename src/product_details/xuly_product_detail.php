<?php 
    if(!isset($con)){
        require("./../../con_db.php");
    }
    if(isset($_GET['id_product'])){
       $sql="select * ,menu_item_ngan_laptop.name as name_size ,menu_item_thuong_hieu.name as name_thuonghieu,menu_item_chatlieu.name as name_chatlieu from menu_item_chatlieu,product,image_sp,menu_item_ngan_laptop,menu_item_thuong_hieu where menu_item_chatlieu.value_name=product.Chat_lieu and product.id=".$_GET['id_product']." and image_sp.id_product=product.id and menu_item_ngan_laptop.value_name=product.Ngan_dung_laptop and product.Thuong_hieu=menu_item_thuong_hieu.value_name ";
       $result=mysqli_query($con,$sql);
       $i=0;
       while($row=mysqli_fetch_object($result)){
            $i=$i+1;//biến i ở đây để đưa tất cả ảnh của 1 sản phẩm ra để hiển thị ..còn các thông tin về giá hay ... thì nó sẽ giống nhau vì đó la của một sản phẩm
            echo "<script>$('#name_product').html('".$row->namesp."')</script>";
            echo "<script>$('#content_product_cm').html('<b>Description</b>: ".$row->content."')</script>";
            echo "<script>$('#sizes').html('".$row->name_size."')</script>";
            echo "<script>$('#price').html('".$row->price." vnd')</script>";
            echo "<script>$('#thuonghieu').html('".$row->name_thuonghieu."')</script>";
            echo "<script>$('#chatlieu').html('".$row->name_chatlieu."')</script>";
            //thêm thông tin ảnh lớn và ảnh nhỏ của sản phẩm 
            echo "<script>
                    var img = document.createElement('img');
                    img.src = './../update_image/".$row->link_src."';
                    if(".$i.">5){console.log('chỉ lấy ra 5 ảnh để hiển thị.trong khi đó ảnh của sản phẩm này rất nhiều. '); }
                    if(".$i."<=5){
                        var src = document.getElementById('pic-".$i."');
                        src.appendChild(img);

                        var img_target = document.createElement('img');
                        img_target.src = './../update_image/".$row->link_src."';
                        var src_target = document.getElementById('target_pic-".$i."');                   
                        src_target.appendChild(img_target);
                    }
                    </script>";
            
       }
       $i=0;//vì i la biến global nên cần xét lại cho các giá trị sau 
       $sql="UPDATE product SET product.view=product.view+1 WHERE id=".$_GET['id_product']."";
       $sql_query=mysqli_query($con,$sql);

    }


?>