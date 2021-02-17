<?php 
  class Menu_model extends CI_Model
  {
    public function getDataSession($email)
    {
      return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function getMenu()
    {
      return $this->db->get('user_menu')->result_array();
    }

    public function addData()
    {
      $data = [
        'menu_id' => $this->input->post('menu_id'),
        'menu' => $this->input->post('menu')
      ];
      return $this->db->insert('user_menu', $data);
    }

    public function deleteMenu($menu_id)
    {
      return $this->db->delete('user_menu', ['menu_id' => $menu_id]);
    }

    public function getDataWhereId($menu_id)
    {
      return $this->db->get_where('user_menu', ['menu_id' => $menu_id])->row_array();
    }

    public function editData($menu_id)
    {
      $data = [
        'menu_id' => $this->input->post('menu_id'),
        'menu'    => $this->input->post('menu')
      ];
      $this->db->set($data);
      $this->db->where('menu_id', $menu_id);
      return $this->db->update('user_menu');
    }

    public function getSubmenu()
    {
      $querySubmenu = "SELECT user_sub_menu.*, user_menu.menu
                        FROM user_sub_menu JOIN user_menu
                          ON user_sub_menu.menu_id = user_menu.menu_id";
      return $this->db->query($querySubmenu)->result_array();
    }

    public function addDataSubMenu()
    {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];
      if ($data['is_active'] == NULL) {
        $data['is_active']  = 0;
      }
      if ($data['menu_id'] == NULL) {
        $data['menu_id'] = 3;
      }
      return $this->db->insert('user_sub_menu', $data);
    }

    public function deleteSubmenu($id)
    {
      return $this->db->delete('user_sub_menu', ['id' => $id]);
    }

    public function getSubmenuId($id)
    {
      return $this->db->get_where('user_sub_menu', ['id'=>$id])->row_array();
    }

    public function editDataSubMenu($id)
    {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];
      $this->db->set($data);
      $this->db->where('id', $id);
      return $this->db->update('user_sub_menu');
    }
  }
?>