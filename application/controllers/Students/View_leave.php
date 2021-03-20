<?php

class View_leave extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->model('Students/Leave', 'leave');
        $users = $this->leave->all();
        $data = array();
        $data['all'] = $users;
        $this->load->view('Students/View_leave', $data);
    }
}

?>