<?php 
  class Auth_model extends CI_Model
  {
    public function checkUser($email)
    {
      return $this->db->get_where('user', ['email' => $email])->row_array();
    }
  }
?>