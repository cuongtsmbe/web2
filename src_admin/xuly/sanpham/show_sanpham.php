<?php

if (!isset($con)) {
  require('./../../../con_db.php');
}
if (isset($_GET['quyen__adminlogin_ajax'])) {
  $quyen__adminlogin = [];
  for ($i = 0; $i < count($_GET['quyen__adminlogin_ajax']); $i++) {
    $quyen__adminlogin[$i] = (int) $_GET['quyen__adminlogin_ajax'][$i];
  }
}
if (isset($_GET['td']) && $_GET['td']) {
  $sxtieude = $_GET['td'];
}
if (isset($_GET['sanpham'])) { //hiển thị tất cả sản phẩm có trong database

  $search_username = "";
  $condition_date = "1=1";
  if (isset($_GET['submit'])) { //tìm theo các điều kiện của hóa đơn
    $search_username = $_GET['filter_username'] ?? '';
    $start_date = "STR_TO_DATE('" . (empty($_GET['start_date']) ? '1970-01-01' : $_GET['start_date']) . "', '%Y-%m-%D %h,%i,%s')";
    $end_date = "STR_TO_DATE('" .  (empty($_GET['end_date']) ? '2021-07-10' : $_GET['end_date'])  . "', '%Y-%m-%D %h,%i,%s')";
    $condition_date = "update_at BETWEEN ${start_date} AND ${end_date}";
  }


  if (isset($sxtieude)) { //điều kiện lọc theo tên .. nếu không chọn điều kiện thì nó sẽ mặc định giảm dần theo thời gian
    if ($sxtieude == 'tang') {
      $sx = "order by product.namesp asc";
    } else if ($sxtieude == 'giam') {
      $sx = "order by product.namesp desc";
    } else {
      $sx = "order by product.create_at desc";
    }
  } else {
    $sx = "order by product.create_at desc";
  }
  echo (in_array(5, $quyen__adminlogin)) ? '<div style="margin-bottom:10px"><a href="./index.php?add_product=1"><button>Thêm sản phẩm </button></a></div>' : '';



?>

  <form method='get'>
    <input type="hidden" name="sanpham" value="1">
    <label>Tên sản phẩm : </label>&nbsp;&nbsp;&nbsp;&nbsp;
    <input type='text' name='filter_name_sp' value=<?= $_GET['filter_name_sp'] ?? '' ?>></br>
    <label>Start create  Date:  </label>&nbsp;
    <input type='date' name='start_date_create' value=<?= $_GET['start_date_create'] ?? '' ?>>
    <label>End create  Date: </label>&nbsp;
    <input type='date' name='end_date_create' value=<?= $_GET['end_date_create'] ?? '' ?>></br>
    <label>Start update  Date: </label>
    <input type='date' name='start_date_update' value=<?= $_GET['start_date_update'] ?? '' ?>>
    <label>End update  Date: </label>
    <input type='date' name='end_date_update' value=<?= $_GET['end_date_update'] ?? '' ?>></br>
    <input type="submit" name="submit" value="Search">
  </form></br>

<?php

  $search_username = "";
  $condition_date = "1=1";
  if (isset($_GET['submit'])) { //tìm theo các điều kiện của sanpham
    $search_username = $_GET['filter_name_sp'] ?? '';
    $start_date_create = "STR_TO_DATE('" . (empty($_GET['start_date_create']) ? '1970-01-01' : $_GET['start_date_create']) . "', '%Y-%m-%D %h,%i,%s')";
    $end_date_create = "STR_TO_DATE('" .  (empty($_GET['end_date_create']) ? '2021-10-17' : $_GET['end_date_create'])  . "', '%Y-%m-%D %h,%i,%s')";
    $start_date_update = "STR_TO_DATE('" . (empty($_GET['start_date_update']) ? '1970-01-01' : $_GET['start_date_update']) . "', '%Y-%m-%D %h,%i,%s')";
    $end_date_update = "STR_TO_DATE('" .  (empty($_GET['end_date_update']) ? '2021-10-17' : $_GET['end_date_update'])  . "', '%Y-%m-%D %h,%i,%s')";
    $condition_date = "product.create_at BETWEEN ${start_date_create} AND ${end_date_create} AND product.update_at BETWEEN ${start_date_update} and ${end_date_update}";
  }

  $sql = "select image_sp.link_src,product.namesp,product.create_at,product.update_at,product.id from product,image_sp where product.id=image_sp.id_product and namesp like \"%${search_username}%\" and ${condition_date} group by product.id " . $sx . ";";
  $query_sql = mysqli_query($con, $sql);
  $text = '   <table id="myTable">
        <tr>
          <td onclick="sortTable(5)" style="width:70px"><b>STT</b></td>
          <td ><b>Ảnh</b></td>
          <th onclick="sortTable(2)" style="cursor:pointer;"><b>Tên Sản Phẩm</b></th>
          <th onclick="sortTable(3)" style="cursor:pointer;"><b>Ngày Tạo</b></th>
          <td onclick="sortTable(4)" style="cursor:pointer;"><b>Ngày Cập Nhật</b></td>
          ' . (in_array(6, $quyen__adminlogin) ? ' <td style="width:70px"><b>Sửa</b></td>' : '') . '
          ' . (in_array(7, $quyen__adminlogin) ? ' <td style="width:70px"><b>Xóa</b></td>' : '') . '
        </tr>
     
     ';
  $i = 0;
  while ($row = mysqli_fetch_object($query_sql)) {
    $i++;
    $text .= '<tr>
          <td style="width:70px">' . $i . '</td>
          <td><img src="./../update_image/' . $row->link_src . '"></td>
          <td>' . $row->namesp . '</td>
          <td>' . $row->create_at . '</td>
          <td>' . $row->update_at . '</td>
          ' . (in_array(6, $quyen__adminlogin) ? ' <td style="width:70px"> <a href="./index.php?edit=\'edit\'& id_product_edit=' . $row->id . ' "><button>sửa</button></a></td>' : '') . '
          ' . (in_array(7, $quyen__adminlogin) ? ' <td style="width:70px"> <button onclick="bot_thongbao(' . $row->id . ')">xóa</button></td>' : '') . '
        </tr>';
  }
  $text .= '</table>';
  echo $text;
} ?>
<script>
  function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable");
    switching = true;
    //Theo hướng tăng
    dir = "asc"; 
    /* Vòng lặp sẽ tiếp tục cho đến lúc không còn switch hoạt động nữa*/
    while (switching) {
      switching = false;
      rows = table.rows;
      /*Lặp mọi dòng ngoại trừ tiêu đề*/
      for (i = 1; i < (rows.length - 1); i++) {
        // Đánh dấu switch
        shouldSwitch = false;
        /* So phần tử hai dòng */
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /* Kiểm tra xem hai dòng nên đổi theo chiều tăng hay giảm*/
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            // Đổi dấu switch và thoát vòng lặp
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            // Đổi dấu switch và thoát vòng lặp
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /*Nếu switch được đổi dấu, thực hiện nó*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        // Mỗi lần hoán đổi sẽ tăng biến lên 1
        switchcount ++;      
      } else {
        /* Néu không có switch nào được thực hiện và đang theo chiều tăng,
        chuyển sang chiều giảm và khởi chạy vòng while lần nữa */
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }

  function bot_thongbao(id) {
    var text = ' <div class="alert_delete"><div class="title_tb"><label for="exampleFormControlTextarea1">Bạn có muốn xóa sản phẩm này không ? </label></div><div class="button_dele"><button onclick="exit_bot()">Không</button><button onclick="Xoa_sanpham(' + id + ')">Có</button></div></div>';
    $('#thongbao').html(text);
  }

  function exit_bot() {
    // var A=document.getElementByid('thongbao');
    // A.remove();//xóa thẻ div này luôn
    $('#thongbao').html('');
  }
  //vì require ra trang index nên đường dẫn phải như đang đứng ở trang index trỏ đi
  function sanpham(quyen) {
    $.ajax({
      url: "./xuly/sanpham/show_sanpham.php",
      type: "GET",
      dataType: 'html',
      data: {
        sanpham: 'sanpham',
        quyen__adminlogin_ajax: quyen
      }
    }).fail(function() {
      alert("Không thực hiện được show sản  phẩm ");
    }).done(function(data) {
      $('#content').html(data);
    })
  }

  function Xoa_sanpham(id) {
    $.ajax({
      url: "./xuly/sanpham/delete_sanpham.php",
      type: "POST",
      dataType: 'html',
      data: {
        delete_SP: 'delete_SP',
        id: id
      }
    }).fail(function() {
      alert("Không thế xóa")
    }).done(function(data) {
      if (data == 'success_delete') {
        var temp = <?php echo json_encode($quyen__adminlogin); ?>;
        sanpham(temp); //nếu mà xóa thành công thì render lại sản phẩm 
      } else {
        console.log("delete fail");
      }
    })
    exit_bot();
  }
</script>