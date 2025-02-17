<!-- header? -->
<?php
require './views/layout/header.php'

  ?>
<!-- end header -->
<!-- sidebar -->
<?php
require './views/layout/sidebar.php'

  ?>
<!-- end sidebar -->

<!-- Navbar -->
<?php
include './views/layout/navbar.php'
  ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý sản phẩm</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sửa sản phẩm</h3>
            </div>
            <form action="<?= BASE_URL_ADMIN . '?act=sua_san_pham&id_san_pham=' . $SanPham['id'] ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label >Tên sản phẩm</label>
                  <input type="text" class="form-control" name="ten_san_pham" value="<?= $SanPham['ten_san_pham'] ?>" >
                  <?php if(isset($_SESSION['error']['ten_san_pham'])){ ?>
                    <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group ">
                  <label >Ảnh sản phẩm</label>
                  <input type="file" class="form-control" name="hinh_anh" >
                  <?php if(isset($_SESSION['error']['hinh_anh'])){ ?>
                    <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label >Giá tiền</label>
                  <input type="number" class="form-control" name="gia_san_pham" value="<?= $SanPham['gia_san_pham'] ?>">
                  <?php if(isset($_SESSION ['error']['gia_san_pham'])){ ?>
                    <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label >Số Lượng</label>
                  <input type="number" class="form-control" name="so_luong" value="<?= $SanPham['so_luong'] ?>" >
                  <?php if(isset($_SESSION ['error']['so_luong'])){ ?>
                    <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                  <?php } ?>
                </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
      </div>

          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- footer -->
<?php
include './views/layout/footer.php'
  ?>
<!-- end footer -->


<!-- Code injected by live-server -->

</body>

</html>