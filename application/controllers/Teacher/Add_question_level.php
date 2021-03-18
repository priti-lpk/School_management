<?php

class Add_question_level extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $this->load->model('Teacher/Question_level', 'question_level');
        $users = $this->question_level->all();
        $data = array();
        $data['class'] = $users;
        $this->load->view('Teacher/create_question_level', $data);
    }

    function insert_question_level() {
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->load->model('Teacher/Question_level', 'question_level');
        $this->load->helper(array('form', 'url'));
        $save = array(
            'type' => $this->input->post('type'),
        );
        $this->question_level->create($save);
        redirect(base_url() . 'Teacher/Add_question_level/');
    }

    function getdata_question_level($id) {
        $this->load->model('Teacher/Question_level', 'question_level');
        $users = $this->question_level->edit_id($id);
        $users1 = $this->question_level->all();
        $data = array();
        $data['users'] = $users;
        $data['class'] = $users1;
        $this->load->view('Teacher/create_question_level', $data);
    }

    function edit_question_level($id) {
        $this->load->model('Teacher/Question_level', 'question_level');
        $data1 = array();
        $users1 = $this->question_level->all();
        $users = $this->question_level->edit_id($id);
        $data['users'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('type', 'Type', 'required');
        $data1 = array(
            'type' => $this->input->post('type'),
        );
        $this->question_level->update_question_level($id, $data1);
        redirect(base_url('Teacher/Add_question_level/'));
    }

    function delete_question_level($id) {
        $this->load->model('Teacher/Question_level', 'question_level');
        $this->question_level->delete_question_level($id);
        redirect(base_url('Teacher/Add_question_level'));
    }

}

?>