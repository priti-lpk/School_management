<?php

class Teacher_detail extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('teacher_master');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

}

?>