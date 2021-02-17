<?php 
  function checkUserLogin()
  {
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
      redirect('auth');
    }else {
      $status_id  = $ci->session->userdata('status_id');
      $menu       = $ci->uri->segment(1);
      $queryMenu  = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
      $menu_id    = $queryMenu['menu_id'];
      $queryAccess= $ci->db->get_where('user_access_menu', ['status_id' => $status_id, 'menu_id' => $menu_id]);
      if ($queryAccess->num_rows() < 1) {
        redirect('auth/blocked');
      }
    }
  }

  function defaultPage()
  {
    $ci = get_instance();
    if ($ci->session->userdata('status_id') == 1) {
      redirect('admin');
    }elseif ($ci->session->userdata('status_id') == 2) {
      redirect('user');
    }
  }

  function checked($status_id, $menu_id)
  {
    $ci = get_instance();
    $access = $ci->db->get_where('user_access_menu', ['status_id' => $status_id, 'menu_id' => $menu_id])->result_array();
    if ($access) {
      return "checked";
    }
  }
?>