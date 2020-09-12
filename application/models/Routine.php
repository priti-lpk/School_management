<?php

class Routine extends CI_Model {

    function create($data) { {
            $this->db->insert('create_routine', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('create_routine.id as iid,create_routine.*,create_medium.medium_name,create_class.class_name');
        $this->db->from('create_routine');
        $this->db->join('create_medium', 'create_routine.medium = create_medium.id');
        $this->db->join('create_class', 'create_routine.class_id = create_class.id');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from create_routine where id=" . $id);
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

    function update_routine($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('create_routine', $data1);
    }

    function delete_routine($id) {
        $this->db->where('id', $id);
        $this->db->delete('create_routine');
    }

    public function getcls($medium) {
        $query = $this->db->query("SELECT * FROM create_class where medium='" . $medium . "'");
        return $query->result();
    }

    public function fetch_class_id($id) {
        $query1 = $this->db->query("SELECT medium FROM create_routine where id=" . $id);
        $s = $query1->result();
        $query = $this->db->query("SELECT * FROM create_class where medium=" . $s[0]->medium);
        return $query->result();
    }

}
?>

