<?php if (isset($_GET['url']) && $_GET['url'] == "menu_size") {
    $menu_type = '  <div class="form-group">
     <label for="exampleFormControlSelect1">Kích thước sẽ bị xóa :</label>
     <select class="form-control" id="size" name="sizesp" >';
    $sql_menu_type = "select * from menu_item_ngan_laptop";
    $sql_menu_type_query = mysqli_query($con, $sql_menu_type);
    while ($row = mysqli_fetch_object($sql_menu_type_query)) {
        $menu_type .= '<option value="' . $row->value_name . '" >' . $row->name . '</option>';
    }
    $menu_type .= '  </select>
        </div>';

?>
    <form method="POST">
        <?php echo  $menu_type; ?>
        <div class="form-group">
            <label for="exampleFormControlInput1">Thêm kích thước sản phẩm :</label>
            <input type="text" class="form-control" id="size_sp" placeholder="Tên nhóm..." name="size_sp">
        </div>
        <div class="form-group ">
            <input type="submit" class="form-control " name="sb_add_menu_size" id="sb_add_menu_size" value="Thực Hiện ">
        </div>
    </form>
<?php } ?>

<?php

if (isset($_POST['sb_add_menu_size'])) {
    function Ma_ramdom_ma_size($length)
    { //copy in web
        $keys = array_merge(range(0, 9), range('a', 'z'));

        $key = "";
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[mt_rand(0, count($keys) - 1)];
        }
        return $key;
    }

    do {
        $ma_size = Ma_ramdom_ma_size(8);
        $sql_random = "SELECT * FROM `menu_item_ngan_laptop` WHERE `value_name`=\"" . $ma_size . "\"";
        $query_test_random = mysqli_query($con, $sql_random);
    } while (mysqli_num_rows($query_test_random) !== 0);


    if (empty($_POST['size_sp'])) {
        $sql = "DELETE FROM menu_item_ngan_laptop WHERE value_name=\"" . $_POST['sizesp'] . "\"; ";
        $result = mysqli_query($con, $sql);
        echo "<script>alert('deleted :" . $_POST['sizesp'] . " ')</script>";
    } else {
        $sql = "INSERT INTO menu_item_ngan_laptop (value_name,name) VALUES (\"" . $ma_size . "\",\"" . $_POST['size_sp'] . "\") ";
        $result = mysqli_query($con, $sql);
    }
    echo "<script> setTimeout(()=>{window.location='./index.php?success_add=1'},700);</script>";
}



?>