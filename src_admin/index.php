<?php require('./header.php') ;?>

  <?php 
        if(!isset($con)){ 
            require('./../con_db.php');
        }
        if(!isset($_SESSION)){
          session_start();
          }
        if(isset($_SESSION['username_admin'])) {
  ?>
  <?php require('./quyen.php');//lưu lại các quyền của admin vào biến ?>

	<body> 

    <?php require('./task_header.php');?>
		<!-- Phần header phía trên cùng màn hình-->
<div class="group_layout">
<div class="vertical-nav bg-white" id="sidebar">
  <ul class="nav flex-column bg-white mb-0">
      <?php require("./showquyen.php");?>
      <!-- hiển thị các quyền được phép thực hiện trên thanh ul -->
  </ul>

</div>

<div class="page-content p-5" id="content">
  <div id="thongbao"></div>
<?php require('./controller.php'); ?>
</div>
	</div> 

	</body>
  <?php 
    }else{
    require('./xuly/dangnhap_dangxuat/dangnhap_admin.php');
  }?>
</html>
