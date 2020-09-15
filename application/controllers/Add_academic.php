<?php

class Add_academic extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Academic', 'academic');
        $users = $this->academic->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('create_academic_year', $data);
    }

    function insert_academic_year() {
        $this->form_validation->set_rules('year', 'year', 'required');
        $this->form_validation->set_rules('starting_date', 'starting_date', 'required');
        $this->form_validation->set_rules('ending_date', 'ending_date', 'required');
        $this->load->model('Academic', 'academic');
        $this->load->helper(array('form', 'url'));
        $save = array(
            'year' => $this->input->post('year'),
            'starting_date' => $this->input->post('starting_date'),
            'ending_date' => $this->input->post('ending_date'),
        );
        $this->academic->create($save);
        redirect(base_url() . 'Add_academic/');
    }

    function getdata_academic_year($id) {
        $this->load->model('Academic', 'academic');
        $users1 = $this->academic->edit_id($id);
        $users = $this->academic->all();
        $data = array();
        $data['all'] = $users;
        $data['users'] = $users1;
        $this->load->view('create_academic_year', $data);
    }

    function edit_academic_year($id) {
        $this->load->model('Academic', 'academic');
        $data1 = array();
        $users1 = $this->academic->all();
        $users = $this->academic->edit_id($id);
        $data['all'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('year', 'year', 'required');
        $this->form_validation->set_rules('starting_date', 'starting_date', 'required');
        $this->form_validation->set_rules('ending_date', 'ending_date', 'required');
        $data1 = array(
            'year' => $this->input->post('year'),
            'starting_date' => $this->input->post('starting_date'),
            'ending_date' => $this->input->post('ending_date'),
        );
        $this->academic->update_academic($id, $data1);
        redirect(base_url('Add_academic/'));
    }

    function delete_academic_year($id) {
        $this->load->model('Academic', 'academic');
        $this->academic->delete_academic($id);
        redirect(base_url('Add_academic'));
    }

}

?>