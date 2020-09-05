<?php

class Add_medium extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $this->load->model('Medium', 'medium');
        $users = $this->medium->all();
        $data = array();
        $data['class'] = $users;
        $this->load->view('create_medium', $data);
    }

    function insert_medium() {
        $this->form_validation->set_rules('medium_name', 'Medium_name', 'required');
        $this->load->model('Medium', 'medium');
        $this->load->helper(array('form', 'url'));
        $save = array(
            'medium_name' => $this->input->post('medium_name'),
        );
        $this->medium->create($save);
        redirect(base_url() . 'Add_medium/');
    }

    function getdata_medium($id) {
        $this->load->model('Medium', 'medium');
        $users = $this->medium->edit_id($id);
        $users1 = $this->medium->all();
        $data = array();
        $data['users'] = $users;
        $data['class'] = $users1;
        $this->load->view('create_medium', $data);
    }

    function edit_medium($id) {
        $this->load->model('Medium', 'medium');
        $data1 = array();
        $users1 = $this->medium->all();
        $users = $this->medium->edit_id($id);
        $data['users'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('medium_name', 'Medium_name', 'required');
        $data1 = array(
            'medium_name' => $this->input->post('medium_name'),
        );
        $this->medium->update_medium($id, $data1);
        redirect(base_url('Add_medium/'));
    }

    function delete_medium($id) {
        $this->load->model('Medium', 'medium');
        $this->medium->delete_medium($id);
        redirect(base_url('Add_medium'));
    }

}

?>