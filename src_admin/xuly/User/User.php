<?php 
    if(!isset($con)){
        require('./../../../con_db.php');
    }
    if(isset($_GET['td']) && $_GET['td']){
        $sxtieude=$_GET['td'];
      }
    if(isset($_GET['User_watch'])){
        if(isset($sxtieude)){//điều kiện lọc theo tên .. nếu không chọn điều kiện thì nó sẽ mặc định giảm dần theo thời gian
            if($sxtieude=='tang'){
              $sx="order by user.name asc";
            }else if($sxtieude=='giam'){
              $sx="order by user.name desc ";
            }else{
              $sx=null;
            }
          }else{
            $sx=null;
          }
?>
          
          <form method='get'>
              <input type="hidden" name="User_watch" value=1>
              <label>Username User: </label>
              <input type='text' name='filter_username' value=<?=$_GET['filter_username']??''?>>
              <input type="submit" name="submit" value="Search">
          </form>
   
<?php             
       $search_username="";
      if(isset($_GET['submit'])){//tìm theo các điều kiện của admin
          $search_username=$_GET['filter_username']??'';
      }

        if(isset($_GET['delete_user'])){
            $sql='DELETE FROM user WHERE user.user_login=\''.$_GET['delete_user'].'\'';
            mysqli_query($con,$sql);
        }
        $sql="select * from user where user_login like \"%${search_username}%\"  ".$sx."";
        $query_sql=mysqli_query($con,$sql);
        $text='   <table>
        <tr>
          <td style="width:70px"><b>STT</b></td>
          <td><b>username</b></td>
          <td><b>Name</b></td>
          <td><b>SĐT</b></td>
          <td><b>Gmail</b></td>
          <td><b>Address</b></td>
          <td style="width:70px"><b>Xóa</b></td>
        </tr>
     
     ';
        $i=0;
       while($row=mysqli_fetch_object($query_sql)){
           $i++;
          $text.='<tr>
          <td style="width:70px">'.$i.'</td>
          <td>'.$row->user_login.'</td>
          <td>'.$row->name.'</td>
          <td>'.$row->sdt.'</td>
          <td>'.$row->gmail.'</td>
          <td style="width:70px">'.$row->address.'</td>
          <td style="width:70px"> <button onclick="Thongbao_user(\''.$row->user_login.'\')">xóa</button></td>
        </tr>';
       }
       $text.='</table>';
        echo $text;
    }
?>
<script>
        function Thongbao_user(user_login){
          var text=' <div class="alert_delete"><div class="title_tb"><label for="exampleFormControlTextarea1">Bạn có muốn xóa User này không ? </label></div><div class="button_dele"><button onclick="exit_thongbao_user()">Không</button><button onclick="Xoa_User(\''+user_login+'\')">Có</button></div></div>';
            $('#thongbao').html(text);
        }
        function exit_thongbao_user(){
          $('#thongbao').html('');
        }
        function Xoa_User(name_user){
            $.ajax({
                url:'./xuly/User/User.php',
                type:'GET',
                dataType:'html',
                data:{
                  User_watch:1,
                    delete_user:name_user
                }
            }).fail(function(){
                alert('Không thể thực hiện Xóa user');
            }).done(function(data){
                 $('#content').html(data);
            })
            exit_thongbao_user();
        }

</script>