<div style="padding-bottom:20px">
    <form method='post' style="margin-bottom: -5px;">
        <b>Start Date</b> <input type='date' class='dateFilter' name='dateFrom' value='<?php if (isset($_POST['dateFrom'])) echo $_POST['dateFrom']; ?>'>

        <b> End Date</b> <input type='date' class='dateFilter' name='dateTo' value='<?php if (isset($_POST['dateTo'])) echo $_POST['dateTo']; ?>'>
        <?php
            $text_menu_type='';
            $text_menu_type = '<div class="form-group">
                <label for="exampleFormControlSelect1">Loại sản phẩm</label>
                <select class="form-control" id="filter_type_product" name="filter_type_product">';
            $sql_menu_type = "select * from menu_item_nhomsp";
            $sql_menu_type_query = mysqli_query($con, $sql_menu_type);
            while ($row = mysqli_fetch_object($sql_menu_type_query)) {
                $select=(isset($_POST['filter_type_product'])&&$_POST['filter_type_product']==$row->value_name)?'selected':'';
                $text_menu_type .= '<option value="' . $row->value_name . '" '.$select.'>' . $row->name . '</option>';
            }
	 $select=(isset($_POST['filter_type_product'])&&$_POST['filter_type_product']=="tat_ca")?'selected':'';

            $text_menu_type .= '<option value="tat_ca" '.$select.'>Chọn Tất Cả</option>';
            $text_menu_type .= ' </select>
            </div>';
            echo $text_menu_type;
        ?>
        <label>Top sản phẩm bán chạy : </label>
        <input type='number' name='top_spbanchay' value='<?php if (isset($_POST['top_spbanchay'])) echo $_POST['top_spbanchay']; ?>'?>
        <input type='submit' name='but_loc_time' value='Search'>
    </form>

</div>


<?php
//lúc đầu mới khởi ddongnj trang thì chưa có $dateFrom and $dateTo
if (isset($_POST['dateFrom'])) {
    $dateFrom = date('Y-m-d', strtotime($_POST['dateFrom']));
} else {
    $dateFrom = date('Y-m-d');
}
if (isset($_POST['dateTo'])) {
    $dateTo = date('Y-m-d', strtotime($_POST['dateTo']));
} else {
    $dateTo = date('Y-m-d');
}

if (date('Y', strtotime($dateTo)) == 1970) { //khi echo date() lúc đầu thì nó sexcho ra năm 1970
    $dateTo = date('Y-m-d'); //lần này thì ngày hiện tại current
}
?>