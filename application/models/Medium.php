<?php

class Medium extends CI_Model {

    function create($data) { {
            $this->db->insert('create_medium', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('*');
        $this->db->from('create_medium');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT id,medium_name from create_medium where id=" . $id);
        $users = $query->result_array();
        return $users;
    }

    function update_medium($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('create_medium', $data1);
    }

    function delete_medium($id) {
        $this->db->where('id', $id);
        $this->db->delete('create_medium');
    }

}
?>

