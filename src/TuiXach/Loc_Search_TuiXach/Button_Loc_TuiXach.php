<link rel="stylesheet" href="./../../css/Product/Button_Loc_balo.css"> 


<div class="group_button_dk_loc">
			<div class="btn-group">
				<h5>Lọc sản phẩm : </h5>
			</div>
</div>

<?php 	//code hiển thị menu  

		// lấy danh sách các menu từ database   
		// trong đó table menu_group sẽ dùng lệnh để lấy thong tin các table có meu_item%
		//  query dùng cho table menu_group : SELECT ...
											// FROM INFORMATION_SCHEMA.TABLES
											// WHERE TABLE_TYPE = ...
		//
			require('./../../con_db.php');
			$query="select * from menu_group";
			$result= mysqli_query($con,$query);
			if(!$result){
				echo "<script> console.log('query den menu_group error xem lai trong file tao menu')</script>";
				exit;
			}
		
			while($row=mysqli_fetch_array($result)){
				$query_list_item_loc="select * from ".$row[0]." where 1";//vào các bảng thuonghieu,chatlieu.. lấy giá trị item và trả về trong các dropdown
				$items=mysqli_query($con,$query_list_item_loc);
				if(!$items){
					echo "<script> console.log('khong co list item trong table : ".$row[0]."')</script>";
					break;
				}else{
					$li_item='';//bien nối danh sách các thẻ li item trong 1 menu 
				}
				while($item=mysqli_fetch_array($items)){
					//  echo "<script> console.log('".$row[0]." : ".$item[1]."')</script>";
					if($row[0]==='menu_item_color'){//nếu dang xét tại menu color thì đổi thẻ li có background-color
						$li_item .='<li id="'.$item[0].'"><a style="background-color: '.$item[0].'" onclick="item_menu_event('."'".$item[0]."',"."'".$row[0]."'".')")>'.$item[1].'</a></li>';
					}else{
						$li_item .='<li id="'.$item[0].'"><a onclick="item_menu_event('."'".$item[0]."',"."'".$row[0]."'".')">'.$item[1].'</a></li>';
					}
				}
				// echo "<script> console.log('list table menu_group : ".$row[0]."')</script>";
				$text ="<div class='btn-group'>
						<button class='btn btn-default btn-sm dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							".$row[1]." <span class='caret'></span>
						</button>
						<ul class='dropdown-menu' id='".$row[0]."'> 
							".$li_item."
						</ul>	
						</div>";
				echo `<script> $('#group_loc_menu').append("`.$text.`");</script>` ;	
			}
		?>

<script>//event of menu item (điều kiện lọc)
	function item_menu_event(value_item,dk_loc){//value_item vs balo_hoc_sinh  .... dk_loc table: menu_item_nhomsp
		//them color khi click vào item trên menu 
		if(document.getElementById(value_item).style.background=="gray"){
			document.getElementById(value_item).style.background="none";
		}else{
			for(var i=0;i<document.getElementById(dk_loc).getElementsByTagName('li').length;i++){
				document.getElementById(dk_loc).getElementsByTagName('li')[i].style.background="none";
			}
			document.getElementById(value_item).style.background="gray";
		}
		//xét lại giá trị của biến global loc_sp
		if(dk_loc==='menu_item_chatlieu'){
			if(loc_sp.chat_lieu===value_item){
				loc_sp.chat_lieu='';
			}else{
				loc_sp.chat_lieu=value_item;
			}
		}
		if(dk_loc==='menu_item_color'){
			if(loc_sp.color===value_item){
				loc_sp.color='';
			}else{
				loc_sp.color=value_item;
			}
		}
		if(dk_loc==='menu_item_ngan_laptop'){
			if(loc_sp.ngan_laptop===value_item){
				loc_sp.ngan_laptop='';
			}else{
				loc_sp.ngan_laptop=value_item;
			}
		}
		if(dk_loc==='menu_item_nhomsp'){
			if(loc_sp.type_sp===value_item){
				loc_sp.type_sp='';
			}else{
				loc_sp.type_sp=value_item;
			}
		}
		if(dk_loc==='menu_item_price'){
			if(loc_sp.price===value_item){
				loc_sp.price='';
			}else{
				loc_sp.price=value_item;
			}
		}
		if(dk_loc==='menu_item_thuong_hieu'){
			if(loc_sp.thuonghieu_sp===value_item){
				loc_sp.thuonghieu_sp='';
			}else{
				loc_sp.thuonghieu_sp=value_item;
			}
		}
	}
</script>


<script>//ajax gửi thông tin lọc đén trang XemThemSp.php và lấy danh sách sản phẩm thỏa mãn đk về
			 $(document).ready(function(){
			 	$('li a').click(function(){
					startGetSP=0;
					//console.log(loc_sp);
					// if(!document.getElementById('XemThem')){
					// 	var xemthem_div= `<div class='XemThem' id='XemThem'>
					// 						<a class='XemThem_Product ' id='xemthemsp'>
					// 							Xem Thêm Sản Phẩm <i class='glyphicon glyphicon-triangle-bottom'></i>
					// 						</a>
					// 					</div>`;
					// 	$('#Group_Product').append(xemthem_div); // khong bắt đc sự kiện thi thêm vào lại DOM
					// }
						$.ajax({
							url:'./../XemThemSp.php',
							type:'post',
							dataType:'html',
							data: {
							start:startGetSP,
							numberValue:numberValue,
							loc_sp:loc_sp
							}
						}).fail(function(){
							alert('gui ajax that bai');
						}).done(function(data){
							startGetSP+=3;
							$('#List_product').html(data);
						})
					});
			 	});	

</script>

	
