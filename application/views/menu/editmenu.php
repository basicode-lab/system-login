<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit menu</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit menu</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-5">
          <!-- Do here -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit menu Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('menu/editmenu/' . $menu['menu_id']); ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="menu_id">Menu ID</label>
                    <input type="text" class="form-control" id="menu_id" name="menu_id" value="<?= $menu['menu_id']; ?>" placeholder="Menu ID"  autocomplete="off">
                    <?= form_error('menu_id', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="menu">Menu</label>
                    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name" value="<?= $menu['menu']; ?>" autocomplete="off" >
                    <?= form_error('menu', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                  <a href="<?= base_url('menu'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> back</a>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>