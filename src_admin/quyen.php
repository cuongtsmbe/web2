<?php 
   
   $sql_quyen="select * from admin_privilege where username_admin=\"".$_SESSION['username_admin']."\"";
   $result_quyen_admin=mysqli_query($con,$sql_quyen);
   $quyen__adminlogin = [];// lưu lại quyền của admin này để kiểm tra checked các check box
   $i=0;
   while($row_quyen=mysqli_fetch_object($result_quyen_admin)){
         $quyen__adminlogin[$i]=$row_quyen->privilege_id;
       $i++;
   }
   for($i=0;$i<count($quyen__adminlogin);$i++){
       $quyen__adminlogin[$i]=(int) $quyen__adminlogin[$i];
   }
 
?>