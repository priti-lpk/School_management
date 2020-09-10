<?php

class Add_syllabus extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Syllabus', 'syllabus');
        $users = $this->syllabus->all();
        $medium = $this->syllabus->get_medium();
        $class = $this->syllabus->get_class();
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $this->load->view('create_syllabus', $data);
    }

    function insert_syllabus() {
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('class_id', 'Class_id', 'required');
        $this->form_validation->set_rules('details', 'Details', 'required');
        $this->load->model('Syllabus', 'syllabus');
        $this->load->helper(array('form', 'url'));
        $save = array(
            'medium' => $this->input->post('medium'),
            'class_id' => $this->input->post('class_id'),
            'details' => $this->input->post('details'),
        );
        $this->syllabus->create($save);
        redirect(base_url() . 'Add_syllabus/');
    }

    function getdata_syllabus($id) {
        $this->load->model('Syllabus', 'syllabus');
        $users1 = $this->syllabus->edit_id($id);
        $users = $this->syllabus->all();
        $medium = $this->syllabus->get_medium();
        $class_id = $this->syllabus->fetch_class_id($id);
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['users'] = $users1;
        $data['class'] = $class_id;
        $this->load->view('create_syllabus', $data);
    }

    function edit_syllabus($id) {
        $this->load->model('Syllabus', 'syllabus');
        $data1 = array();
        $users1 = $this->syllabus->all();
        $users = $this->syllabus->edit_id($id);
        $data['all'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('class_id', 'Class_id', 'required');
        $this->form_validation->set_rules('details', 'Details', 'required');
        $data1 = array(
            'medium' => $this->input->post('medium'),
            'class_id' => $this->input->post('class_id'),
            'details' => $this->input->post('details'),
        );
        $this->syllabus->update_syllabus($id, $data1);
        redirect(base_url('Add_syllabus/'));
    }

    function delete_syllabus($id) {
        $this->load->model('Syllabus', 'syllabus');
        $this->syllabus->delete_syllabus($id);
        redirect(base_url('Add_syllabus'));
    }

}

?>
