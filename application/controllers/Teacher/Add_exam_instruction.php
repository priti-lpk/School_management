<?php

class Add_exam_instruction extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $this->load->model('Teacher/Exam_instruction', 'exam_instruction');
        $users = $this->exam_instruction->all();
        $data = array();
        $data['class'] = $users;
        $this->load->view('Teacher/create_exam_instruction', $data);
    }

    function insert_exam_instruction() {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');
        $this->load->model('Teacher/Exam_instruction', 'exam_instruction');
        $this->load->helper(array('form', 'url'));
        $save = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
        );
        $this->exam_instruction->create($save);
        redirect(base_url() . 'Teacher/Add_exam_instruction/');
    }

    function getdata_exam_instruction($id) {
        $this->load->model('Teacher/Exam_instruction', 'exam_instruction');
        $users = $this->exam_instruction->edit_id($id);
        $users1 = $this->exam_instruction->all();
        $data = array();
        $data['users'] = $users;
        $data['class'] = $users1;
        $this->load->view('Teacher/create_exam_instruction', $data);
    }

    function edit_exam_instruction($id) {
        $this->load->model('Teacher/Exam_instruction', 'exam_instruction');
        $data1 = array();
        $users1 = $this->exam_instruction->all();
        $users = $this->exam_instruction->edit_id($id);
        $data['users'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');
        $data1 = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),);
        $this->exam_instruction->update_exam_instruction($id, $data1);
        redirect(base_url('Teacher/Add_exam_instruction/'));
    }

    function delete_exam_instruction($id) {
        $this->load->model('Teacher/Exam_instruction', 'exam_instruction');
        $this->exam_instruction->delete_exam_instruction($id);
        redirect(base_url('Teacher/Add_exam_instruction'));
    }

}

?>