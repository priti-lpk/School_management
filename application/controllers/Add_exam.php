<?php

class Add_exam extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Exam', 'exam');
        $users = $this->exam->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('create_exam', $data);
    }

    function insert_exam() {
        $this->form_validation->set_rules('exam_name', 'exam_name', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('note', 'note', 'required');
        $this->load->model('Exam', 'exam');
        $this->load->helper(array('form', 'url'));
        $save = array(
            'exam_name' => $this->input->post('exam_name'),
            'date' => $this->input->post('date'),
            'note' => $this->input->post('note'),
        );
        $this->exam->create($save);
        redirect(base_url() . 'Add_exam/');
    }

    function getdata_exam($id) {
        $this->load->model('Exam', 'exam');
        $users1 = $this->exam->edit_id($id);
        $users = $this->exam->all();
        $data = array();
        $data['all'] = $users;
        $data['users'] = $users1;
        $this->load->view('create_exam', $data);
    }

    function edit_exam($id) {
        $this->load->model('Exam', 'exam');
        $data1 = array();
        $users1 = $this->exam->all();
        $users = $this->exam->edit_id($id);
        $data['all'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('exam_name', 'exam_name', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('note', 'note', 'required');
        $data1 = array(
            'exam_name' => $this->input->post('exam_name'),
            'date' => $this->input->post('date'),
            'note' => $this->input->post('note'),
        );
        $this->exam->update_exam($id, $data1);
        redirect(base_url('Add_exam/'));
    }

    function delete_exam($id) {
        $this->load->model('Exam', 'exam');
        $this->exam->delete_exam($id);
        redirect(base_url('Add_exam'));
    }

}

?>