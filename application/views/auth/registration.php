<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Registration</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>
      <?php if(validation_errors()) : ?>
        <!-- <div class="alert alert-danger pb-0" role="alert">
          </div> -->
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            <?= validation_errors(); ?>
          </div>
      <?php endif; ?>
      <form action="<?= base_url('registration'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" value="<?= set_value('name'); ?>" placeholder="Full name" autocomplete="off" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="email" value="<?= set_value('email'); ?>" placeholder="Email" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="pass1" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="pass2" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          <!-- /.col -->
        </div>
      </form>

      <a href="<?= base_url('auth'); ?>" class="text-center pb-2">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
