<?php
if (!isset($con)) {
  require('./../../../con_db.php');
}
if (isset($_GET['td']) && $_GET['td']) {
  $sxtieude = $_GET['td'];
}
if (isset($_GET['supplier_watch'])) {
  if (isset($sxtieude)) { //điều kiện lọc theo tên .. nếu không chọn điều kiện thì nó sẽ mặc định giảm dần theo thời gian
    if ($sxtieude == 'tang') {
      $sx = "order by supplieres.name asc";
    } else if ($sxtieude == 'giam') {
      $sx = "order by supplieres.name desc ";
    } else {
      $sx = null;
    }
  } else {
    $sx = null;
  }
?>
  <a href="?url=supplier_watch&add_supplier=1"><button>add supplier</button></a>
  <form method='get'>
    <input type="hidden" name="supplier_watch" value=1>
    <label>Ten supplieres: </label>
    <input type='text' name='filter_name' value=<?= $_GET['filter_name'] ?? '' ?>>
    <input type="submit" name="submit" value="Search">
  </form>

<?php
  $search_name = "";
  if (isset($_GET['submit'])) { //tìm theo các điều kiện của admin
    $search_name = $_GET['filter_name'] ?? '';
  }

  if (isset($_GET['delete_id'])) {
    $sql = 'DELETE FROM supplieres WHERE supplieres.id=\'' . $_GET['delete_id'] . '\'';
    mysqli_query($con, $sql);
  }
  $sql = "select * from supplieres where name like \"%${search_name}%\"  " . $sx . "";
  $query_sql = mysqli_query($con, $sql);
  $text = '   <table>
        <tr>
          <td style="width:70px"><b>STT</b></td>
          <td><b>Name</b></td>
          <td><b>SĐT</b></td>
          <td><b>Gmail</b></td>
          <td><b>Address</b></td>
          <td style="width:70px"><b>Xóa</b></td>
        </tr>
     
     ';
  $i = 0;
  while ($row = mysqli_fetch_object($query_sql)) {
    $i++;
    $text .= '<tr>
          <td style="width:70px">' . $i . '</td>
          <td>' . $row->name . '</td>
          <td>' . $row->phone . '</td>
          <td>' . $row->mail . '</td>
          <td style="width:70px">' . $row->address . '</td>
          <td style="width:70px"> <button onclick="supplieres_xoa(\'' . $row->id . '\')">xóa</button></td>
        </tr>';
  }
  $text .= '</table>';
  echo $text;
}
?>
<script>
  function supplieres_xoa(id) {
    var text = ' <div class="alert_delete"><div class="title_tb"><label for="exampleFormControlTextarea1">Bạn có muốn xóa supplier này không ? </label></div><div class="button_dele"><button onclick="exit_supplieres_xoa()">Không</button><button onclick="Delete_supplier(\'' + id + '\')">Có</button></div></div>';
    $('#thongbao').html(text);
  }

  function exit_supplieres_xoa() {
    $('#thongbao').html('');
  }

  function Delete_supplier(id) {
    $.ajax({
      url: './xuly/supplier/supplier.php',
      type: 'GET',
      dataType: 'html',
      data: {
        supplier_watch: 1,
        delete_id: id
      }
    }).fail(function() {
      alert('Không thể thực hiện Xóa ');
    }).done(function(data) {
      $('#content').html(data);
    })
    exit_supplieres_xoa();
  }
</script>