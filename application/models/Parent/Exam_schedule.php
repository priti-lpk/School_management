<?php

class Exam_schedule extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('parents_master');
        $this->db->where('username=', $this->session->userdata('username'));
        $users1 = $this->db->get()->row_array();
        $this->db->select('*');
        $this->db->from('student_master');
        $this->db->where('id=', $users1['s_id']);
        $users = $this->db->get()->row_array();
        $this->db->select('*');
        $this->db->from('exam_schedule');
        $this->db->join('create_exam', 'exam_schedule.exam_id=create_exam.id');
        $this->db->join('create_subject', 'exam_schedule.subject_id=create_subject.id');
        $this->db->where('exam_schedule.medium=', $users['medium']);
        $this->db->where('exam_schedule.class_id=', $users['class_id']);
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

}

?>