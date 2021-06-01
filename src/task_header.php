<?php   if(!isset($_SESSION)){
        session_start();
      }    ?>

<div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./index.php">T/S fashion</a>
                </div>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <!-- <li ><a href="?url=tuixach">Túi Xách</a></li> -->
                        <li><a href="?url=balo">Balo</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" id="filter_name" onkeyup="Filter_name_Function()" placeholder="Search">
                        </div>
                    
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="?url=dangnhap" id="dangnhap_header"></a></li>
<?php 
    if(isset($_SESSION['username']) && isset($_SESSION['name']) ){
        echo "<script> $('#dangnhap_header').html('".$_SESSION['name']."') </script>";    
    }else{
        echo "<script> $('#dangnhap_header').html('Đăng Nhập') </script>";
    }
?>  
                        <li><a href="./index.php?url=cart">
                            <button id="cart" style="  font-size: 15px;
                                                        margin:0px;
                                                        cursor: pointer;">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                Giỏ Hàng
                            </button>
                            </a>
                        </li>
                        <?php if(isset($_SESSION['username'])){?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="./index.php?url=thongtindangnhap" >Thông tin</a></li>
                                <li><a href="./index.php?url=dangxuat">Đăng Xuất</a></li>
                            </ul>
                        </li>
                       <?php } ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
 


        <script>
            //khi nhập vào ô tìm kiếm thì lập tức cập nhật lại biến global name_fiter và gọi đến server để tìm sản phẩm phù hợp
            function Filter_name_Function(){
                var value_name=document.getElementById('filter_name').value;
                loc_sp.name_fiter=value_name;
                startGetSP=0;
                $.ajax({
                            url: './XemThemSp.php',
                            type: 'POST',
                            dataType: 'html',
                            data: {
                                start: startGetSP,
                                numberValue:numberValue,
                                loc_sp:loc_sp
                            }
                        }).fail(function(err){
                            $('#List_product').html("error ajax 404 with server!");
                        }).done(function(data) {
                            startGetSP+=3;    
                            if(data==false){
                                $('#List_product').html("Khong the tim thay san pham !")
                                //delete node child in node parent of jquery same parentNode.removeChild(childNode); in javascript
                            }else{
                                $('#List_product').html(data);
                            }
                        });
            }

      
        </script>
