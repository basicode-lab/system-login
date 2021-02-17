<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Login</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login to start your session</p>

      <?php if(validation_errors()) : ?>
        <div class="alert alert-danger pb-0" role="alert">
          <?= validation_errors(); ?>
        </div>
      <?php endif; ?>
      <?= $this->session->flashdata('message'); ?>

      <form action="<?= base_url('auth'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>" autocomplete="off" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1 mx-auto">
        <a href="<?= base_url('registration'); ?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
