
<?php 
    require("./../../con_db.php");
    if(isset($_POST['list_product_in_cart'])){
        $list_product_in_cart=json_decode($_POST['list_product_in_cart']);//json_decode cover data string type array to array or ...
       for($i=0;$i<count($list_product_in_cart);$i++){
            $sql = "select product.namesp,product.Chat_lieu,product.price,image_sp.link_src,product.sale from  product,image_sp where image_sp.id_product = product.id and product.id=".$list_product_in_cart[$i]->id." group by product.id";
            $query=mysqli_query($con,$sql);
            while($row=mysqli_fetch_object($query)){//nó chỉ chạy 1 lần vì chỉ có một sản phẩm sau khi thực hiện truy vấn 
                $list='  <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="./../update_image/'.$row->link_src.'"></div>
                    <div class="col">
                        <div class="row text-muted">'.$row->namesp.'</div>
                        <div class="row">'.$row->Chat_lieu.'</div>
                    </div>
                    <div class="col"><button class="number_buy" onclick="decrement('.$i.')">-</button><input type="number" value='.$list_product_in_cart[$i]->sl.' class="number_input" id="input_'.$i.'"><button class="number_buy" onclick="increment('.$i.')">+</button> </div>
                    <div class="col"><span class="price_span">'.(($row->price*$list_product_in_cart[$i]->sl)-($row->price*$list_product_in_cart[$i]->sl*0.01*($row->sale))).'<span> vnd <span class="close" onclick="delete_cart('.$i.')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                  </svg></span></div>
                </div>
            </div>';
            echo $list;
            } 
         }
    }

?>