<?php

class View_student_report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $mid = $this->input->GET('medium');
        $cid = $this->input->GET('class_id');
        $sid = $this->input->GET('section_id');
        $this->load->model('Student_report', 'student_report');
        $users = $this->student_report->all();
        $medium = $this->student_report->get_medium();
        $class = $this->student_report->get_class();
        $asub = $this->student_report->get_section();
        $cls_student = $this->student_report->fetch_cls_student($mid, $cid, $sid);
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $asub;
        $data['student'] = $cls_student;
        $data['medium_id'] = $mid;
        $data['class_id'] = $cid;
        $data['section_id'] = $sid;
        $this->load->view('view_student_report', $data);
    }

    public function get_class() {
        $this->load->model('Student_report', 'student_report');
        $medium = $this->input->post('medium');
        $val = $this->student_report->getcls($medium);
        $output = '<select class="form-control select2 chosen" name="class_id" id="create_party1" required="" >';
        $output .= '<option>Select Class</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->class_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    public function get_sub() {
        $this->load->model('Student_report', 'student_report');
        $medium = $this->input->post('class');
        $val = $this->student_report->getsub($medium);
        $output = '<select class="form-control select2 chosen" name="section_id" id="subject_id1" required="" >';
        $output .= '<option>Select Section</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->section_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

}

?>