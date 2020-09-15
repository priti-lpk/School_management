<?php

class Add_notice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Notice', 'notice');
        $users = $this->notice->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('create_notice', $data);
    }

    function insert_notice() {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('notice', 'notice', 'required');
        $this->load->model('Notice', 'notice');
        $this->load->helper(array('form', 'url'));
        $save = array(
            'title' => $this->input->post('title'),
            'date' => $this->input->post('date'),
            'notice' => $this->input->post('notice'),
        );
        $this->notice->create($save);
        redirect(base_url() . 'Add_notice/');
    }

    function getdata_notice($id) {
        $this->load->model('Notice', 'notice');
        $users1 = $this->notice->edit_id($id);
        $users = $this->notice->all();
        $data = array();
        $data['all'] = $users;
        $data['users'] = $users1;
        $this->load->view('create_notice', $data);
    }

    function edit_notice($id) {
        $this->load->model('Notice', 'notice');
        $data1 = array();
        $users1 = $this->notice->all();
        $users = $this->notice->edit_id($id);
        $data['all'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('notice', 'notice', 'required');
        $data1 = array(
            'title' => $this->input->post('title'),
            'date' => $this->input->post('date'),
            'notice' => $this->input->post('notice'),
        );
        $this->notice->update_notice($id, $data1);
        redirect(base_url('Add_notice/'));
    }

    function delete_notice($id) {
        $this->load->model('Notice', 'notice');
        $this->notice->delete_notice($id);
        redirect(base_url('Add_notice'));
    }

}

?>