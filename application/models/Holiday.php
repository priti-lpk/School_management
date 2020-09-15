<?php

class Holiday extends CI_Model {

    function create($data) { {
            $this->db->insert('create_holiday', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('*');
        $this->db->from('create_holiday');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from create_holiday where id=" . $id);
        $users = $query->result_array();
        return $users;
    }

    function update_holiday($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('create_holiday', $data1);
    }

    function delete_holiday($id) {
        $this->db->where('id', $id);
        $this->db->delete('create_holiday');
    }

}
?>

