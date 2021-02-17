<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Submenu</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Submenu</li>
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
                <h3 class="card-title">Edit Submenu Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('menu/editsubmenu/' . $submenu['id']); ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="menu_id">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $submenu['title']; ?>" placeholder="Title name"  autocomplete="off" autofocus>
                    <?= form_error('title', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="menu">Menu</label>
                    <select class="custom-select rounded-0" id="menu" name="menu">
                      <option selected disabled>Choose menu</option>
                      <?php foreach($menu as $m) : ?>
                        <?php if($m['menu_id'] == $submenu['menu_id']) : ?>
                          <option selected value="<?= $m['menu_id']; ?>"><?= $m['menu']; ?></option>
                        <?php else : ?>
                          <option value="<?= $m['menu_id']; ?>"><?= $m['menu']; ?></option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="url">Url</label>
                      <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url']; ?>" placeholder="Url"  autocomplete="off" autofocus>
                      <?= form_error('url', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="icon">Icon</label>
                      <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon']; ?>" placeholder="Icon"  autocomplete="off" autofocus>
                      <?= form_error('icon', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <?php 
                          $checked = "";
                          if ($submenu['is_active'] == 1) {
                            $checked = "checked";
                          }else {
                            $checked = "";
                          }
                        ?>
                        <input type="checkbox" id="is_active" value="1" name="is_active" <?= $checked; ?>>
                        <label for="checkboxPrimary1">
                          Active?
                        </label>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                  <a href="<?= base_url('menu/submenu'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> back</a>
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