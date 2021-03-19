<?php

class Routine extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('student_master');
        $this->db->where('username=', $this->session->userdata('username'));
        $users = $this->db->get()->row_array();
        $this->db->select('*');
        $this->db->from('create_routine');
        $this->db->where('create_routine.medium=', $users['medium']);
        $this->db->where('create_routine.class_id=', $users['class_id']);
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

}

?>