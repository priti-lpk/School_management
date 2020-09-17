<?php

class View_class_report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $this->load->model('Class_report', 'class_report');
        $users = $this->class_report->all();
        $medium = $this->class_report->get_medium();
        $class = $this->class_report->get_class();
        $asub = $this->class_report->get_section();
        $mid = $this->input->get('medium');
        $cid = $this->input->get('class_id');
        $sid = $this->input->get('section_id');
        $data = array();
//        $data['all'] = $this->class_report->fetch_sub_teacher($mid, $cid, $sid);
        $data['cls_teacher'] = $this->class_report->fetch_cls_teacher($mid, $cid, $sid);
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $asub;
        $this->load->view('view_class_report', $data);
    }

    public function get_class() {
        $this->load->model('Class_report', 'class_report');
        $medium = $this->input->post('medium');
        $val = $this->class_report->getcls($medium);
        $output = '<select class="form-control select2 chosen" name="class_id" id="create_party" required="" >';
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
        $output = '<select class="form-control select2 chosen" name="section_id" id="subject_id" required="" >';
        $output .= '<option>Select Section</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->section_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

}

?>