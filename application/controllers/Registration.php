<?php 
  class Registration extends CI_Controller
  {
    public function index()
    {
      defaultPage();
      $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[50]');
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
        'is_unique' => "Email already taken!"
      ]);
      $this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[4]|matches[pass2]', [
        'matches'   => "Password not matches!",
        'min_length'=> "Password too short!"
      ]);
      $this->form_validation->set_rules('pass2', 'Repeat Password', 'required|trim|matches[pass2]');

      if ($this->form_validation->run() == false) {
        $data['title']  = "Registration Page";
        $this->load->view('layouts/auth_header', $data);
        $this->load->view('auth/registration');
        $this->load->view('layouts/auth_footer');
      }else{
        $this->load->model('Registration_model');;
        $this->Registration_model->create();
        $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-check"></i> Alert!</h5>
              Your account has been registered. <strong>Please login.</strong>
            </div>
          ');
        redirect('auth');
      }
    }
  }
?>