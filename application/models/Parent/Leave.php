<?php

class Leave extends CI_Model {

    function create($data) { {
            $this->db->insert('create_leave', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('*');
        $this->db->from('create_leave');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from create_leave where id=" . $id);
        $users = $query->result_array();
        return $users;
    }

    function update_leave($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('create_leave', $data1);
    }

    function delete_leave($id) {
        $this->db->where('id', $id);
        $this->db->delete('create_leave');
    }

}
?>

