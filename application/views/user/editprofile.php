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
          <!-- Do here -->
          <?= form_open_multipart('user/editprofile'); ?>
          <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fieldEmail" name="email" value="<?= $user['email']; ?>" readonly>
            </div>
          </div>
          <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Full name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" autocomplete="off">
              <?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-2"><strong>Image</strong></div>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/' . $user['image']); ?>" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="mb-3">
                      <input class="form-control" type="file" id="image" name="image">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-2"></div>
              <div class="col-sm-10">
                <button class="btn btn-primary"><i class="fas fa-save"></i> Save change</button>
              </div>
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

