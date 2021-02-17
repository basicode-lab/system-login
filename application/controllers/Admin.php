<?php 
  class Admin extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Admin_model');
      checkUserLogin();
    }
    
    public function index()
    {
      $data['title']  = "Dashboard";
      // get session login
      $sEmail = $this->session->userdata('email');
      $data['user']   = $this->Admin_model->getDataSession($sEmail);

      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/topbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('admin/index', $data);
      $this->load->view('layouts/footer');
    }

    public function status()
    {
      $data['title']  = "Status user";
      // get session login
      $sEmail = $this->session->userdata('email');
      $data['user']   = $this->Admin_model->getDataSession($sEmail);
      $data['status'] = $this->Admin_model->getStatus();
      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/topbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('admin/statususer', $data);
      $this->load->view('layouts/footer');
    }
    
    public function changeaccess($id)
    {
      $data['title']  = "Status user";
      // get session login
      $sEmail = $this->session->userdata('email');
      $data['user']   = $this->Admin_model->getDataSession($sEmail);
      $this->load->model('Menu_model');
      $data['menu']   = $this->Admin_model->getMenu();
      $data['status'] = $this->Admin_model->getStatusId($id);
      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/topbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('admin/changeaccess', $data);
      $this->load->view('layouts/footer');
    }
    
    public function changeuseraccess()
    {
      $status_id = $this->input->post('statusID');
      $menu_id   = $this->input->post('menuID');
      $data = [
        'status_id' => $status_id,
        'menu_id'   => $menu_id
      ];
      $changeAccess = $this->db->get_where('user_access_menu', $data);
      if ($changeAccess->num_rows() < 1) {
        $this->db->insert('user_access_menu', $data);
      }else {
        $this->db->delete('user_access_menu', $data);
      }
    }
    
    public function addstatus()
    {
      $data['title']  = "Status user";
      // get session login
      $sEmail = $this->session->userdata('email');
      $data['user']   = $this->Admin_model->getDataSession($sEmail);
      $data['status'] = $this->Admin_model->getStatus();
      
      $this->form_validation->set_rules('status', 'Status name', 'required|trim');
      $this->form_validation->set_rules('status_id', 'Status ID', 'required|trim|is_unique[user_status.status_id]', [
        'is_unique' => 'Status ID already exist!'
      ]);
      if ($this->form_validation->run() == false) {
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar');
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('admin/statususer', $data);
        $this->load->view('layouts/footer');
      }else {
        $this->Admin_model->addStatus();
        $this->session->set_flashdata('message', '
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            Status has been added
          </div>
        ');
        redirect('admin/status');
      }
    }
    public function statusdelete($status_id)
    {
      $this->Admin_model->deleteStatus($status_id);
      $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-check"></i> Alert!</h5>
          Status has been deleted.
        </div>
      ');
      redirect('admin/status');
    }
  }
?>