<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?= $title; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= $title; ?></li>
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
        <div class="col-lg-6">
          <?= $this->session->flashdata('message'); ?>
          <!-- Do here -->
          <form action="<?= base_url('user/changepassword'); ?>" method="post">
            <div class="mb-3">
              <label for="current_password" class="form-label">Current password</label>
              <input type="password" class="form-control" name="current_password" id="current_password">
              <?= form_error('current_password', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="mb-3">
              <label for="pass1" class="form-label">New password</label>
              <input type="password" class="form-control" name="pass1" id="pass1">
              <?= form_error('pass1', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="mb-3">
              <label for="pass2" class="form-label">Repeat password</label>
              <input type="password" class="form-control" name="pass2" id="pass2">
              <?= form_error('pass2', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-warning"><i class="fas fa-key"></i> Change</button>
            </div>
          </form>
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
<!-- ./wrapper -->

