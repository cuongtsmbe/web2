<!-- <script>
$(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
  });
</script> -->
<div class="Title_product" style="margin-top:10px;">
	<div style=hidden></div>
	<h5>best sale..</h5>
	<div></div>
</div>
<section class="slider">

	<ul id="autoWidth" class="cs-hidden" style="width:100%">
		

	</ul>
</section>

<?php 

        $query_sql= "SELECT product.id,product.type_product,image_sp.link_src,product.price,product.sale,product.namesp,product.buy FROM product,image_sp WHERE product.id=image_sp.id_product group by product.id ORDER BY product.buy desc limit 0,8";
        //group by để nếu 1 sp có nhiều ảnh thì nó chỉ lấy một ảnh thôi
        $result=mysqli_query($con,$query_sql);
        $list="";
        while($row=mysqli_fetch_object($result)){
            $list.='<li class="item-a"><div class="box"><div class="slide-img"><img alt="1" src="./../update_image/'.$row->link_src.'"><div class="overlay"><a href="./index.php?url=product_detail&id_product='.$row->id.'" class="buy-btn">Xem</a></div></div><div class="detail-box"><div class="type"><a href="#">'.$row->namesp.'</a><span>'.$row->type_product.'</span></div><a href="#" class="price">'.($row->price-$row->price*$row->sale*0.01).'</a></div></div></li>';
        }
        echo "<script>$('#autoWidth').append('".$list."');</script>";

?>

<div class="Title_product" style="margin-top:10px;">
	<div style=hidden></div>
	<h5>best view...</h5>
	<div></div>
</div>
<section class="slider">

	<ul id="autoWidthaa" class="cs-hidden" style="width:100%">
		

	</ul>
</section>
<?php 

        $query_sql= "SELECT product.id,product.type_product,image_sp.link_src,product.price,product.sale,product.namesp,product.buy FROM product,image_sp WHERE product.id=image_sp.id_product group by product.id ORDER BY product.view desc limit 0,8";
        //group by để nếu 1 sp có nhiều ảnh thì nó chỉ lấy một ảnh thôi
        $result=mysqli_query($con,$query_sql);
        $list="";
        while($row=mysqli_fetch_object($result)){
            $list.='<li class="item-a"><div class="box"><div class="slide-img"><img alt="1" src="./../update_image/'.$row->link_src.'"><div class="overlay"><a href="./index.php?url=product_detail&id_product='.$row->id.'" class="buy-btn">Xem</a></div></div><div class="detail-box"><div class="type"><a href="#">'.$row->namesp.'</a><span>'.$row->type_product.'</span></div><a href="#" class="price">'.($row->price-$row->price*$row->sale*0.01).'</a></div></div></li>';
        }
        echo "<script>$('#autoWidthaa').append('".$list."');</script>";

?>


