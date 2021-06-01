<?php 
    if(!isset($con)){
        require('./../../../con_db.php');
    }
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_GET['td']) && $_GET['td']){
        $sxtieude=$_GET['td'];
      }
    if(isset($_GET['quyen__adminlogin_ajax'])){
        // $quyen__adminlogin=json_decode($_GET['quyen__adminlogin_ajax']); 
        $quyen__adminlogin=[];//biến này là giống với biến của trang index nhưng vì khi gọi ajax thì biến này không có vì vậy gây ra lỗi khi sử dụng phía dưới (biến này không there bị đổi tên) 
        for($i=0;$i<count($_GET['quyen__adminlogin_ajax']);$i++){
            $quyen__adminlogin[$i]=(int) $_GET['quyen__adminlogin_ajax'][$i];
        }
    }
    if(isset($_GET['Admin_Nhanvien'])){
        if(in_array(11, $quyen__adminlogin)){//nhìn trong table privilege quyền số 11 sẽ là: thêm admin .nếu amdin login có quyền này thì hiện button thêm admin leen 
            echo '<div style="margin-bottom:10px"><a href="./index.php?add_admin=1"><button>Thêm Admin </button></a></div>';
        }
        
 ?>
          
                <form method='get'>
                    <input type="hidden" name="Admin_Nhanvien" value=1>
                    <label>Username Nhân Viên : </label>
                    <input type='text' name='filter_username' value=<?=$_GET['filter_username']??''?>>
                    <label>Start Date: </label>
                    <input type='date' name='start_date' value=<?=$_GET['start_date']??''?>>
                    <label>End Date: </label>
                    <input type='date' name='end_date' value=<?=$_GET['end_date']??''?>>
                    <input type="submit" name="submit" value="Search">
                </form>
         
 <?php             
             $search_username="";
             $condition_date="1=1";
            if(isset($_GET['submit'])){//tìm theo các điều kiện của admin
                $search_username=$_GET['filter_username']??'';
                $start_date= "STR_TO_DATE('" . (empty($_GET['start_date'])?'1970-01-01':$_GET['start_date']) . "', '%Y-%m-%D %h,%i,%s')";
                $end_date= "STR_TO_DATE('" .  (empty($_GET['end_date'])?'2021-07-10':$_GET['end_date'])  . "', '%Y-%m-%D %h,%i,%s')";
                $condition_date="update_at BETWEEN ${start_date} AND ${end_date}";
            }


        if(isset($sxtieude)){//điều kiện lọc theo tên .. nếu không chọn điều kiện thì nó sẽ mặc định giảm dần theo thời gian
            if($sxtieude=='tang'){
              $sx="order by admin.name asc";
            }else if($sxtieude=='giam'){
              $sx="order by admin.name desc ";
            }else{
              $sx="order by admin.update_at desc";
            }
          }else{
            $sx="order by admin.update_at desc";
          }

          
        $sql="select * from admin where username like \"%${search_username}%\" and ${condition_date}  ".$sx."";
        $query_sql=mysqli_query($con,$sql);
        $text='   <table>
        <tr>
          <td style="width:20px"><b>STT</b></td>
          <td><b>username</b></td>
          <td><b>Name</b></td>
          <td><b>SĐT</b></td>
          <td><b>Gmail</b></td>
          <td><b>Block</b></td>
          <td><b>Ngày update </b></td>
          '.(in_array(13, $quyen__adminlogin)?'<td style="width:70px"><b>Phân quyền</b></td>':'').'
          '.(in_array(10, $quyen__adminlogin)?'<td style="width:70px"><b>Sửa</b></td>':'').'
          '.(in_array(12, $quyen__adminlogin)?' <td style="width:70px"><b>Xóa</b></td>':'').'
        </tr>
     
     ';
        $i=0;
       while($row=mysqli_fetch_object($query_sql)){   
           $tempaa=($row->blocked==1)?'<button onclick="block_admina(0,\''.$row->username.'\')">blocked</button>':'<button onclick="block_admina(1,\''.$row->username.'\')">block</button>';        
           if($_SESSION['username_admin']!==$row->username){
                $i++;
                $text.='<tr>
                <td style="width:70px">'.$i.'</td>
                <td>'.$row->username.'</td>
                <td>'.$row->name.'</td>
                <td>'.$row->phone.'</td>
                <td>'.$row->gmail.'</td>
                <td>'.$tempaa.'</td>
                <td style="width:70px">'.$row->update_at.'</td>  
                '.(in_array(13, $quyen__adminlogin)?' <td style="width:70px"><a href="./index.php?phanquyen_admin='.$row->username.'"><button>Phân quyền</button></a></td>':'').'
                '.(in_array(10, $quyen__adminlogin)?' <td style="width:70px"><a href="./index.php?sua_admin='.$row->username.'"><button>sửa</button></a></td>':'').'
                '.(in_array(12, $quyen__adminlogin)?' <td style="width:70px"> <button onclick="Thongbao_admin(\''.$row->username.'\')">xóa</button></td>':'').'
                </tr>';
           }
        }
       $text.='</table>';
        echo $text;
    }
?>
<script>
        function Thongbao_admin(username){
              var text=' <div class="alert_delete"><div class="title_tb"><label for="exampleFormControlTextarea1">Bạn có muốn xóa Admin này không ? </label></div><div class="button_dele"><button onclick="exit_thongbao_admin()">Không</button><button onclick="Xoa_admin(\''+username+'\')">Có</button></div></div>';
            $('#thongbao').html(text);
        }
        function exit_thongbao_admin(){
          $('#thongbao').html('');
        }
        function Xoa_admin(name_admin){
            $.ajax({
                url:'./xuly/Admin_nhanvien/delete_admin.php',
                type:'POST',
                dataType:'html',
                data:{
                    delete_admin:name_admin
                }
            }).fail(function(){
                alert('Không thể thực hiện Xóa Admin');
            }).done(function(data){
                var temp=<?php echo json_encode($quyen__adminlogin) ;?>;//chuyển mảng quyền admin đang đăng nhập thành chuỗi để 'echo' (json_encode)
                                                                        //tại sao ở đây lại sử dụng đc biến ($quyen__adminlogin) của trang index vì trang này ban đầu đc require trong trang index nên js cx đang đc gọi từ trang index nên có thể sử dụng nó 
                show_admin(temp);   
            })
            exit_thongbao_admin();
        }
        
        function show_admin(quyen){
            $.ajax({
                url:'./xuly/Admin_nhanvien/show_admin.php',
                type:'GET',
                dataType:'html',
                data:{
                    Admin_Nhanvien:1,
                    quyen__adminlogin_ajax:quyen
                }
            }).fail(function(){
                alert('Không thể thực hiện Show Admin');
            }).done(function(data){
                 $('#content').html(data);
            })
        }

        function block_admina(value,username){
            $.ajax({
                url:'./xuly/Admin_nhanvien/blocked.php',
                type:'POST',
                dataType:'html',
                data:{
                    value:value,
                    block_admin:username
                }
            }).fail(function(){
                alert('Không thể thực hiện blocked ');
            }).done(function(data){
              console.log(data);
                var temp=<?php echo json_encode($quyen__adminlogin) ;?>;//chuyển mảng quyền admin đang đăng nhập thành chuỗi để 'echo' (json_encode)
                                                                        //tại sao ở đây lại sử dụng đc biến ($quyen__adminlogin) của trang index vì trang này ban đầu đc require trong trang index nên js cx đang đc gọi từ trang index nên có thể sử dụng nó 
                show_admin(temp);   
            })
        }
</script>
