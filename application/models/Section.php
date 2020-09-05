<?php

class Section extends CI_Model {

    function create($data) { {
            $this->db->insert('create_section', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('*');
        $this->db->from('create_section');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT id,medium,class_id,section_name from create_section where id=" . $id);
        $users = $query->result_array();
        return $users;
    }

    public function get_medium() {
        $query = $this->db->query("SELECT id, medium_name from create_medium");
        return $query->result();
    }

    function update_medium($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('create_section', $data1);
    }

    function delete_medium($id) {
        $this->db->where('id', $id);
        $this->db->delete('create_section');
    }

}
?>

