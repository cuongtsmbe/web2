<?php 
if(!isset($con)){
  require("./../../../con_db.php");
}
  if(isset($_GET['chi_tiet_hd'])){
    echo "<div><b>Chi Tiết Hóa Đơn</b></div>";
    $sql="select ct.soluong,ct.sale,product.namesp,image_sp.link_src,product.price from  cthd as ct,product,image_sp where ct.ma_hoadon=".$_GET['chi_tiet_hd']." and ct.id_product=product.id and product.id=image_sp.id_product group by product.id";
    $result=mysqli_query($con,$sql);
    $text='   <table>
    <tr>
      <td style="width:70px"><b>STT</b></td>
      <td><b>Ảnh</b></td>
      <td><b>Tên Sản Phẩm</b></td>
      <td><b>Giá gốc</b></td>
      <td style="width:70px"><b>số lượng</b></td>
      <td style="width:70px"><b>sale</b></td>
    </tr>
 
 ';
  $i=0;
    while($row=mysqli_fetch_object($result)){
      $i++;
          $text.='<tr>
          <td style="width:70px">'.$i.'</td>
          <td><img src="./../update_image/'.$row->link_src.'"></td>
          <td>'.$row->namesp.'</td>
          <td>'.$row->price.' <b>vnd</b></td>
          <td style="width:70px">'.$row->soluong.'</td>
          <td style="width:70px"> '.$row->sale.'</td>
        </tr>';
       }
       $text.='</table>';
        echo $text;
  }
?>  