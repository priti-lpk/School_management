<?php

class View_attendance extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Students/Attendance', 'attendance');
        $users = $this->attendance->all();
        $data = array();
        $data['all'] = $users;
        $data['year'] = $year;
        $this->load->view('Students/View_attendance', $data);
    }
}

?>