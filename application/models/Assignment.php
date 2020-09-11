<?php

class Assignment extends CI_Model {

    function create($data) { {
            $this->db->insert('create_assignment', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('create_assignment.id as iid,create_assignment.*,create_medium.medium_name,create_class.class_name,create_subject.subject_name');
        $this->db->from('create_assignment');
        $this->db->join('create_medium', 'create_assignment.medium = create_medium.id');
        $this->db->join('create_class', 'create_assignment.class_id = create_class.id');
        $this->db->join('create_subject', 'create_assignment.subject_id = create_subject.id');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from create_assignment where id=" . $id);
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

    function update_assignment($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('create_assignment', $data1);
    }

    function delete_assignment($id) {
        $this->db->where('id', $id);
        $this->db->delete('create_assignment');
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
        $query1 = $this->db->query("SELECT medium FROM create_assignment where id=" . $id);
        $s = $query1->result();
        $query = $this->db->query("SELECT * FROM create_class where medium=" . $s[0]->medium);
        return $query->result();
    }

    public function fetch_subject_id($id) {
        $query1 = $this->db->query("SELECT medium FROM create_assignment where id=" . $id);
        $s = $query1->result();
        $query2 = $this->db->query("SELECT id FROM create_class where medium=" . $s[0]->medium);
        $c = $query2->result();
        $query = $this->db->query("SELECT * FROM create_subject where class_id=" . $c[0]->id);
        return $query->result();
    }

}
?>

