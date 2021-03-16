<?php

class Student_att extends CI_Model {

    public function fetch_student($medium, $class_id, $section_id) {
        $query = $this->db->query("SELECT student_master.* FROM `student_master` INNER JOIN create_medium ON create_medium.id=student_master.medium INNER JOIN create_class ON create_class.id = student_master.class_id INNER JOIN create_section ON create_section.id=student_master.section_id WHERE student_master.medium='" . $medium . "' AND student_master.class_id='" . $class_id . "' AND student_master.section_id='" . $section_id . "'");
        return $query->result_array();
//        return $this->db->last_query();
    }

    function create($data) { {
            $this->db->insert('student_attendance_sheet', $data);
            $emp_id = $this->db->insert_id();
        }
        return $emp_id;
    }

    public function get_medium() {
        $query = $this->db->query("SELECT id, medium_name from create_medium");
        return $query->result();
    }

    public function get_section() {
        $query = $this->db->query("SELECT id, section_name from create_section");
        return $query->result();
    }

    public function get_class() {
        $query = $this->db->query("SELECT id, class_name from create_class");
        return $query->result();
    }

    public function getcls($medium) {
        $query = $this->db->query("SELECT * FROM create_class where medium='" . $medium . "'");
        return $query->result();
    }

    public function getsub($class) {
        $query = $this->db->query("SELECT * FROM create_section where class_id='" . $class . "'");
        return $query->result();
    }

    function check_attandance($date) { {
            $this->db->select('*');
            $this->db->from('student_attendance_sheet');
            $this->db->where('date', $date);
            $this->db->order_by('s_id', 'asc');
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    public function update_attandance($data, $date, $id) {
        $this->db->where('date', $date);
        $this->db->where('s_id', $id);
        $this->db->update('student_attendance_sheet', $data);
    }

}
?>

