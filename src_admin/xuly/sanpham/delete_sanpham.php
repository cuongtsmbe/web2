<?php 
    if(!isset($con)){
        require('./../../../con_db.php');
    }
   if(isset($_POST['delete_SP'])&& isset($_POST['id'])){//xóa sản phẩm trên table product dựa vào id sản phẩm 
    $sql='DELETE FROM product WHERE product.id='.$_POST['id'].'';
    $sql_query=mysqli_query($con,$sql);
    echo "success_delete";
}
?>