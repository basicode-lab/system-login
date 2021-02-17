<?php 
  class Auth extends CI_Controller
  { 
    public function index()
    {
      defaultPage();
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'required|trim');

      if ($this->form_validation->run() == false) {
        $data['title']  = "Login Page";
        $this->load->view('layouts/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('layouts/auth_footer');
      }else{
        $email    = $this->input->post('email');
        $password = $this->input->post('password');
        $this->load->model('Auth_model');
        $user = $this->Auth_model->checkUser($email, $password);
        if ($user) {
          if ($user['is_active'] == 1) {
            if (password_verify($password, $user['password'])) {
              $data = [
                'email'     => $user['email'],
                'status_id' => $user['status_id']
              ];
              $this->session->set_userdata($data);
              if ($user['status_id'] == 1) {
                redirect('admin');
              }else {
                redirect('user');
              }
            }else {
              $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Wrong password! Try again.
                </div>
              ');
              redirect('auth');
            }
          }else {
            $this->session->set_flashdata('message', '
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                Your account not actived! Please check again.
              </div>
              ');
            redirect('auth');
          }
        }else {
          $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              Your account not registered! Please register.
            </div>
            ');
          redirect('auth');
        }
      }
    }

    public function logout()
    {
      $data = [
        'email',
        'status_id'
      ];
      $this->session->unset_userdata($data);
      $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-check"></i> Alert!</h5>
          You have been logout.
        </div>
        ');
      redirect('auth');
    }

    public function blocked()
    {
      $this->load->view('auth/blocked');
    }
  }
?>