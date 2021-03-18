<?php

class Student_detail extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('student_master');
        $this->db->where('username=', $this->session->userdata('username'));
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

}

?>