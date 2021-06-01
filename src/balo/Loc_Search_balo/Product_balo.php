


<div class="Group_Product" id="Group_Product">
    <div class="Title_product">
        <div style=hidden> </div>
        <h5>SẢN PHẨM BALO</h5> 
        <div></div>
    </div>
    <div class="List_product" id="List_product">
    </div> 
    <div class="XemThem" id="XemThem">
        <a class="XemThem_Product " id="xemthemsp">
            Xem Thêm Sản Phẩm <i class="glyphicon glyphicon-triangle-bottom"></i>
        </a>
    </div>
</div>

<!-- //show product from database -->
<script> 
     
            var startGetSP=0;
            //vị trí bắt đầu lấy giá trị trong bảng product.sql
            var numberValue=8;
            // lấy giới hạn bao nhiêu giá trị
            var loc_sp={
                type_sp:'',
                price:'',
                thuonghieu_sp:'',
                color:'',
                chat_lieu:'',
                ngan_laptop:'',
                name_fiter:''
            };

                   //chạy khi vừa load xong trang
                   $(document).ready(function(){
              
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
                      $('#List_product').html("error connect with server!");
                  }).done(function(data) {
                      startGetSP+=8;    
                      if(data==false){
                          console.log("Khong the tim thay san pham !");
                          $('#Group_Product #XemThem').remove();
                          //delete node child in node parent of jquery same parentNode.removeChild(childNode); in javascript
                      }else{
                          $('#List_product').append(data);
                      }
          });
      });

      //chạy khi click xem thêm sp
            $(document).ready(function(){
                $('#xemthemsp').click(function(){
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
                            $('#List_product').html("error connect with server!");
                        }).done(function(data) {
                            startGetSP+=8;    
                            if(data==false){
                                console.log("Khong the tim thay san pham !");
                                $('#Group_Product #XemThem').remove();
                                //delete node child in node parent of jquery same parentNode.removeChild(childNode); in javascript
                            }else{
                                $('#List_product').append(data);
                            }
                        });
                });
            });
                
                
    </script>
    