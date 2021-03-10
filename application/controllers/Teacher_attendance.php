<?php

class Teacher_attendance extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        if ($this->session->userdata('username')) {
            
        } else {
            redirect(base_url(index));
        }
    }

    public function index() {
        $date = $this->input->GET('date');
        $this->load->model('Teacher_att', 'teacher_att');
        $teacher = $this->teacher_att->fetch_teacher();
        $data = array();
        $data['all'] = $teacher;
        $this->load->view('teacher_attendance', $data);
    }

}

?>