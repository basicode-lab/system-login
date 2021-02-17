<?php 
  class User extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('User_model');
      checkUserLogin();
    }
    
    public function index()
    {
      $data['title']  = "My Profile";
      // get session login
      $sEmail = $this->session->userdata('email');
      $data['user']   = $this->User_model->getDataSession($sEmail);

      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/topbar');
      $this->load->view('layouts/sidebar', $data);
      $this->load->view('user/index', $data);
      $this->load->view('layouts/footer');
    }

    public function editprofile()
    {
      $data['title']  = "Edit Profile";
      // get session login
      $sEmail = $this->session->userdata('email');
      $data['user']   = $this->User_model->getDataSession($sEmail);

      $this->form_validation->set_rules('name', 'Full name', 'required|trim');
      if ($this->form_validation->run() == false) {
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar');
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('user/editprofile', $data);
        $this->load->view('layouts/footer');
      }else {
        $email = $this->input->post('email');
        $name  = $this->input->post('name');

        // If any image uploaded
        $image = $_FILES['image']['name'];
        if ($image) {
          $config['upload_path']  = './assets/img/';
          $config['allowed_types']= 'png|jpeg|jpg';
          $config['max_size']     = 1024;
          $config['file_ext_tolower'] = TRUE;
          $this->load->library('upload', $config);

          if ($this->upload->do_upload('image')) {
            $oldImage = $data['user']['image'];
            if ($oldImage != 'default.png') {
              unlink(FCPATH . 'assets/img/' . $oldImage);
            }
            $newImage = $this->upload->data('file_name');
            $this->db->set('image', $newImage); 
          }else {
            $this->session->set_flashdata('message', '
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                '.$this->upload->display_errors().'
              </div>
              ');
            redirect('user');
          }
        }

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('user');
        $this->session->set_flashdata('message', '
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            Profile updated.
          </div>
          ');
        redirect('user');
      }
    }

    public function changepassword()
    {
      $data['title']  = "Change password";
      // get session login
      $sEmail = $this->session->userdata('email');
      $data['user']   = $this->User_model->getDataSession($sEmail);

      $this->form_validation->set_rules('current_password', 'Current password', 'required|trim');
      $this->form_validation->set_rules('pass1', 'New password', 'required|trim|min_length[4]|matches[pass2]');
      $this->form_validation->set_rules('pass2', 'Repeat password', 'required|trim|min_length[4]|matches[pass1]');
      if ($this->form_validation->run() == false) {
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/topbar');
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('user/changepassword', $data);
        $this->load->view('layouts/footer');
      }else {
        $current_password = $this->input->post('current_password');
        $new_password     = $this->input->post('pass1');
        if (!password_verify($current_password, $data['user']['password'])) {
          $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              Wrong current password.
            </div>
            ');
          redirect('user/changepassword');
        }else {
          if ($new_password == $current_password) {
            $this->session->set_flashdata('message', '
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                Password cannot be same with current password
              </div>
              ');
            redirect('user/changepassword');
          }else {
            $hash_password = password_hash($new_password, PASSWORD_DEFAULT);
            $this->User_model->changePass($hash_password);
            $this->session->set_flashdata('message', '
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                Your password has been changed.
              </div>
              ');
            redirect('user/changepassword');
          }
        }
      }
    }
  }
?>