<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url('assets/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Sistem Login</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-0 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/img/' . $user['image']); ?>" class=" elevation-2" alt="User Image">
      </div>
      <div class="info">
        <small class="text-light d-inline-block"><?= $user['name']; ?></small>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <?php 
          $status_id  = $this->session->userdata('status_id');
          $queryMenu  = "SELECT user_menu.menu_id, menu
                          FROM user_menu JOIN user_access_menu
                            ON user_menu.menu_id = user_access_menu.menu_id
                          WHERE user_access_menu.status_id = $status_id
                        ORDER BY user_access_menu.menu_id ASC
                        ";
          $menu = $this->db->query($queryMenu)->result_array();
        ?>
        <?php foreach($menu as $m) : ?>
          <li class="nav-header pl-2 pt-2">
            <?= $m['menu']; ?>
          </li>

          <?php 
            $menu_id = $m['menu_id'];
            $querySubMenu = "SELECT * FROM user_sub_menu WHERE menu_id = $menu_id
                              AND user_sub_menu.is_active = 1";
            $subMenu  = $this->db->query($querySubMenu)->result_array();
          ?>
          <?php foreach($subMenu as $sm) : ?>
            <li class="nav-item">
              <?php if($title == $sm['title']) : ?>
                <a href="<?= base_url('/') . $sm['url']; ?>" class="nav-link active">
                <?php else : ?>
                  <a href="<?= base_url('/') . $sm['url']; ?>" class="nav-link">
              <?php endif; ?>
                <i class="<?= $sm['icon']; ?>"></i>
                <p>
                  <?= $sm['title']; ?>
                </p>
              </a>
            </li>
          <?php endforeach; ?>
          <div class="user-panel"></div>
        <?php endforeach; ?>

        <li class="nav-item mt-2">
          <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>