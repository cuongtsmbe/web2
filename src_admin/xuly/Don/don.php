<?php 
        if(isset($con)){
            require('./../con_db.php');
        }
        if(isset($_GET['xemdon'])){
        
?>


          
                <form method='get'>
                    <input type="hidden" name="xemdon" value=1>
                    <label>Mã Nhân Viên : </label>
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
            if(isset($_GET['submit'])){//tìm theo các điều kiện của hóa đơn
                $search_username=$_GET['filter_username']??'';
                $start_date= "STR_TO_DATE('" . (empty($_GET['start_date'])?'1970-01-01':$_GET['start_date']) . "', '%Y-%m-%D %h,%i,%s')";
                $end_date= "STR_TO_DATE('" .  (empty($_GET['end_date'])?'2021-07-10':$_GET['end_date'])  . "', '%Y-%m-%D %h,%i,%s')";
                $condition_date="create_at BETWEEN ${start_date} AND ${end_date}";
            }
            $sql="select * from hoa_don where ${condition_date}  and ma_nhanvien like \"%${search_username}%\" order by hoa_don.create_at desc;";
            $query_sql=mysqli_query($con,$sql);
            $text='   <table>
                <tr>
                <td style="width:70px"><b>STT</b></td>
                <td class="xem_hoa_don"><b>Mã hóa đơn</b></td>
                <td><b>Username_KH</b></td>
                <td><b>Mã Nhân Viên</b></td>
                <td><b>Tổng Tiền </b></td>
                <td><b>Ngày Tạo</b></td>
                <td style="width:150px"><b>Xem chi Tiết </b></td>
                </tr>
        ';
            $i=0;
        while($row=mysqli_fetch_object($query_sql)){
            $i++;
            $text.='<tr>
                <td style="width:70px">'.$i.'</td>
                <td>'.$row->ma_hd.'</td>
                <td>'.$row->user_login.'</td>
                <td>'.$row->ma_nhanvien.'</td>
                <td>'.$row->tongtien.' <b>vnd</b></td>
                <td>'.$row->create_at.'</td>
                <td style="width:70px"> <a href="./index.php?chi_tiet_hd=\''.$row->ma_hd.'\' "><button>Xem chi tiết</button></a></td>
                </tr>';
        }
        // $text.='</table>';
        $text.='<tr>
        
        <td></td>
       
        </tr>
        <tr>
        
        <td><b>Thống kê :</b></td>
       
        </tr>
        <tr>
        
        <td></td>
       
        </tr>';
        $j=0;
//tính tổng tiền nhân viên đã check hóa đơn
        $sql="select *,SUM(tongtien) as sum from hoa_don where ${condition_date}  and ma_nhanvien like \"%${search_username}%\" group by ma_nhanvien order by sum desc;";
        $query_sql=mysqli_query($con,$sql);
        while($row=mysqli_fetch_object($query_sql)){
            $j++;
            $text.='<tr>
                <td style="width:70px">Top '.$j.'</td>
                <td>Nhân Viên :</td>
                <td></td>
                <td>'.$row->ma_nhanvien.'</td>
                <td> </td>
                <td>Tong Tien : </td>
                <td style="width:70px">'.number_format($row->sum).' <b>vnd</b></td>
                </tr>';
        }
        $text.='</table>';
            echo $text;
        }
?>