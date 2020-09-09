<?php

class Teacher extends CI_Model {

    function create($data) { {
            $this->db->insert('teacher_master', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('*');
        $this->db->from('teacher_master');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from teacher_master where id=" . $id);
        $users = $query->result_array();
        return $users;
    }

    function update_teacher($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('teacher_master', $data1);
    }

    function delete_teacher($id) {
        $this->db->where('id', $id);
        $this->db->delete('teacher_master');
    }

}
?>

