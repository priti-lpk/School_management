<?php

class View_class_report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $mid = $this->input->GET('medium');
        $cid = $this->input->GET('class_id');
        $sid = $this->input->GET('section_id');
        $this->load->model('Class_report', 'class_report');
        $users = $this->class_report->all();
        $medium = $this->class_report->get_medium();
        $class = $this->class_report->get_class();
        $asub = $this->class_report->get_section();
        $cls_teacher = $this->class_report->fetch_cls_teacher($mid, $cid, $sid);
        $cls_student = $this->class_report->fetch_cls_student($mid, $cid, $sid);
        $cls_subject = $this->class_report->fetch_cls_subject($mid, $cid);
        $cls_subject_teacher = $this->class_report->fetch_cls_subject_teacher($mid, $cid);
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $asub;
        $data['teacher'] = $cls_teacher;
        $data['total'] = $cls_student;
        $data['subject'] = $cls_subject;
        $data['subject_teacher'] = $cls_subject_teacher;
        $data['medium_id'] = $mid;
        $data['class_id'] = $cid;
        $data['section_id'] = $sid;
        $this->load->view('view_class_report', $data);
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