<?php

class Exam_instruction extends CI_Model {

    function create($data) { {
            $this->db->insert('exam_instruction', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('*');
        $this->db->from('exam_instruction');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from exam_instruction where id=" . $id);
        $users = $query->result_array();
        return $users;
    }

    function update_exam_instruction($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('exam_instruction', $data1);
    }

    function delete_exam_instruction($id) {
        $this->db->where('id', $id);
        $this->db->delete('exam_instruction');
    }

}
?>

