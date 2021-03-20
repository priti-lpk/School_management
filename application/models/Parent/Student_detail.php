<?php

class Student_detail extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('parents_master');
        $this->db->where('username=', $this->session->userdata('username'));
        $users = $this->db->get()->row_array();
        $this->db->select('*');
        $this->db->from('student_master');
        $this->db->where('id=', $users['s_id']);
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

}

?>