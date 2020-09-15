<?php

class Question_level extends CI_Model {

    function create($data) { {
            $this->db->insert('question_level', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function all() {
        $this->db->select('*');
        $this->db->from('question_level');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function edit_id($id) {
        $query = $this->db->query("SELECT * from question_level where id=" . $id);
        $users = $query->result_array();
        return $users;
    }

    function update_question_level($id, $data1) {
        $this->db->where('id', $id);
        $this->db->update('question_level', $data1);
    }

    function delete_question_level($id) {
        $this->db->where('id', $id);
        $this->db->delete('question_level');
    }

}
?>

