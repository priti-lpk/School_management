<?php

class Add_assignment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Assignment', 'assignment');
        $users = $this->assignment->all();
        $medium = $this->assignment->get_medium();
        $class = $this->assignment->get_class();
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $this->load->view('create_assignment', $data);
    }

    public function get_class() {
        $this->load->model('Assignment', 'assignment');
        $medium = $this->input->post('medium');
        $val = $this->assignment->getcls($medium);
        $output = '<select class="form-control select2 chosen" name="class_id" id="class_id" required="">';
        $output .= '<option>Select Class</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->class_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    public function get_sub() {
        $this->load->model('Assignment', 'assignment');
        $medium = $this->input->post('class');
        $val = $this->assignment->getsub($medium);
        $output = '<select class="form-control select2 chosen" name="subject_id" id="subject_id" required="">';
        $output .= '<option>Select Subject</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->class_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

}
?>