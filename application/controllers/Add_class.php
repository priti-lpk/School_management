<?php

class Add_class extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $this->load->model('Student_class', 'student_class');
        $users = $this->student_class->all();
        $medium = $this->student_class->get_medium();
        $data = array();
        $data['class'] = $users;
        $data['medium'] = $medium;
        $this->load->view('create_class', $data);
    }

    function insert_class() {
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('class_name', 'Class_name', 'required');
        $this->load->model('Student_class', 'student_class');
        $this->load->helper(array('form', 'url'));
        $save = array(
            'medium' => $this->input->post('medium'),
            'class_name' => $this->input->post('class_name'),
        );
        $this->student_class->create($save);
        redirect(base_url() . 'Add_class/');
    }

    function getdata_class($id) {
        $this->load->model('Student_class', 'student_class');
        $users = $this->student_class->edit_id($id);
        $users1 = $this->student_class->all();
        $medium = $this->student_class->get_medium();
        $data = array();
        $data['users'] = $users;
        $data['class'] = $users1;
        $data['medium'] = $medium;
        $this->load->view('create_class', $data);
    }

    function edit_class($id) {
        $this->load->model('Student_class', 'student_class');
        $data1 = array();
        $users1 = $this->student_class->all();
        $users = $this->student_class->edit_id($id);
        $data['users'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('class_name', 'Class_name', 'required');
        $data1 = array(
            'medium' => $this->input->post('medium'),
            'class_name' => $this->input->post('class_name'),
        );
        $this->student_class->update_class($id, $data1);
        redirect(base_url('Add_class/'));
    }

    function delete_class($id) {
        $this->load->model('Student_class', 'student_class');
        $this->student_class->delete_class($id);
        redirect(base_url('Add_class'));
    }

}

?>