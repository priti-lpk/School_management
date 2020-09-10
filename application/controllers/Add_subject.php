<?php

class Add_subject extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Subject', 'subject');
        $medium = $this->subject->get_medium();
        $class = $this->subject->get_class();
        $teacher = $this->subject->get_teacher();
        $users = $this->subject->all();
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $data['teacher'] = $teacher;
        $this->load->view('create_subject', $data);
    }

    public function get_class() {
        $this->load->model('Subject', 'subject');
        $medium = $this->input->post('medium');
        $val = $this->subject->getcls($medium);
        $output = '<select class="form-control select2 chosen" name="class_id" id="class_id" required="">';
        $output .= '<option>Select Class</option>';
        foreach ($val as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->class_name . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    function insert_subject() {
        $this->form_validation->set_rules('medium', 'medium', 'required');
        $this->form_validation->set_rules('class_id', 'class_id', 'required');
        $this->form_validation->set_rules('teacher_id', 'teacher_id', 'required');
        $this->form_validation->set_rules('subject_name', 'subject_name', 'required');
        $this->load->model('Subject', 'subject');
        $this->load->helper(array('form', 'url'));
        $save = array(
            'medium' => $this->input->post('medium'),
            'class_id' => $this->input->post('class_id'),
            'teacher_id' => $this->input->post('teacher_id'),
            'subject_name' => $this->input->post('subject_name'),
        );
        $this->subject->create($save);
        redirect(base_url() . 'Add_subject/');
    }

    function getdata_subject($id) {
        $this->load->model('Subject', 'subject');
        $users1 = $this->subject->edit_id($id);
        $users = $this->subject->all();
        $medium = $this->subject->get_medium();
        $teacher = $this->subject->get_teacher();
        $class_id = $this->subject->fetch_class_id($id);
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['users'] = $users1;
        $data['class'] = $class_id;
        $data['teacher'] = $teacher;
        $this->load->view('create_subject', $data);
    }

    function edit_subject($id) {
        $this->load->model('Subject', 'subject');
        $data1 = array();
        $users = $this->subject->all();
        $users1 = $this->subject->edit_id($id);
        $data['all'] = $users;
        $data['users'] = $users1;
        $this->form_validation->set_rules('medium', 'medium', 'required');
        $this->form_validation->set_rules('class_id', 'class_id', 'required');
        $this->form_validation->set_rules('teacher_id', 'teacher_id', 'required');
        $this->form_validation->set_rules('subject_name', 'subject_name', 'required');
        $data1 = array(
            'medium' => $this->input->post('medium'),
            'class_id' => $this->input->post('class_id'),
            'teacher_id' => $this->input->post('teacher_id'),
            'subject_name' => $this->input->post('subject_name'),
        );
        $this->subject->update_subject($id, $data1);
        redirect(base_url('Add_subject/'));
    }

    function delete_subject($id) {
        $this->load->model('Subject', 'subject');
        $this->subject->delete_subject($id);
        redirect(base_url('Add_subject'));
    }

}

?>