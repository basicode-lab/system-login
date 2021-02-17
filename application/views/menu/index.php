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
              <a href="<?= base_url('menu/addmenu'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Add new menu</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?= $this->session->flashdata('message'); ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Menu</th>
                    <th style="width: 350px; text-align: center;">Action</th>
                  </tr>
                </thead>
                <?php 
                  $i = 1;
                  foreach ($menu as $m) :
                ?>
                  <tbody>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $m['menu']; ?></td>
                      <td style="text-align: center;">
                        <a href="<?= base_url('menu/editmenu/' . $m['menu_id']); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <a href="<?= base_url('menu/delete/' . $m['menu_id']); ?>" class="btn btn-danger btn-sm"
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