<?php
      if(!isset($con)){
        require('./../../../con_db.php');
    }
       if(isset($_POST['delete_admin'])){
        $sql='DELETE FROM admin WHERE admin.username=\''.$_POST['delete_admin'].'\'';
        mysqli_query($con,$sql);
    }
?>
