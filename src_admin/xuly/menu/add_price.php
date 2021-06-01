<?php if (isset($_GET['url']) && $_GET['url'] == "menu_price") {
    $menu_type = '  <div class="form-group">
     <label for="exampleFormControlSelect1">Điều kiện giá sẽ bị xóa :</label>
     <select class="form-control" id="price" name="pricesp" >';
    $sql_price = "select * from  menu_item_price";
    $sql_price_query = mysqli_query($con, $sql_price);
    while ($row = mysqli_fetch_object($sql_price_query)) {
        $menu_type .= '<option value="' . $row->value_name . '" >' . $row->name . '</option>';
    }

    $menu_type .= '  </select>
        </div>';



?>
    <form method="POST">
        <?php print_r($menu_type); ?>
        <div class="form-group">
            <label for="exampleFormControlInput1">Thêm điều kiện lọc gía sản phẩm :</label></br>
            <label for="exampleFormControlInput1">Từ :</label>
            <input type="number" class="form-control" id="price_sp" placeholder="giá bắt đầu..." name="start_price_sp">
            <label for="exampleFormControlInput1">Đến :</label>
            <input type="number" class="form-control" id="price_sp" placeholder="giá kết thúc..." name="end_price_sp">
            <label for="exampleFormControlInput1">Tên điều kiện :</label>
            <input type="text" class="form-control" id="price_sp" placeholder="Tên cho điều kiện giá..." name="name_price_loc">
        </div>
        <div class="form-group ">
            <input type="submit" class="form-control " name="sb_add_menu_price" id="sb_add_menu_price" value="Thực Hiện ">
        </div>
    </form>
<?php } ?>

<?php

if (isset($_POST['sb_add_menu_price'])) {
    function Test_query($value, $con)
    {
        $sql_random = "SELECT * FROM  menu_item_price WHERE `value_name`=\"" . $value . "\"";
        $query_test_random = mysqli_query($con, $sql_random);
        $number = mysqli_num_rows($query_test_random);
        return $number;
    }

    if (empty($_POST['start_price_sp'])) {
        $_POST['start_price_sp'] = 0;
    }
    if (empty($_POST['end_price_sp'])) {
        $_POST['end_price_sp'] = 1;
    }
    if (empty($_POST['name_price_loc'])) {
        $sql = "DELETE FROM  menu_item_price WHERE value_name=\"" . $_POST['pricesp'] . "\"; ";
        $result = mysqli_query($con, $sql);
        echo "<script>alert('deleted :" . $_POST['pricesp'] . " ')</script>";
    } else {
        $price = $_POST['start_price_sp'] . '-' . $_POST['end_price_sp'];

        if (Test_query($price, $con) > 0) {
            echo "<script>alert('điều kiện giá đã tồn tại ')</script>";
            exit;
        }
        $sql = "INSERT INTO  menu_item_price (value_name,name) VALUES (\"" . $price . "\",\"" . $_POST['name_price_loc'] . "\") ";
        $result = mysqli_query($con, $sql);
    }
    echo "<script> setTimeout(()=>{window.location='./index.php?success_add=1'},700);</script>";
}



?>