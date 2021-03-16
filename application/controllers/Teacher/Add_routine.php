<?php

class Add_routine extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $this->load->model('Teacher/Routine', 'routine');
        $users = $this->routine->all();
        $medium = $this->routine->get_medium();
        $class = $this->routine->get_class();
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['class'] = $class;
        $this->load->view('Teacher/create_routine', $data);
    }

    public function get_class() {
        $this->load->model('Teacher/Routine', 'routine');
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

    function insert_routine() {
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('class_id', 'Class_id', 'required');
        $this->form_validation->set_rules('day', 'Day', 'required');
        $this->form_validation->set_rules('starting_time', 'Starting_time', 'required');
        $this->form_validation->set_rules('ending_time', 'Ending_time', 'required');
        $this->load->model('Teacher/Routine', 'routine');
        $this->load->helper(array('form', 'url'));
        $save = array(
            'medium' => $this->input->post('medium'),
            'class_id' => $this->input->post('class_id'),
            'day' => $this->input->post('day'),
            'starting_time' => $this->input->post('starting_time'),
            'ending_time' => $this->input->post('ending_time'),
        );
        $this->routine->create($save);
        redirect(base_url() . 'Teacher/Add_routine/');
    }

    function getdata_routine($id) {
        $this->load->model('Teacher/Routine', 'routine');
        $users1 = $this->routine->edit_id($id);
        $users = $this->routine->all();
        $medium = $this->routine->get_medium();
        $class_id = $this->routine->fetch_class_id($id);
        $data = array();
        $data['all'] = $users;
        $data['medium'] = $medium;
        $data['users'] = $users1;
        $data['class'] = $class_id;
        $this->load->view('Teacher/create_routine', $data);
    }

    function edit_routine($id) {
        $this->load->model('Teacher/Routine', 'routine');
        $data1 = array();
        $users1 = $this->routine->all();
        $users = $this->routine->edit_id($id);
        $data['all'] = $users;
        $data['class'] = $users1;
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('class_id', 'Class_id', 'required');
        $this->form_validation->set_rules('day', 'Day', 'required');
        $this->form_validation->set_rules('starting_time', 'Starting_time', 'required');
        $this->form_validation->set_rules('ending_time', 'Ending_time', 'required');
        $data1 = array(
            'medium' => $this->input->post('medium'),
            'class_id' => $this->input->post('class_id'),
            'day' => $this->input->post('day'),
            'starting_time' => $this->input->post('starting_time'),
            'ending_time' => $this->input->post('ending_time'),
        );
        $this->routine->update_routine($id, $data1);
        redirect(base_url('Teacher/Add_routine/'));
    }

    function delete_routine($id) {
        $this->load->model('Teacher/Routine', 'routine');
        $this->routine->delete_routine($id);
        redirect(base_url('Teacher/Add_routine'));
    }

}

?>