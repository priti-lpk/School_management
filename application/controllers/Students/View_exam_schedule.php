<?php

class View_exam_schedule extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Students/Exam_schedule', 'exam_schedule');
        $users = $this->exam_schedule->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Students/View_exam_schedule', $data);
    }
}

?>