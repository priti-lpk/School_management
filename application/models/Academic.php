<?php

class Academic extends CI_Model {

    function create($data) { {
            $this->db->insert('academic_year', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('*');
        $this->db->from('academic_year');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from academic_year where id=" . $id);
        $users = $query->result_array();
        return $users;
    }

    function update_academic($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('academic_year', $data1);
    }

    function delete_academic($id) {
        $this->db->where('id', $id);
        $this->db->delete('academic_year');
    }

}
?>

