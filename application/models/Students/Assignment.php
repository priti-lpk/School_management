<?php

class Assignment extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('student_master');
        $this->db->where('username=', $this->session->userdata('username'));
        $users = $this->db->get()->row_array();
        $this->db->select('*');
        $this->db->from('create_assignment');
        $this->db->join('create_subject', 'create_assignment.subject_id=create_subject.id');
        $this->db->join('teacher_master', 'create_subject.teacher_id=teacher_master.id');
        $this->db->where('create_assignment.medium=', $users['medium']);
        $this->db->where('create_assignment.class_id=', $users['class_id']);
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

}

?>