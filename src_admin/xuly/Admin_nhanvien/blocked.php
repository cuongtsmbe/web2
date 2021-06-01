<?php
      if(!isset($con)){
        require('./../../../con_db.php');
    }
        if(isset($_POST['block_admin'])){
            $sql='UPDATE admin SET blocked='.$_POST['value'].' WHERE admin.username=\''.$_POST['block_admin'].'\'';
            mysqli_query($con,$sql);
        }
    

?>
