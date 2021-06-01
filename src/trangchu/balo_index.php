 <div class="Group_Product">
    <div class="Title_product">
        <div style=hidden></div>
        <h5>balo new</h5> 
        <a href="./index.php?url=balo" class="">Xem tất cả <h8 class="glyphicon glyphicon-menu-right"></h8></a>
    </div>
    <div class="List_product" id="list_product_index">
     
    

    </div>
</div> 
<?php 

        $query_sql= "SELECT product.id,product.type_product,image_sp.link_src,product.price,product.sale,product.namesp FROM product,image_sp WHERE product.id=image_sp.id_product group by product.update_at limit 0,7";
        //group by để nếu 1 sp có nhiều ảnh thì nó chỉ lấy một ảnh thôi
        $result=mysqli_query($con,$query_sql);
        $list="";
        while($row=mysqli_fetch_object($result)){
            $list.='<div class="Item"><a style="text-decoration:none" href="./index.php?url=product_detail&id_product='.$row->id.'"><div class="giam_gia_img"><img src="./../update_image/'.$row->link_src.'"><span class="percent">'.$row->sale.'%</span></div><h5>'.$row->namesp.'</h5><div class="price"><span class="price_new">'.($row->price-$row->price*$row->sale*0.01).' vnd </span>&nbsp<span class="price_old">'.$row->price.' vnd</span></div></a></div>';
        }
        echo "<script>$('#list_product_index').append('".$list."');</script>";

?>