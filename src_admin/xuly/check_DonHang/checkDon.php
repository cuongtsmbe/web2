
<?php 
if(!isset($con)){
  require('./../../../con_db.php');//không có dòng này thì chương trình sẽ bị crack do request vì cái này dùng ajax nên phải có đường dẫn riêng từ file này(checkDon.php) đến con_db
}
    if(isset($_GET['duyet_don'])){
        $sql="select *,user.address from hd_wait_check ,user where user.user_login=hd_wait_check.ma_kh order by hd_wait_check.create_at desc ;";
        $query_sql=mysqli_query($con,$sql);
        $text='   <table>
        <tr>
          <td style="width:70px"><b>STT</b></td>
          <td><b>Username_KH</b></td>
          <td><b>Tổng Tiền </b></td>
          <td><b>Ngày Tạo</b></td>
          <td><b>Địa Chỉ</b></td>
          <td style="width:150px"><b>Xem chi Tiết </b></td>
          <td style="width:150px"><b>Duyệt đơn</b></td>
          <td style="width:150px"><b>Delete</b></td>
        </tr>
     
     ';
        $i=0;
       while($row=mysqli_fetch_object($query_sql)){
           $i++;

          $text.='<tr>
          <td style="width:70px">'.$i.'</td>
          <td>'.$row->ma_kh.'</td>
          <td>'.$row->Tri_gia.' <b>vnd</b></td>
          <td>'.$row->create_at.'</td>
          <td>'.$row->address.'</td>
          <td style="width:70px"> <a href="./index.php?chitietsp_ma=\''.$row->ma_HD_check.'\' "><button>Xem chi tiết</button></a></td>
          <td style="width:70px"> <button onclick="check_don(\''.$row->ma_HD_check.'\')">Duyệt đơn</button></td>
          <td style="width:70px"> <button onclick="Delete_don(\''.$row->ma_HD_check.'\')">Delete</button></td>
        </tr>';
       }
       $text.='</table>';
        echo $text;
     }
?>
<?php 
      
      if(!isset($_SESSION)){
        session_start();
      }
      if(isset($_POST['delete_ma'])){
        $sql= "DELETE FROM hd_wait_check WHERE ma_HD_check=\"".$_POST['delete_ma']."\"; ";
        mysqli_query($con,$sql);
        header("Location:?url=duyet_don&duyet_don=1");
      }
      if(isset($_POST['ma_duyet_don'])){
          function Ma_ramdom_hoadon($length) {//copy in web
            $keys = array_merge(range(0,9), range('a', 'z'));

            $key = "";
            for($i=0; $i < $length; $i++) {
                $key .= $keys[mt_rand(0, count($keys) - 1)];
            }
            return $key;
          }

            do {  
              $ma_hd=Ma_ramdom_hoadon(6);
              $sql_random = "SELECT * FROM `hoa_don` WHERE `ma_hd`=\"".$ma_hd."\"";
              $query_test_random=mysqli_query($con,$sql_random);
            } while(mysqli_num_rows($query_test_random)!==0);

               //insert từ hoa don đợi check vào hóa đơn 
            $sql="INSERT INTO hoa_don (ma_hd,user_login,ma_nhanvien,create_at,tongtien)
                  SELECT \"". $ma_hd."\",hd_wait_check.ma_kh,\"".$_SESSION['username_admin']."\",current_timestamp(),hd_wait_check.Tri_gia FROM hd_wait_check WHERE hd_wait_check.ma_HD_check=\"".$_POST['ma_duyet_don']."\"
            ";
            $result=mysqli_query($con,$sql);

              //chuyển thông tin  cthd_wait_check vào cthd
            $sql="INSERT INTO cthd (ma_hoadon,id_product,soluong,sale)
                  SELECT \"". $ma_hd."\",cthd_wait_check.id_product,cthd_wait_check.soluong,cthd_wait_check.sale FROM cthd_wait_check WHERE cthd_wait_check.ma_HD_check=\"".$_POST['ma_duyet_don']."\"
            ";
            $result=mysqli_query($con,$sql);
            //xóa hóa đơn đã duyệt tại hd_wait_check và cthd_wait_check
            $sql="DELETE FROM hd_wait_check WHERE ma_HD_check=\"".$_POST['ma_duyet_don']."\"";
            $result=mysqli_query($con,$sql);
        }

?>
  <script>//khi dùng ajax thì data của ajax sẽ bao gồm code trong script này
    function check_don(ma_hd_check){
      $.ajax({
        url:'./xuly/check_DonHang/checkDon.php',
        type:"POST",
        dataTyle:'html',
        data:{
          ma_duyet_don:ma_hd_check
        }
      }).fail(function(){
        alert('Duyệt đơn không thành công ');
      }).done(function(data){
         alert("Đơn đã được xử lý.");
         window.location="./index.php?duyet_don=1";
      })
    }

    function Delete_don(ma) {
    var text = ' <div class="alert_delete"><div class="title_tb"><label for="exampleFormControlTextarea1">Bạn có muốn xóa đơn này không ? </label></div><div class="button_dele"><button onclick="exit_don_xoa()">Không</button><button onclick="Delete_don_del(\'' + ma + '\')">Có</button></div></div>';
    $('#thongbao').html(text);
  }

  function exit_don_xoa() {
    $('#thongbao').html('');
  }
  function Delete_don_del(ma) {
    $.ajax({
      url: './xuly/check_DonHang/checkDon.php',
      type: 'POST',
      dataType: 'html',
      data: {
        delete_ma: ma
      }
    }).fail(function() {
      alert('Không thể thực hiện Xóa ');
    }).done(function(data) {
      $('#content').html(data);
    })
    exit_don_xoa();
  }

</script>

