<?php 
    require('./../../../con_db.php');
    session_start();
    if(isset($_SESSION['username']) && isset($_POST['Thongtin'])){
            $sql = "SELECT * FROM `user` WHERE `user_login`=\"".$_SESSION['username']."\"";
            $query_sql=mysqli_query($con,$sql);
           
            $text='';
            while($row=mysqli_fetch_object($query_sql)){
                $_SESSION['avatar']=$row->avatar_img;
                $name=$row->name;
                $sdt=$row->sdt;
                $gmail=$row->gmail;
                $avatar_img=$row->avatar_img;
                $address=$row->address;
                $text.='<form method="post"><table>
                <tr>
                    <td>  <label>Name:</label></td>
                    <td> <input type="text" id="name" name="name" value="'.$name.'"><br><br></td>
                </tr>
                <tr>
                    <td><label >SĐT:</label></td>
                    <td> <input type="text" id="sdt" name="sdt" value="'.$sdt.'"><br><br></td>
                </tr>
                <tr>
                    <td> <label >Gmail:</label></td>
                    <td>  <input type="text" id="Gmail" name="Gmail" value="'.$gmail.'"><br><br></td>
                </tr>
                <tr>
                    <td> <label >Avatar_img:</label></td>
                    <td> <input type="text" id="Avatar_img" name="Avatar_img" value="'.$avatar_img.'"><br><br></td>
                </tr>
                <tr>
                    <td>  <label >Address:</label></td>
                    <td> <input type="text" id="Address" name="Address" value="'.$address.'"><br><br></td>
                </tr>
                <tr>  <td><input type="submit" value="Update" value="" onclick="update()"></td></tr>
            </table></form>';
            }
            echo $text;
    }
    if(isset($_SESSION['username']) && isset($_POST['update'])){

       
        $Phone_add_condition="/^[0][1-9]{8,9}/";//vd 0123456789
        $gmail_add_condition="/^[A-Za-z\d]+[\@][a-zA-Z]+[\.]+[a-zA-Z]+/";//vd abced@gmail.com

      
        
        if(!preg_match($Phone_add_condition,$_POST['sdt'])){
            echo 'phone';
            exit;
        }
        if(!preg_match($gmail_add_condition,$_POST['Gmail'])){
            echo 'mail';
            exit;
        }

        $sql_update_thongtin="UPDATE user SET name=\"".$_POST['name']."\",sdt=\"".$_POST['sdt']."\",gmail=\"".$_POST['Gmail']."\",avatar_img=\"".$_POST['Avatar_img']."\",address=\"".$_POST['Address']."\" WHERE user_login=\"".$_SESSION['username']."\"";
        $query=mysqli_query($con,$sql_update_thongtin);
        //dùng form cho table mục đích là không cần phải chuyển trang khi update mà nó tự load lại trang 
    }

?>