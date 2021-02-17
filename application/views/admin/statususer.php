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
        <div class="col-lg">
          <!-- Do here -->
          <div class="card">
            <div class="card-header">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fas fa-plus"></i> Add new Status user
              </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?= $this->session->flashdata('message'); ?>
              <?php if(validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  <?= validation_errors(); ?>
                </div>
              <?php endif; ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Status</th>
                    <th style="width: 350px; text-align: center;">Action</th>
                  </tr>
                </thead>
                <?php 
                  $i = 1;
                  foreach ($status as $s) :
                ?>
                  <tbody>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $s['status']; ?></td>
                      <td style="text-align: center;">
                        <a href="<?= base_url('admin/changeaccess/' . $s['status_id']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-cogs"></i> Access</a>
                        <a href="<?= base_url('admin/statusdelete/' . $s['status_id']); ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure delete this menu?');"><i class="fas fa-trash-alt"></i> Delete</a>
                      </td>
                    </tr>
                  </tbody>
                <?php endforeach; ?>
                </table>
              </div>
              <!-- /.card-body -->
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/addstatus'); ?>" method="post">
          <div class="mb-3">
            <input class="form-control" type="text" placeholder="Status ID" name="status_id" aria-label="default input example">
          </div>
          <div class="mb-3">
            <input class="form-control" type="text" placeholder="Status name" name="status" aria-label="default input example">
          </div>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>