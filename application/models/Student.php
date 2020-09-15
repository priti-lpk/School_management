<?php

class Student extends CI_Model {

    function create($data) { {
            $this->db->insert('student_master', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('student_master.id as iid,student_master.*,create_medium.medium_name,create_class.class_name,create_section.section_name');
        $this->db->from('student_master');
        $this->db->join('create_medium', 'student_master.medium = create_medium.id');
        $this->db->join('create_class', 'student_master.class_id = create_class.id');
        $this->db->join('create_section', 'student_master.section_id = create_section.id');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from student_master where id=" . $id);
        $users = $query->result_array();
        return $users;
    }

    public function get_medium() {
        $query = $this->db->query("SELECT id, medium_name from create_medium");
        return $query->result();
    }

    public function get_section() {
        $query = $this->db->query("SELECT id, section_name from create_section");
        return $query->result();
    }

    public function get_class() {
        $query = $this->db->query("SELECT id, class_name from create_class");
        return $query->result();
    }

    function update_student($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('student_master', $data1);
    }

    function delete_student($id) {
        $this->db->where('id', $id);
        $this->db->delete('student_master');
    }

    public function getcls($medium) {
        $query = $this->db->query("SELECT * FROM create_class where medium='" . $medium . "'");
        return $query->result();
    }

    public function getsub($class) {
        $query = $this->db->query("SELECT * FROM create_section where class_id='" . $class . "'");
        return $query->result();
    }

    public function fetch_class_id($id) {
        $query1 = $this->db->query("SELECT medium FROM student_master where id=" . $id);
        $s = $query1->result();
        $query = $this->db->query("SELECT * FROM create_class where medium=" . $s[0]->medium);
        return $query->result();
    }

    public function fetch_section_id($id) {
        $query1 = $this->db->query("SELECT medium,class_id FROM create_section where id=" . $id);
        $s = $query1->result();
//        $query2 = $this->db->query("SELECT id FROM create_class where medium=" . $s[0]->medium);
//        $c = $query2->result();
        $query = $this->db->query("SELECT * FROM student_master where class_id=" . $s[0]->class_id);
        return $query->result();
//        return $this->db->last_query();
    }

}
?>

