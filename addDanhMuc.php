<!-- header -->
<?php include './views/layout/header.php'; ?>

  <!-- Navbar -->
  <?php include './views/layout/navbar.php'; ?>

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lí danh mục</h1>

          </div>
          
      </div><!-- /.container-fluid -->
    </section>
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm danh mục </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="?act=them-danh-muc" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text"  class="form-control" name="ten_danh_muc" placeholder="Nhập danh mục">
                    <?php if(isset($error['ten_danh_muc'])){ ?>
                      <p class="text-danger"><?= $error['ten_danh_muc'] ?></p>
                    <?php  } ?>
                  </div>

                  <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="mo_ta" id="" class="form-control" placeholder="Nhập mô tả"></textarea>
                  </div>  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
     <section class="content">
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
<?php include './views/layout/footer.php'?>;

   <!-- end footer -->
  


<!-- Code injected by live-server -->

</body>
</html>
