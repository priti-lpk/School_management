<?php

class Student_details extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Parent/Student_detail', 'student_detail');
        $users = $this->student_detail->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Parent/View_student_details', $data);
    }
}

?>