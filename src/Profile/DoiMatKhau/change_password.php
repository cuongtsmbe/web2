<?php 
    if(!isset($con)){
         require('./../../../con_db.php');
    }
    if(!isset($_SESSION)){
        session_start();
    }
    $text='';
    if(isset($_SESSION['username']) && isset($_POST['change_password'])){
        $text.=' <table>
                <tr>
                    <td>  <label>username:</label></td>
                    <td> <input type="text" id="username" name="username" value=""><br><br></td>
                    <td><span id="warning_user"></span></td>
                </tr>
                <tr>
                    <td><label >password old:</label></td>
                    <td> <input type="password" id="pass_old" name="pass_old" value=""><br><br></td>
                    <td><span id="warning_pass_old"></span></td>
                </tr>
                <tr>
                    <td> <label >New password:</label></td>
                    <td>  <input type="password" id="password_New" name="password_New" value=""><br><br></td>
                    <td></td>
                </tr>
                <tr>
                    <td> <label >New password again:</label></td>
                    <td> <input type="password" id="Repassword" name="Repassword" value=""><br><br></td>
                    <td><span id="warning_pass"></span></td>
                </tr>
                <tr>  <td><input type="button" value="Save" value="" onclick="change_password()"></td></tr>

                </table><span id="warning_success"></span> ';
        echo $text;
    }

    
    if(isset($_SESSION['username']) && isset($_POST['save_change'])){
        if($_POST['username'] !== $_SESSION['username']){
            echo "no_exist_username";
        }else{

             $sql="SELECT * FROM user where user_login=\"".$_POST['username']."\" and password=\"".$_POST['pass_old']."\"";

            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)==1){//nếu password đúng thì cho update password new

                $password_add_condition="/^[\da-zA-Z\s\.\@\(\)]{5,}/"; // Treen 5 kí tự cho phép kí tự đặc biệt là @.() 
                if(!preg_match($password_add_condition,$_POST['password_New'])){
                    echo 'dont_match';
                    exit;
                    }
                    
                $update_sql="UPDATE user SET password=\"".$_POST['password_New']."\" WHERE user_login=\"".$_POST['username']."\"";
                $query=mysqli_query($con,$update_sql);
                echo 'success';
            }else{
                echo "password_error";
            }
        }

        
    }
    session_write_close(); 
?>
