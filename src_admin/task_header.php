











<div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./index.php">Admin</a>
                </div>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <!-- <li ><a href="?url=tuixach">Túi Xách</a></li> -->
                         <li><a href="./../src/index.php">Website</a></li>
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="?url=dangnhap" id="dangnhap_header"></a></li>
                       
                        <li><a href="#"><?php echo $_SESSION['username_admin']; ?></a></li>
  
                       
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="./xuly/dangnhap_dangxuat/unsetSession.php?"> Đăng Xuất</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><?php if (in_array(5, $quyen__adminlogin) || in_array(6, $quyen__adminlogin) || in_array(7, $quyen__adminlogin) || in_array(8, $quyen__adminlogin)) { ?>
  <li class="nav-item">
    <a href="./index.php?url=sanpham&sanpham='sanpham'" class="nav-link text-dark font-italic bg-light">
      <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
      Sản phẩm
    </a>
  </li>
<?php } ?>
<?php if (in_array(16, $quyen__adminlogin)) { ?>
  <li>
    <ul class="nav navbar-nav navbar-left">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chi Tiết </a>
        <ul class="dropdown-menu">
          <li class="nav-item">
            <a href="./index.php?url=menu_nhomsp" class="nav-link text-dark font-italic">
              <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
              Loại sản phẩm
            </a>
          </li>
          <li class="nav-item">
            <a href="./index.php?url=menu_chatlieu" class="nav-link text-dark font-italic">
              <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
              Chất liệu sản phẩm
            </a>
          </li>
          <li class="nav-item">
            <a href="./index.php?url=menu_size" class="nav-link text-dark font-italic">
              <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
              Kích thước sản phẩm
            </a>
          </li>
          <li class="nav-item">
            <a href="./index.php?url=menu_thuonghieu" class="nav-link text-dark font-italic">
              <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
              Thương hiệu sản phẩm
            </a>
          </li>
          <li class="nav-item">
            <a href="./index.php?url=menu_price" class="nav-link text-dark font-italic">
              <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
              Giá sản phẩm
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </li>

<?php } ?>

<?php if (in_array(2, $quyen__adminlogin)) { ?>
  <li class="nav-item">
    <a href="./index.php?url=duyet_don&duyet_don=1" class="nav-link text-dark font-italic">
      <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
      Đơn hàng chưa xử lý
    </a>
  </li>
<?php } ?>
<?php if (in_array(14, $quyen__adminlogin)) { ?>
  <li class="nav-item">
    <a href="./index.php?url=xemdon&xemdon=1" class="nav-link text-dark font-italic">
      <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
      Xem đơn (đã xử lý)
    </a>
  </li>

  <li class="nav-item">
    <a href="./index.php?url=sp_banchay" class="nav-link text-dark font-italic">
      <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
      Sản Phẩm Bán Chạy
      (Thống kê)
    </a>
  </li>
<?php } ?>
<?php if (in_array(15, $quyen__adminlogin)) { ?>
  <li class="nav-item">
    <a href="./index.php?url=supplier_watch&supplier_watch=1" class="nav-link text-dark font-italic">
      <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
      Nhà cung cấp
    </a>
  </li>
<?php } ?>
<?php if (in_array(1, $quyen__adminlogin)) { ?>
  <li class="nav-item">
    <a href="./index.php?url=user_watch&User_watch=1" class="nav-link text-dark font-italic">
      <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
      User
    </a>
  </li>
<?php } ?>
<?php if (in_array(9, $quyen__adminlogin) || in_array(10, $quyen__adminlogin) || in_array(11, $quyen__adminlogin) || in_array(12, $quyen__adminlogin) || in_array(13, $quyen__adminlogin)) { ?>
  <li class="nav-item">
    <a href="./index.php?url=Admin_nv&watch&Admin_Nhanvien=1" class="nav-link text-dark font-italic">
      <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
      Nhân viên
    </a>
  </li>

<?php } ?>
</li>
                            </ul>
                        </li>
                      
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
 


      
