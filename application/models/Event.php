<?php

class Event extends CI_Model {

    function create($data) { {
            $this->db->insert('create_event', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('*');
        $this->db->from('create_event');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from create_event where id=" . $id);
        $users = $query->result_array();
        return $users;
    }

    function update_event($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('create_event', $data1);
    }

    function delete_event($id) {
        $this->db->where('id', $id);
        $this->db->delete('create_event');
    }

}
?>

