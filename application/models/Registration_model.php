<?php 
  class Registration_model extends CI_Model
  {
    public function create()
    {
      $data = [
        'name'          => htmlspecialchars($this->input->post('name'), true),
        'email'         => htmlspecialchars($this->input->post('email'), true),
        'image'         => "default.png",
        'password'      => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
        'status_id'     => 2,
        'is_active'     => 1,
        'date_created'  => time()
      ];
      return $this->db->insert('user', $data);
    }
  }
?>