<?php

class Subject extends CI_Model {

    function create($data) { {
            $this->db->insert('create_subject', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('create_subject.id as iid,create_subject.*,create_medium.medium_name,create_class.class_name,teacher_master.t_fname,teacher_master.t_lastname');
        $this->db->from('create_subject');
        $this->db->join('create_medium', 'create_subject.medium = create_medium.id');
        $this->db->join('create_class', 'create_subject.class_id = create_class.id');
        $this->db->join('teacher_master', 'create_subject.teacher_id = teacher_master.id');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from create_subject where id=" . $id);
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

    public function get_teacher() {
        $query = $this->db->query("SELECT id, t_fname,t_lastname from teacher_master");
        return $query->result();
    }

    function update_subject($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('create_subject', $data1);
    }

    function delete_subject($id) {
        $this->db->where('id', $id);
        $this->db->delete('create_subject');
    }

    public function getcls($medium) {
        $query = $this->db->query("SELECT * FROM create_class where medium='" . $medium . "'");
        return $query->result();
    }

    public function fetch_class_id($id) {
        $query1 = $this->db->query("SELECT medium FROM create_subject where id=" . $id);
        $s = $query1->result();
        $query = $this->db->query("SELECT * FROM create_class where medium=" . $s[0]->medium);
        return $query->result();
    }

}
?>

