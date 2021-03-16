<?php

class Add_section extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Teacher/Section', 'section');
        $users = $this->section->all();
        $medium = $this->section->get_medium();
        $class = $this->section->get_class();
        $teacher = $this->section->get_teacher();
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['teacher'] = $teacher;
        $this->load->view('Teacher/create_section', $data);
    }

    public function get_class() {
        $this->load->model('Teacher/Section', 'section');
        $medium = $this->input->post('medium');
        $val = $this->section->getcls($medium);
        $output = '<select class="form-control select2 chosen" name="class_id" id="class_id" required="">';
        $output .= '<option>Select Class</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->class_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    function insert_section() {
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('class_id', 'Class_id', 'required');
        $this->form_validation->set_rules('section_name', 'Section_name', 'required');
        $this->form_validation->set_rules('teacher_id', 'teacher_id', 'required');
        $this->load->model('Teacher/Section', 'section');
        $this->load->helper(array('form', 'url'));
        $save = array(
            'medium' => $this->input->post('medium'),
            'class_id' => $this->input->post('class_id'),
            'section_name' => $this->input->post('section_name'),
            'teacher_id' => $this->input->post('teacher_id'),
        );
        $this->section->create($save);
        redirect(base_url() . 'Teacher/Add_section/');
    }

    function getdata_section($id) {
        $this->load->model('Teacher/Section', 'section');
        $users1 = $this->section->edit_id($id);
        $users = $this->section->all();
        $medium = $this->section->get_medium();
        $teacher = $this->section->get_teacher();
        $class_id = $this->section->fetch_class_id($id);
        $data = array();
        $data['all'] = $users;
        $data['teacher'] = $teacher;
        $data['medium'] = $medium;
        $data['users'] = $users1;
        $data['class'] = $class_id;
        print_r($data['class']);
        $this->load->view('Teacher/create_section', $data);
    }

    function edit_section($id) {
        $this->load->model('Teacher/Section', 'section');
        $data1 = array();
        $users1 = $this->section->all();
        $users = $this->section->edit_id($id);
        $data['all'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('class_id', 'Class_id', 'required');
        $this->form_validation->set_rules('section_name', 'Section_name', 'required');
        $this->form_validation->set_rules('teacher_id', 'teacher_id', 'required');
        $data1 = array(
            'medium' => $this->input->post('medium'),
            'class_id' => $this->input->post('class_id'),
            'section_name' => $this->input->post('section_name'),
            'teacher_id' => $this->input->post('teacher_id'),
        );
        $this->section->update_section($id, $data1);
        redirect(base_url('Teacher/Add_section/'));
    }

    function delete_section($id) {
        $this->load->model('Teacher/Section', 'section');
        $this->section->delete_section($id);
        redirect(base_url('Teacher/Add_section'));
    }

}

?>