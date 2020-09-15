<?php

class Add_holiday extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Holiday', 'holiday');
        $users = $this->holiday->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('create_holiday', $data);
    }

    function insert_holiday() {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('from_date', 'from_date', 'required');
        $this->form_validation->set_rules('to_date', 'to_date', 'required');
        $this->form_validation->set_rules('details', 'details', 'required');
        $this->load->model('Holiday', 'holiday');
        $this->load->helper(array('form', 'url'));
        $save = array(
            'title' => $this->input->post('title'),
            'from_date' => $this->input->post('from_date'),
            'to_date' => $this->input->post('to_date'),
            'details' => $this->input->post('details')
        );
        $this->holiday->create($save);
        redirect(base_url() . 'Add_holiday/');
    }

    function getdata_holiday($id) {
        $this->load->model('Holiday', 'holiday');
        $users1 = $this->holiday->edit_id($id);
        $users = $this->holiday->all();
        $data = array();
        $data['all'] = $users;
        $data['users'] = $users1;
        $this->load->view('create_holiday', $data);
    }

    function edit_holiday($id) {
        $this->load->model('Holiday', 'holiday');
        $data1 = array();
        $users1 = $this->holiday->all();
        $users = $this->holiday->edit_id($id);
        $data['all'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('from_date', 'from_date', 'required');
        $this->form_validation->set_rules('to_date', 'to_date', 'required');
        $this->form_validation->set_rules('details', 'details', 'required');
        $data1 = array(
            'title' => $this->input->post('title'),
            'from_date' => $this->input->post('from_date'),
            'to_date' => $this->input->post('to_date'),
            'details' => $this->input->post('details'),
        );
        $this->holiday->update_holiday($id, $data1);
        redirect(base_url('Add_holiday/'));
    }

    function delete_holiday($id) {
        $this->load->model('Holiday', 'holiday');
        $this->holiday->delete_holiday($id);
        redirect(base_url('Add_holiday'));
    }

}

?>