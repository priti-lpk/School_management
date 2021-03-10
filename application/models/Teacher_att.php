<?php

class Teacher_att extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('create_medium');
        $users2 = $this->db->get()->result_array();
        return $users2;
    }

    public function fetch_teacher() {
        $query = $this->db->query("SELECT * FROM `teacher_master`");
        return $query->result_array();
//        return $this->db->last_query();
    }


}
?>

