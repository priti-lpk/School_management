<?php

class Add_grade extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $this->load->model('Grade', 'grade');
        $users = $this->grade->all();
        $data = array();
        $data['class'] = $users;
        $this->load->view('create_grade', $data);
    }

    function insert_grade() {
        $this->form_validation->set_rules('grade_name', 'grade_name', 'required');
        $this->form_validation->set_rules('grade_point', 'grade_point', 'required');
        $this->form_validation->set_rules('mark_from', 'mark_from', 'required');
        $this->form_validation->set_rules('mark_upto', 'mark_upto', 'required');
        $this->form_validation->set_rules('note', 'note', 'required');
        $this->load->model('Grade', 'grade');
        $this->load->helper(array('form', 'url'));
        $save = array(
            'grade_name' => $this->input->post('grade_name'),
            'grade_point' => $this->input->post('grade_point'),
            'mark_from' => $this->input->post('mark_from'),
            'mark_upto' => $this->input->post('mark_upto'),
            'note' => $this->input->post('note'),
        );
        $this->grade->create($save);
        redirect(base_url() . 'Add_grade/');
    }

    function getdata_grade($id) {
        $this->load->model('Grade', 'grade');
        $users = $this->grade->edit_id($id);
        $users1 = $this->grade->all();
        $data = array();
        $data['users'] = $users;
        $data['class'] = $users1;
        $this->load->view('create_grade', $data);
    }

    function edit_grade($id) {
        $this->load->model('Grade', 'grade');
        $data1 = array();
        $users1 = $this->grade->all();
        $users = $this->grade->edit_id($id);
        $data['users'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('grade_name', 'grade_name', 'required');
        $this->form_validation->set_rules('grade_point', 'grade_point', 'required');
        $this->form_validation->set_rules('mark_from', 'mark_from', 'required');
        $this->form_validation->set_rules('mark_upto', 'mark_upto', 'required');
        $this->form_validation->set_rules('note', 'note', 'required');
        $data1 = array(
            'grade_name' => $this->input->post('grade_name'),
            'grade_point' => $this->input->post('grade_point'),
            'mark_from' => $this->input->post('mark_from'),
            'mark_upto' => $this->input->post('mark_upto'),
            'note' => $this->input->post('note'),);
        $this->grade->update_grade($id, $data1);
        redirect(base_url('Add_grade/'));
    }

    function delete_grade($id) {
        $this->load->model('Grade', 'grade');
        $this->grade->delete_grade($id);
        redirect(base_url('Add_grade'));
    }

}

?>