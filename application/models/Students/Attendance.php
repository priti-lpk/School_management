<?php

class Attendance extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('student_master');
        $this->db->where('username=', $this->session->userdata('username'));
        $users = $this->db->get()->row_array();
//        return $this->db->last_query();
        $this->db->select('*');
        $this->db->from('create_subject');
        $this->db->join('teacher_master','create_subject.teacher_id=teacher_master.id');
        $this->db->where('medium=', $users['medium']);
        $this->db->where('class_id=', $users['class_id']);
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

}

?>