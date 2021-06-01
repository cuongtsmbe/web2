<?php 
if(!isset($con)){
  require("./../../../con_db.php");
}

if(isset($_GET['td']) && $_GET['td']){
    $sxtieude=$_GET['td'];
  }
  
  if(isset($_GET['url']) && $_GET['url']=="sp_banchay"){
    require('./xuly/dkloc/index.php');
    if(isset($sxtieude)){//điều kiện lọc theo tên .. nếu không chọn điều kiện thì nó sẽ mặc định giảm dần theo thời gian
        if($sxtieude=='tang'){
          $sx="ORDER BY product.namesp asc";
        }else if($sxtieude=='giam'){
          $sx="ORDER BY product.namesp desc ";
        }else{
          $sx="ORDER BY tongbandc desc";
        }
      }else{
        $sx="ORDER BY tongbandc desc";
      }
    if(isset($_POST['dateFrom'])&&isset($_POST['dateTo'])){
        //vì kiểu timestamp của create_at nên khi nhập kiểu dateFrom= date_To thì ta sẽ sét cho dk ngày đó ..còn nếu vs dateFrom =là 18thg4 còn dateTo=19thg4 thì <=> dataTo 18thg4 23h59p59s nên vẫn không thể cho ra các sản phẩm 19thg4 5h24p đc
        if($_POST['dateTo']==$_POST['dateFrom']){
           $time_ed= $time_st="YEAR(hoa_don.create_at)='".date('Y',strtotime($dateFrom))."' and MONTH(hoa_don.create_at)='".date('m',strtotime($dateFrom))."' and DAY(hoa_don.create_at)='".date('d',strtotime($dateFrom))."'";
        }else{
                     $time_st="hoa_don.create_at>='".$dateFrom."'";
                    $time_ed="hoa_don.create_at<='".$dateTo."'";
        }
       
        //điều kiện lọc theo loại sản phẩm 
        $filter_type=($_POST['filter_type_product']=='tat_ca')?1:'product.type_product=\''.$_POST['filter_type_product'].'\'';
        $top=empty($_POST['top_spbanchay'])?'1':$_POST['top_spbanchay'];
        $sql="select *,SUM(soluong) as tongbandc,MONTH(hoa_don.create_at) as thang from  cthd ,hoa_don,product,image_sp WHERE image_sp.id_product=product.id and product.id=cthd.id_product and cthd.ma_hoadon=hoa_don.ma_hd and ".$filter_type." and ".$time_st." and ".$time_ed." GROUP BY product.id ".$sx." LIMIT ".$top." 
        " ;
    }else{//nếu kkhoong yêu cầu khoảng thời gian thì cho mặc định
       //top san pham ban chay
        $top=$_POST['top_spbanchay']??'1';
        $sql="select *,SUM(soluong) as tongbandc,MONTH(hoa_don.create_at) as thang from  cthd ,hoa_don,product,image_sp WHERE image_sp.id_product=product.id and product.id=cthd.id_product and cthd.ma_hoadon=hoa_don.ma_hd GROUP BY product.id ".$sx." LIMIT ".$top."
        " ;
    }
    echo "<div><b>Thống kê sản phẩm bán chạy : </b></div>";
   
    $result=mysqli_query($con,$sql);
    $text=' <table id="myTable">
    <tr>
      <td onclick="sortTable(0)" style="width:70px"><b>STT</b></td>
      <td><b>Ảnh</b></td>
      <td onclick="sortTable(2)" style="cursor:pointer;"><b>Tên Sản Phẩm</b></td>
      <td style="width:70px"><b>số lượng</b></td>
      <td style="width:70px"><b>View</b></td>
      <td style="width:70px"><b>bán được</b></td>
    </tr>
 
 ';
  $i=0;
    while($row=mysqli_fetch_object($result)){
      $i++;
          $text.='<tr>
          <td style="width:70px">'.$i.'</td>
          <td><img src="./../update_image/'.$row->link_src.'"></td>
          <td>'.$row->namesp.'</td>
          <td style="width:70px">'.$row->soluong.'</td>
          <td style="width:70px"> '.$row->view.'</td>
          <td style="width:70px"> '.$row->tongbandc.'</td>
        </tr>';

       }
       $text.='</table>';
        echo $text;
}
?>
<script>
  function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable");
    switching = true;
    //Theo hướng tăng
    dir = "asc"; 
    /* Vòng lặp sẽ tiếp tục cho đến lúc không còn switch hoạt động nữa*/
    while (switching) {
      switching = false;
      rows = table.rows;
      /*Lặp mọi dòng ngoại trừ tiêu đề*/
      for (i = 1; i < (rows.length - 1); i++) {
        // Đánh dấu switch
        shouldSwitch = false;
        /* So phần tử hai dòng */
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /* Kiểm tra xem hai dòng nên đổi theo chiều tăng hay giảm*/
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            // Đổi dấu switch và thoát vòng lặp
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            // Đổi dấu switch và thoát vòng lặp
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /*Nếu switch được đổi dấu, thực hiện nó*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        // Mỗi lần hoán đổi sẽ tăng biến lên 1
        switchcount ++;      
      } else {
        /* Néu không có switch nào được thực hiện và đang theo chiều tăng,
        chuyển sang chiều giảm và khởi chạy vòng while lần nữa */
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
</script>