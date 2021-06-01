<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cart product</title>
		<link rel="stylesheet" href="./../css/bootstrap.min.css"> 
        <link rel="stylesheet" href="./../css/cart/cart.css"> 
        <script src="./../js/jquery.js"></script>
		<script src="./../js/bootstrap.min.js"></script>

	</head>


	<body>
     <div class="group" id="group_list_dathang">   
        <div class="container">
        <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted" id="number_item"></div>
                    </div>
                </div>
                <div id="list_cart">
                    
                </div>
              <div class="back-to-shop"> <a href="<?php echo $_SERVER['HTTP_REFERER'];?>">&leftarrow;<span class="text-muted"> Back to shop</span></a></div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;" id="item_number_product"></div>
                    <div class="col text-right" id="sum_price"></div>
                </div>
                <form>
                    <p>SHIPPING</p> <select>
                        <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                    </select>
                    <p>GIVE CODE</p> <input id="code" placeholder="Enter your code">
                </form>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="col text-right" id="sum_price_sale"></div>
                </div> <button class="btn" onclick="checkout()">CHECKOUT </button>
            </div>
        </div>
        </div>
    </div>
</div>
<script>
    //cứ mỗi lần tăng giảm số lượng hay xóa thì nó sẽ tác động lến localStore sau đó request lên serser trả về số lượng sản phẩm cho trang client
    function increment(id){
        var list_product_in_cart=JSON.parse(localStorage.getItem("list_product_in_cart"));
        list_product_in_cart[id].sl++;
        localStorage.setItem("list_product_in_cart",JSON.stringify(list_product_in_cart));
            ajaxGiohang();
    }
    function decrement(id){
        if(document.getElementById("input_"+id+"").value>1){
            var list_product_in_cart=JSON.parse(localStorage.getItem("list_product_in_cart"));
                list_product_in_cart[id].sl--;
                localStorage.setItem("list_product_in_cart",JSON.stringify(list_product_in_cart));
        }
        ajaxGiohang();
    }
    function delete_cart(id){
        var list_product_in_cart=JSON.parse(localStorage.getItem("list_product_in_cart"));
        for(var i=id;i<list_product_in_cart.length;i++){
            list_product_in_cart[i]=list_product_in_cart[i+1];
        }
        list_product_in_cart.length--;
        localStorage.setItem("list_product_in_cart",JSON.stringify(list_product_in_cart));
        ajaxGiohang();
    }
    (function (){
        ajaxGiohang();
    })()
    function ajaxGiohang(){
        if(!localStorage.getItem('list_product_in_cart')){
            $('#list_cart').html("cart don't have anything.");
            return ;
        }
        var list_product_in_cart=localStorage.getItem('list_product_in_cart');
        $.ajax({
            url:"./cart/xuly_cart.php",
            type:"POST",
            data:{
                list_product_in_cart:list_product_in_cart
            },
            dataType:'html'
        }).fail(function(){
            console.log("không thể request to xaly_cart.php.");
        }).done(function (data){
            var length_list=JSON.parse(localStorage.getItem("list_product_in_cart")).length + ' items';
            $('#item_number_product').html(length_list);
            $('#number_item').html(length_list);
            $('#list_cart').html(data);
            var length_tag_price=document.getElementsByClassName('price_span').length;// đếm xem có bao nhiêu thẻ có classname là price_span : cx nhưng có bao nhiêu sản phẩm vậy 
            var sum=0;//dc tính bằng các đến giá các thẻ span price của từng sản phẩm sau đó cộng lại 
            for(var i=0;i<length_tag_price;i++){
                sum+=parseInt(document.getElementsByClassName('price_span')[i].textContent);//lấy giá các sản phẩm ra và tổng lại               
            }
            $('#sum_price').html(sum.toString()+' vnd');            
            $('#sum_price_sale').html(sum.toString()+' vnd');
        });
    }

    function checkout(){
        var list_product_in_cart=localStorage.getItem('list_product_in_cart');
        $.ajax({
            url:"./product_details/xuly_checkout.php",
            type:"post",
            data:{
                list_product_in_cart:list_product_in_cart
            },
            dataType:"html",

        }).fail(function(){
            console.log("connect check out fail.");
        }).done(function (data){
            if(data=="no_username"){
                window.location="./index.php?url=dangnhap";
            }else{
            $('#group_list_dathang').html("<div class='phan_hoi'>Thanks you .Bạn đã đặt hàng thành công . Đang đợi nhân viên kiểm tra lại<a href='./index.php'> <button >Tiếp Tục Đặt Hàng.</button> </a></div>");
               localStorage.removeItem("list_product_in_cart");}
        });
    }
</script>

</body>
</html>