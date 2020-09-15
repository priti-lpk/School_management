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

}
?>

