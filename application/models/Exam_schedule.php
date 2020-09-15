<?php

class Exam_schedule extends CI_Model {

    function create($data) { {
            $this->db->insert('exam_schedule', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('exam_schedule.id as iid,exam_schedule.*,create_medium.medium_name,create_class.class_name,create_subject.subject_name,create_exam.exam_name');
        $this->db->from('exam_schedule');
        $this->db->join('create_medium', 'exam_schedule.medium = create_medium.id');
        $this->db->join('create_class', 'exam_schedule.class_id = create_class.id');
        $this->db->join('create_subject', 'exam_schedule.subject_id = create_subject.id');
        $this->db->join('create_exam', 'exam_schedule.exam_id = create_exam.id');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from exam_schedule where id=" . $id);
        $users = $query->result_array();
        return $users;
    }

    public function get_medium() {
        $query = $this->db->query("SELECT id, medium_name from create_medium");
        return $query->result();
    }

    public function get_all_subject() {
        $query = $this->db->query("SELECT id, subject_name from create_subject");
        return $query->result();
    }

    public function get_class() {
        $query = $this->db->query("SELECT id, class_name from create_class");
        return $query->result();
    }

    public function get_exam() {
        $query = $this->db->query("SELECT id, exam_name from create_exam");
        return $query->result();
    }

    function update_exam_schedule($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('exam_schedule', $data1);
    }

    function delete_exam_schedule($id) {
        $this->db->where('id', $id);
        $this->db->delete('exam_schedule');
    }

    public function getcls($medium) {
        $query = $this->db->query("SELECT * FROM create_class where medium='" . $medium . "'");
        return $query->result();
    }

    public function getsub($class) {
        $query = $this->db->query("SELECT * FROM create_subject where class_id='" . $class . "'");
        return $query->result();
    }

    public function fetch_class_id($id) {
        $query1 = $this->db->query("SELECT medium FROM exam_schedule where id=" . $id);
        $s = $query1->result();
        $query = $this->db->query("SELECT * FROM create_class where medium=" . $s[0]->medium);
        return $query->result();
    }

    public function fetch_subject_id($id) {
        $query1 = $this->db->query("SELECT medium,subject_id FROM exam_schedule where id=" . $id);
        $s = $query1->result();
//        $query2 = $this->db->query("SELECT id FROM create_class where medium=" . $s[0]->medium);
//        $c = $query2->result();
        $query = $this->db->query("SELECT * FROM create_subject where class_id=" . $s[0]->subject_id);
        return $query->result();
//        return $this->db->last_query();
    }

}
?>

