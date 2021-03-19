<?php

class Syllabus extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('student_master');
        $this->db->where('username=', $this->session->userdata('username'));
        $users = $this->db->get()->row_array();
        $this->db->select('*');
        $this->db->from('create_syllabus');
        $this->db->join('create_class','create_syllabus.class_id=create_class.id');
        $this->db->where('create_syllabus.medium=', $users['medium']);
        $this->db->where('create_syllabus.class_id=', $users['class_id']);
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

}

?>