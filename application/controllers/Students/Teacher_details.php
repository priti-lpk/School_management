<?php

class Teacher_details extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Students/Teacher_detail', 'teacher_detail');
        $users = $this->teacher_detail->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Students/View_teacher_details', $data);
    }
}

?>