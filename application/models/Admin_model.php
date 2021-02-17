<?php 
  class Admin_model extends CI_Model 
  {
    public function getDataSession($email)
    {
      return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function getStatus()
    {
      return $this->db->get('user_status')->result_array();
    }

    public function getStatusId($id)
    {
      return $this->db->get_where('user_status', ['status_id' => $id])->row_array();
    }

    public function getMenu()
    {
      $this->db->where('menu_id !=', 1);
      return $this->db->get('user_menu')->result_array();
    }

    public function addStatus()
    {
      $data = [
        'status_id' => $this->input->post('status_id'),
        'status' => $this->input->post('status')
      ];
      return $this->db->insert('user_status', $data);
    }

    public function deleteStatus($status_id)
    {
      return $this->db->delete('user_status', ['status_id' => $status_id]);
    }
  }
?>