<?php

class Holiday extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('create_holiday');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

}

?>