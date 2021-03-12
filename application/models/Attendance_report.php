<?php

class Attendance_report extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('create_medium');
        $users2 = $this->db->get()->result_array();
        return $users2;
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

    public function fetch_attendance($mid, $cid, $sid, $type, $date) {
        $query = $this->db->query("SELECT exam_attendance_sheet.id,student_master.s_surname,student_master.s_name,student_master.s_fathername,student_master.s_grno,student_master.s_image FROM `exam_attendance_sheet` INNER JOIN student_master ON student_master.id=exam_attendance_sheet.s_id WHERE exam_attendance_sheet.medium_id='" . $mid . "' AND exam_attendance_sheet.class_id='" . $cid . "' AND exam_attendance_sheet.section_id='" . $sid . "' AND exam_attendance_sheet.stu_attendance='" . $type . "' AND exam_attendance_sheet.date='" . $date . "'");
        return $query->result_array();
    }

}
?>

