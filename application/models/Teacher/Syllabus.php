<?php

class Syllabus extends CI_Model {

    function create($data) { {
            $this->db->insert('create_syllabus', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('create_syllabus.id as iid,create_syllabus.*,create_medium.medium_name,create_class.class_name');
        $this->db->from('create_syllabus');
        $this->db->join('create_medium', 'create_syllabus.medium = create_medium.id');
        $this->db->join('create_class', 'create_syllabus.class_id = create_class.id');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from create_syllabus where id=" . $id);
        $users = $query->result_array();
        return $users;
    }

    public function get_medium() {
        $query = $this->db->query("SELECT id, medium_name from create_medium");
        return $query->result();
    }

    public function get_class() {
        $query = $this->db->query("SELECT id, class_name from create_class");
        return $query->result();
    }

    function update_syllabus($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('create_syllabus', $data1);
    }

    function delete_syllabus($id) {
        $this->db->where('id', $id);
        $this->db->delete('create_syllabus');
    }

    public function getcls($medium) {
        $query = $this->db->query("SELECT * FROM create_class where medium='" . $medium . "'");
        return $query->result();
    }

    public function fetch_class_id($id) {
        $query1 = $this->db->query("SELECT medium FROM create_syllabus where id=" . $id);
        $s = $query1->result();
        $query = $this->db->query("SELECT * FROM create_class where medium=" . $s[0]->medium);
        return $query->result();
    }

}
?>

