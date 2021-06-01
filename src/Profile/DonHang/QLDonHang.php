<?php 
    require('./../../../con_db.php');
    session_start();
    $text='';
    $sum=0;
    if(isset($_SESSION['username']) && isset($_POST['quanlydon'])){
        $start_date="1970-01-01";
        $end_date="2030-01-01";
        if(isset($_POST['start_date'])&& !empty($_POST['start_date'])){
            $start_date=$_POST['start_date'];
        }
        if(isset($_POST['end_date']) && !empty($_POST['end_date'])){
            $end_date=$_POST['end_date'];
        }
      
       //thực ra nếu thực hiện đc tại đây thì username và quanlydon đã tồn tại nên có thể xóa. nhưng nếu để vậy thì dễ quản lý hơn  
       $text.=' <div class="group_sp_check"><table>
       <tr id="title_donhang"><th colspan="4">Chưa xử lý</th> </tr>

        <tr>
          
                <label>Start: </label>
                <input type="date" name="date_start_sp_duyet" id="date_start_sp_duyet" value='.(!empty($_POST['start_date'])?$_POST['start_date']:'').'  >
                <label>End: </label>
                <input type="date" name="date_end_sp_duyet" id="date_end_sp_duyet" value='.(!empty($_POST['end_date'])?$_POST['end_date']:'').'>
                <input type="button" value="Search" onclick="quanlydon_sp_date()" >
           
        </tr>

      
            <tr>
            <td>Ảnh</td>
            <td class="name_product_sp">Tên sản phẩm </td>
            <td>Số Lượng </td>
            <td>Giá </td>
            <td>Ngày mua</td>

        </tr>';
        $start_date="STR_TO_DATE('".$start_date."','%Y-%m-%D %h,%i,%s')";
        $end_date="STR_TO_DATE('".$end_date."','%Y-%m-%D %h,%i,%s')";


        $img_price_namesp= "select image_sp.link_src,product.id,product.namesp,product.price from image_sp,product where image_sp.id_product=product.id group by product.id";
        // $id_sp_soluong_Tri_gia_ngay_1= "select hd_wait_check.create_at,cthd_wait_check.id_product,cthd_wait_check.soluong from hd_wait_check,cthd_wait_check where hd_wait_check.ma_kh='".$_SESSION['username']."' and hd_wait_check.ma_HD_check=cthd_wait_check.ma_HD_check ";
        $sql_con_hd_wait_check="select hd_wait_check.create_at,hd_wait_check.ma_kh,hd_wait_check.ma_HD_check from hd_wait_check where  hd_wait_check.ma_kh='".$_SESSION['username']."' and hd_wait_check.create_at BETWEEN ${start_date} and ${end_date} ";
        $id_sp_soluong_Tri_gia_ngay="select hd_wait_check.create_at,cthd_wait_check.id_product,cthd_wait_check.soluong,cthd_wait_check.sale from (".$sql_con_hd_wait_check.") as hd_wait_check ,cthd_wait_check where hd_wait_check.ma_HD_check=cthd_wait_check.ma_HD_check";
       //hai câu truy vấn $id_sp_soluong_Tri_gia_ngay  $sql_con_hd_wait_check sẽ cho kqua như với câu truy vấn $id_sp_soluong_Tri_gia_ngay_1  
        $sql='select * from ('.$img_price_namesp.') as T1 , ('.$id_sp_soluong_Tri_gia_ngay.') as T2 where T1.id=T2.id_product ORDER BY T2.create_at DESC';
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_object($result)){
            $text.='<tr>
                <td><img src="./../update_image/'.$row->link_src.'"></img></td>
                <td class="name_product_sp">'.$row->namesp.'</td>
                <td>'.$row->soluong.'</td>
                <td>'.($row->price*$row->soluong-$row->price*$row->soluong*$row->sale*0.01).'</td>
                <td>'.$row->create_at.'</td>
            </tr>';
            $sum=$sum+$row->price*$row->soluong-$row->price*$row->soluong*$row->sale*0.01;
        }
        
       $text.='</table><span class="sum_donhang">Tổng Tiền :'.$sum.' vnd</span></div>';
        echo $text;

        //các đơn đã được duyệt
        $sum=0;
        $duyet='';
        $duyet.=' <div class="group_sp_check"><table>
        <tr id="title_donhang"><th colspan="4">SP đã duyệt: </th> </tr><tr>
             <td>Ảnh</td>
             <td class="name_product_sp">Tên sản phẩm </td>
             <td>Số Lượng </td>
             <td>Giá </td>
             <td>Ngày mua</td>
 
         </tr>';
         $img_price_namesp= "select image_sp.link_src,product.id,product.namesp,product.price from image_sp,product where image_sp.id_product=product.id group by product.id";
         $sql_con_hd="select hoa_don.create_at,hoa_don.user_login,hoa_don.ma_hd from hoa_don where  hoa_don.user_login='".$_SESSION['username']."' and hoa_don.create_at BETWEEN ${start_date} and ${end_date}  ";
         $id_sp_soluong_Tri_gia_ngay="select hoa_don.create_at,cthd.id_product,cthd.soluong,cthd.sale from (".$sql_con_hd.") as hoa_don ,cthd where hoa_don.ma_hd=cthd.ma_hoadon";
         $sql='select * from ('.$img_price_namesp.') as T1 , ('.$id_sp_soluong_Tri_gia_ngay.') as T2 where T1.id=T2.id_product ORDER BY T2.create_at DESC';
         $result=mysqli_query($con,$sql);
         while($row=mysqli_fetch_object($result)){
             $duyet.='<tr>
                 <td><img src="./../update_image/'.$row->link_src.'"></img></td>
                 <td class="name_product_sp">'.$row->namesp.'</td>
                 <td>'.$row->soluong.'</td>
                 <td>'.($row->price*$row->soluong-$row->price*$row->soluong*$row->sale*0.01).'</td>
                 <td>'.$row->create_at.'</td>
             </tr>';
             $sum=$sum+$row->price*$row->soluong-$row->price*$row->soluong*$row->sale*0.01;
         }
         
        $duyet.='</table><span class="sum_donhang">Tổng Tiền :'.$sum.' vnd</span></div>';
         echo $duyet;
    }

    session_write_close();

?>