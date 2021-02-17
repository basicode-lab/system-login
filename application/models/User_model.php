<?php 
  class User_model extends CI_Model
  {
    public function getDataSession($sEmail)
    {
      return $this->db->get_where('user', ['email' => $sEmail])->row_array();
    }

    public function changePass($pass_hash)
    {
      $this->db->set('password', $pass_hash);
      $this->db->where('email', $this->session->userdata('email'));
      return $this->db->update('user');
    }
  }
?>