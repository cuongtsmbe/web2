<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Web 2</title>
		<link rel="stylesheet" href="./../css/bootstrap.min.css"> 
        <link rel="stylesheet" href="./../css/product_details/product_details.css"> 
        <script src="./../js/jquery.js"></script><!--luôn ở trên bootstrap -->
		<!-- <script src="./../js/bootstrap.min.js"></script> -->
	</head>
<body>
<?php require("./task_header.php");?>

<div class="container"> 
 <div class="card"> 
  <div class="container-fliud"> 
   <div class="wrapper row"> 
    <div class="preview col-md-6"> 
     <div class="preview-pic tab-content"> 

        <div class="tab-pane active" id="pic-1">
        </div> 

        <div class="tab-pane" id="pic-2">
        </div> 

        <div class="tab-pane" id="pic-3">
        </div> 

        <div class="tab-pane" id="pic-4">
        </div> 

        <div class="tab-pane" id="pic-5">
        </div> 

     </div> 
     <ul class="preview-thumbnail nav nav-tabs">

      <li class="active"><a data-target="#pic-1" data-toggle="tab" id="target_pic-1"></a>
      </li> 

      <li><a data-target="#pic-2" data-toggle="tab" id="target_pic-2"></a>
      </li> 

      <li><a data-target="#pic-3" data-toggle="tab" id="target_pic-3"></a>
      </li> 

      <li><a data-target="#pic-4" data-toggle="tab" id="target_pic-4"></a>
      </li> 

      <li><a data-target="#pic-5" data-toggle="tab" id="target_pic-5"></a>
      </li> 

     </ul> 

    </div> 
    <div class="details col-md-6"> 

     <h4 class="product-title" id="name_product"></h4> 
     <h5><b>Giá bán:</b><pan id="price"></span></h5> 
     <h5 ><b>Kích cỡ:</b> <span id="sizes"></span>
     </h5> 
     <h5 ><b>Thương Hiệu: </b><span id="thuonghieu"></span>
     </h5> 
     <h5 ><b>Chất Liệu :</b> <span id="chatlieu"></span>
     </h5> 
     <p class="product-description" id="content_product_cm"></p> 
      <button class="add-to-cart btn btn-default" type="button" onclick="addcart()">THÊM VÀO GiỎ</button>      
       
     </div> 
    </div> 
   </div> 
  </div> 
 </div>

<script>
    function addcart(){

        if (typeof(Storage) !== "undefined") {
            var id_pro="<?php echo isset($_GET['id_product']) ? $_GET['id_product'] : '' ; ?>";
            
            if(!localStorage.getItem("list_product_in_cart")){
                localStorage.setItem("list_product_in_cart", "[]");              
            }
            var array_cart_product=JSON.parse(localStorage.getItem("list_product_in_cart"));
            for(var i = 0; i<array_cart_product.length ; i++){
                if(array_cart_product[i].id==parseInt(id_pro)){
                    alert("Sản Phẩm đã có trong giỏ hàng .");//nếu đã có trong giỏ hàng thì không thêm vào nữa
                    return;
                }
            }
            var sale="<?php if(!isset($con)){
                             require('./../../con_db.php');
                            }  
            
                                $sql='select sale from product where id='.$_GET['id_product'].'' ;
                                $result=mysqli_query($con,$sql);
                                while($row=mysqli_fetch_object($result)){
                                    echo $row->sale;
                                }
                            ?>";
            array_cart_product.push({id:parseInt(id_pro),sl:1,sale:parseInt(sale)});//thêm id sản phẩm lên localStorage
            localStorage.setItem("list_product_in_cart",JSON.stringify(array_cart_product));
            alert("Thêm sản phẩm thành công ");
            
        } else {
            console.log("Sorry, your browser does not support Web Storage...");
        }
    }
</script>
<?php require("./product_details/xuly_product_detail.php");?>
<?php 

if(isset($_POST['binhluan_submit'])){
    $sql="INSERT INTO comment (user, binhluan, product_id)
    VALUES (\"".$_POST['user']."\", \"".$_POST['binhluan']."\",".$_POST['id_product'].");";
    $result=mysqli_query($con,$sql);
}
?>
<?php if(isset($_SESSION['username'])){?>
<div class="binhluan">
        <div class="row">
            <div class="col-md-8">
                <h5>Ý kiến sản phẩm</h5>
            <form action="" method="POST">
                <input type="hidden" value="<?php echo $_GET['id_product']; ?>" name="id_product">
                <p><input type="hidden" value="<?php echo $_SESSION['username']??'' ?>" name="user"></p>
                <p><textarea rows="5" style="resize: none" placeholder="Bình luận......" class="form-control" name="binhluan"></textarea></p>
                <p><input type="submit" name="binhluan_submit" class="btn btn-success" value="Gửi bình luận"></p>
            </form>
            </div>
    
         
        </div>
</div>
<?php }?>

<div style="padding-left:250px"><p>   <h3>Ý kiến mới nhất</h3></p></div>
    <div class="main_bl">
        <?php  
        $sql="SELECT * FROM comment WHERE product_id=".$_GET['id_product']." order by create_at desc LIMIT 150";
        $result=mysqli_query($con,$sql);
        
        while($row=mysqli_fetch_object($result)){

    ?>

        <div class="chat_bl" >
                
                        <h5><b>     <?php echo $row->user;?><h6><?php echo $row->create_at;?></h6></b></h5>
                        <div class="bluanv"><?php echo $row->binhluan??'' ?></div> 
               
        </div>

    <?php }
       
    ?>
     <div class="chat_bl" >
            <?php  if(mysqli_num_rows($result)==0){
                        echo "không có bình luận nào";
                    }
            ?>
     </div>

    </div>
</div>
</div>
<style>
.binhluan{
    margin-top: 3px;
    padding-top: 5em;
    padding-left: 8em;
    padding-bottom: 1em;
    line-height: 1.5em;
}
.chat_bl{
    margin-top: 3px;
    padding-top: 10px;
    padding-left:150px;
    line-height: 1.5em;
    margin-bottom:50px;
}
.bluanv{
    box-shadow: 0 1px 2px #777;
    width: 480px;
    margin-left:120px;
    height:50px;
    overflow-y:scroll;
}
.main_bl{
        width:900px;
        height:500px;
        overflow-y:scroll;
        margin-bottom:10px;
}

</style>

</body>
</html>
