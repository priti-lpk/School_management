<?php

class Parents extends CI_Model {

    function create($data) { {
            $this->db->insert('parents_master', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('*');
        $this->db->from('parents_master');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from parents_master where id=" . $id);
        $users = $query->result_array();
        return $users;
    }

    function update_parents($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('parents_master', $data1);
    }

    function delete_parents($id) {
        $this->db->where('id', $id);
        $this->db->delete('parents_master');
    }

    public function get_medium() {
        $query = $this->db->query("SELECT id, medium_name from create_medium");
        return $query->result();
    }

    public function get_student() {
        $query = $this->db->query("SELECT id, s_surname,s_name,s_fathername from student_master");
        return $query->result();
    }

    public function get_class() {
        $query = $this->db->query("SELECT id, class_name from create_class");
        return $query->result();
    }

    public function getcls($medium) {
        $query = $this->db->query("SELECT * FROM create_class where medium='" . $medium . "'");
        return $query->result();
    }

    public function getsub($class) {
        $query = $this->db->query("SELECT * FROM student_master where class_id='" . $class . "'");
        return $query->result_array();
    }

    public function fetch_class_id($id) {
        $query1 = $this->db->query("SELECT medium FROM student_master where id=" . $id);
        $s = $query1->result();
        $query = $this->db->query("SELECT * FROM create_class where medium=" . $s[0]->medium);
        return $query->result();
    }

    public function fetch_stu_id($id) {
        $query = $this->db->query("SELECT * FROM parents_master where id=" . $id . "");
        $s = $query->result();
        $query1 = $this->db->query("SELECT * FROM student_master where medium=" . $s[0]->medium . " and class_id=" . $s[0]->class_id . "");
        return $query1->result();
    }

}
?>

