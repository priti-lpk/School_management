<?php

class View_attendance_report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $mid = $this->input->GET('medium');
        $cid = $this->input->GET('class_id');
        $sid = $this->input->GET('section_id');
        $type = $this->input->GET('attendance_type');
        $date = $this->input->GET('date');
        $this->load->model('Attendance_report', 'attendance_report');
        $medium = $this->attendance_report->get_medium();
        $class = $this->attendance_report->get_class();
        $asub = $this->attendance_report->get_section();
        $cls_attendance = $this->attendance_report->fetch_attendance($mid, $cid, $sid, $type, $date);
        $data = array();
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $asub;
        $data['attendance'] = $cls_attendance;
        $data['medium_id'] = $mid;
        $data['class_id'] = $cid;
        $data['section_id'] = $sid;
        $data['type'] = $type;
        $data['date'] = $date;
        $this->load->view('view_attendance_report', $data);
    }

    public function get_class() {
        $this->load->model('Class_report', 'class_report');
        $medium = $this->input->post('medium');
        $val = $this->class_report->getcls($medium);
        $output = '<select class="form-control select2 chosen" name="class_id" id="create_party1" required="" >';
        $output .= '<option>Select Class</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->class_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    public function get_sub() {
        $this->load->model('Class_report', 'class_report');
        $medium = $this->input->post('class');
        $val = $this->class_report->getsub($medium);
        $output = '<select class="form-control select2 chosen" name="section_id" id="subject_id1" required="" >';
        $output .= '<option>Select Section</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->section_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    public function get_subject() {
        $this->load->model('Class_report', 'class_report');
        $medium = $this->input->post('class');
        $class = $this->input->post('medium');
        $val = $this->class_report->getsubject($medium, $class);
        $output = '<select class="form-control select2 chosen" name="subject_id" id="subject_id1" required="" >';
        $output .= '<option>Select Subject</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->subject_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

}

?>