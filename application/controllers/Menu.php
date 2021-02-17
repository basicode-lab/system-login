<?php 
  class Menu extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Menu_model');
      checkUserLogin();
    }
    
    public function index()
    {
      $data['title']  = "Menu management";
      // get session login
      $sEmail = $this->session->userdata('email');
      $data['user']   = $this->Menu_model->getDataSession($sEmail);
      $data['menu']   = $this->Menu_model->getMenu();
      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/topbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('layouts/footer');
    }

    public function addmenu()
    {
      $sEmail = $this->session->userdata('email');
      $data['user']   = $this->Menu_model->getDataSession($sEmail);

      $this->form_validation->set_rules('menu_id', 'Menu ID', 'required|numeric|is_unique[user_menu.menu_id]', [
        'is_unique' => "Menu ID already exist!"
      ]);
      $this->form_validation->set_rules('menu', 'Menu name', 'required|trim');
      if ($this->form_validation->run() == false) {
        $data['title']  = "Menu management";
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar');
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('menu/addmenu');
        $this->load->view('layouts/footer');
      }else {
        $this->Menu_model->addData();
        $this->session->set_flashdata('message', '
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            Menu has been added.
          </div>
        ');
        redirect('menu');
      }
    }

    public function delete($menu_id)
    {
      $this->Menu_model->deleteMenu($menu_id);
      $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-check"></i> Alert!</h5>
          Menu has been deleted.
        </div>
      ');
      redirect('menu');
    }

    public function editmenu($menu_id)
    {
      $sEmail = $this->session->userdata('email');
      $data['user']   = $this->Menu_model->getDataSession($sEmail);
      $data['menu']   = $this->Menu_model->getDataWhereId($menu_id);
      $this->form_validation->set_rules('menu_id', 'Menu ID', 'required|numeric|is_unique[user_menu.menu_id]', [
        'is_unique' => "Menu ID already exist"
      ]);
      $this->form_validation->set_rules('menu', 'Menu name', 'required|trim');
      if ($this->form_validation->run() == false) {
          $data['title']  = "Menu management";
          $this->load->view('layouts/header', $data);
          $this->load->view('layouts/topbar');
          $this->load->view('layouts/sidebar', $data);
          $this->load->view('menu/editmenu', $data);
          $this->load->view('layouts/footer');
      }else {
        $this->Menu_model->editData($menu_id);
        $this->session->set_flashdata('message', '
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            Menu has been change.
          </div>
        ');
        redirect('menu');
      }
    }

    public function submenu()
    {
      $sEmail = $this->session->userdata('email');
      $data['user']   = $this->Menu_model->getDataSession($sEmail);
      $data['submenu']= $this->Menu_model->getSubmenu();
      $data['title']  = "Submenu management";
      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/topbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('layouts/footer');
    }

    public function addsubmenu()
    {
      $sEmail = $this->session->userdata('email');
      $data['user']   = $this->Menu_model->getDataSession($sEmail);
      $data['menu']   = $this->Menu_model->getMenu();

      $this->form_validation->set_rules('title', 'Submenu', 'required|trim');
      $this->form_validation->set_rules('url', 'Url', 'required|trim');
      $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
      if ($this->form_validation->run() == false) {
        $data['title']  = "Submenu management";
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar');
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('menu/addsubmenu', $data);
        $this->load->view('layouts/footer');
      }else {
        $this->Menu_model->addDataSubMenu();
        $this->session->set_flashdata('message', '
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            Submenu has been added.
          </div>
        ');
        redirect('menu/submenu');
      }
    }

    public function deletesubmenu($id)
    {
      $this->Menu_model->deleteSubmenu($id);
      $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-check"></i> Alert!</h5>
          Submenu has been deleted.
        </div>
      ');
      redirect('menu/submenu');
    }

    public function editsubmenu($id)
    {
      $sEmail = $this->session->userdata('email');
      $data['user']   = $this->Menu_model->getDataSession($sEmail);
      $data['submenu'] = $this->Menu_model->getSubmenuId($id);
      $data['menu'] = $this->Menu_model->getMenu();
      $this->form_validation->set_rules('title', 'Submenu', 'required|trim');
      $this->form_validation->set_rules('url', 'Url', 'required|trim');
      $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
      if ($this->form_validation->run() == false) {
        $data['title']  = "Submenu management";
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar');
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('menu/editsubmenu', $data);
        $this->load->view('layouts/footer');
      }else {
        $this->Menu_model->editDataSubMenu($id);
        $this->session->set_flashdata('message', '
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            Submenu has been change.
          </div>
        ');
        redirect('menu/submenu');
      }
    }
  }
?>