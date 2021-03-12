<?php

class Class_report extends CI_Model {

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

    public function getsubject($class, $medium) {
        $query = $this->db->query("SELECT * FROM create_subject where class_id='" . $class . "' and medium='" . $medium . "'");
        return $query->result();
    }

    public function fetch_cls_teacher($mid, $cid, $sid) {
        $query = $this->db->query("SELECT create_class.class_name,teacher_master.* FROM create_class INNER JOIN create_section ON create_class.id=create_section.class_id INNER JOIN teacher_master ON create_section.teacher_id=teacher_master.id WHERE create_class.id='" . $cid . "' AND create_class.medium='" . $mid . "' AND  create_section.id='" . $sid . "'");
        return $query->result();
//        return $this->db->last_query();
    }

    public function fetch_cls_student($mid, $cid, $sid) {
        $query = $this->db->query("SELECT create_class.class_name,student_master.* FROM create_class INNER JOIN create_section ON create_class.id=create_section.class_id INNER JOIN student_master ON student_master.section_id=create_section.id  WHERE create_class.id='" . $cid . "' AND create_class.medium='" . $mid . "' AND create_section.id='" . $sid . "'");
        return $query->result();
    }

    public function fetch_cls_subject($mid, $cid) {
        $query = $this->db->query("SELECT * FROM `create_subject` WHERE class_id='" . $cid . "' AND medium='" . $mid . "'");
        return $query->result();
    }

    public function fetch_cls_subject_teacher($mid, $cid) {
        $query = $this->db->query("SELECT create_subject.*,teacher_master.t_fname,teacher_master.t_lastname FROM `create_subject` INNER JOIN teacher_master ON create_subject.teacher_id=teacher_master.id WHERE create_subject.class_id='" . $cid . "' AND create_subject.medium='" . $mid . "'");
        return $query->result_array();
    }

}
?>

