<?php

class Leave extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('create_leave');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

}

?>