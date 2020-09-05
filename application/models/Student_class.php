<?php

class Student_class extends CI_Model {

    function create($data) { {
            $this->db->insert('create_class', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('create_class.id as iid,create_class.*,create_medium.medium_name');
        $this->db->from('create_class');
        $this->db->join('create_medium', 'create_class.medium = create_medium.id');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT id,medium,class_name from create_class where id=" . $id);
        $users = $query->result_array();
        return $users;
    }

    public function get_medium() {
        $query = $this->db->query("SELECT id, medium_name from create_medium");
        return $query->result();
    }

    function update_class($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('create_class', $data1);
    }

    function delete_class($id) {
        $this->db->where('id', $id);
        $this->db->delete('create_class');
    }

}
?>

