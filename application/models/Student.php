<?php

class Student extends CI_Model {

    function create($data) { {
            $this->db->insert('student_master', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function get_class() {
        $query = $this->db->query("SELECT id, class_name from create_class");
        return $query->result();
    }

}

?>
