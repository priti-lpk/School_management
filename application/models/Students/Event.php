<?php

class Event extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('create_event');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

}

?>