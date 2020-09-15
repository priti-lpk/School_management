<?php

class Add_exam_schedule extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Exam_schedule', 'exam_schedule');
        $users = $this->exam_schedule->all();
        $medium = $this->exam_schedule->get_medium();
        $class = $this->exam_schedule->get_class();
        $asub = $this->exam_schedule->get_all_subject();
        $exam = $this->exam_schedule->get_exam();
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $asub;
        $data['exam'] = $exam;
        $this->load->view('create_exam_schedule', $data);
    }

    public function get_class() {
        $this->load->model('Exam_schedule', 'exam_schedule');
        $medium = $this->input->post('medium');
        $val = $this->exam_schedule->getcls($medium);
        $output = '<select class="form-control select2 chosen" name="class_id" id="create_party" required="" >';
        $output .= '<option>Select Class</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->class_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    public function get_sub() {
        $this->load->model('Exam_schedule', 'exam_schedule');
        $medium = $this->input->post('class');
        $val = $this->exam_schedule->getsub($medium);
        $output = '<select class="form-control select2 chosen" name="subject_id" id="subject_id" required="" >';
        $output .= '<option>Select Subject</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->subject_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    function insert_exam_schedule() {
        $this->form_validation->set_rules('medium', 'medium', 'required');
        $this->form_validation->set_rules('class_id', 'class_id', 'required');
        $this->form_validation->set_rules('subject_id', 'subject_id', 'required');
        $this->form_validation->set_rules('exam_id', 'exam_id', 'required');
        $this->form_validation->set_rules('date ', 'date ', 'required');
        $this->form_validation->set_rules('start_time', 'start_time', 'required');
        $this->form_validation->set_rules('end_time', 'end_time', 'required');
        $this->load->model('Exam_schedule', 'exam_schedule');
        $this->load->helper(array('form', 'url'));
        $save = array(
            'medium' => $this->input->post('medium'),
            'class_id' => $this->input->post('class_id'),
            'subject_id' => $this->input->post('subject_id'),
            'exam_id' => $this->input->post('exam_id'),
            'date ' => $this->input->post('date'),
            'start_time' => $this->input->post('start_time'),
            'end_time ' => $this->input->post('end_time'),
        );
        $this->exam_schedule->create($save);
        redirect(base_url() . 'Add_exam_schedule/');
    }

    function getdata_exam_schedule($id) {
        $this->load->model('Exam_schedule', 'exam_schedule');
        $users1 = $this->exam_schedule->edit_id($id);
        $users = $this->exam_schedule->all();
        $medium = $this->exam_schedule->get_medium();
        $exam = $this->exam_schedule->get_exam();
        $class = $this->exam_schedule->fetch_class_id($id);
        $subject = $this->exam_schedule->fetch_subject_id($id);
        $data = array();
        $data['all'] = $users;
        $data['users'] = $users1;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['all_sub'] = $subject;
        $data['exam'] = $exam;
//        print_r($data['all_sub']);
        $this->load->view('create_exam_schedule', $data);
    }

}

?>