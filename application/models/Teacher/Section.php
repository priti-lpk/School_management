<?php

class Section extends CI_Model {

    function create($data) { {
            $this->db->insert('create_section', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('create_section.id as iid,create_section.*,create_medium.medium_name,create_class.class_name,teacher_master.t_fname,teacher_master.t_lastname');
        $this->db->from('create_section');
        $this->db->join('create_medium', 'create_section.medium = create_medium.id');
        $this->db->join('create_class', 'create_section.class_id = create_class.id');
        $this->db->join('teacher_master', 'create_section.teacher_id = teacher_master.id');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from create_section where id=" . $id);
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

    function update_section($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('create_section', $data1);
    }

    function delete_section($id) {
        $this->db->where('id', $id);
        $this->db->delete('create_section');
    }

    public function getcls($medium) {
        $query = $this->db->query("SELECT * FROM create_class where medium='" . $medium . "'");
        return $query->result();
    }

    public function fetch_class_id($id) {
        $query1 = $this->db->query("SELECT medium FROM create_section where id=" . $id);
        $s = $query1->result();
        $query = $this->db->query("SELECT * FROM create_class where medium=" . $s[0]->medium);
        return $this->db->last_query();

//        return $query->result();
    }

}
?>

